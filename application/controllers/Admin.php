<?php

class Admin extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    }

    public function index()
    {
        if ($this->IsLoggedIn()) {
            $data = array(
                "admin" => $this->DataModel->getData('admin')->num_rows(),
                "category" => $this->DataModel->getData('category')->num_rows()
            );
            $this->load->view('pages/dashboard',$data);
        } else {
            $this->load->view('pages/login');
        }
    }

    public function account()
    {
        if ($this->IsLoggedIn()) {
            $data["admin"] = $this->DataModel->getData('admin')->result_array();
            $this->load->view('pages/adminAccount', $data);
        }else{
            $this->load->view('pages/login');
        }
    }

    public function addAdminAccount()
    {
        if($this->IsLoggedIn()){
            $this->load->view('pages/addAdminAccount');
        }else{
            $this->load->view('pages/login');  
        }
    }

    public function proses_simpan_admin()
    {
        $username = $this->input->post('username');
        $pass  = $this->input->post('pass');
        $email = $this->input->post('email');

        $data = array(

            "username" => $username,
            "password" => $this->input->post("pass"),
            "email" => $this->input->post("email")
        );

        $this->form_validation->set_rules('username', 'user', 'required');
        $this->form_validation->set_rules('pass', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('pages/addAdminAccount');
        } else {
            $data = array(
                "username" => $username,
                "password" => md5($pass),
                "email" => $email

            );
            $result =  $this->DataModel->insert("admin", $data);

            if ($result) {
                redirect(base_url("Admin/account"));
            }
        }
    }

    public function deleteAdminAccount($id)
    {
        $result = $this->DataModel->delete('id', $id, 'admin');
        if ($result) {
            redirect('admin/account');
        }
    }

    public function edit_data($id)
    {
        $data['adminAccount'] = $this->DataModel->getWhere('id', $id);
        $data['adminAccount'] = $this->DataModel->getData('admin')->row();

        $username = $this->input->post('username');
        $email = $this->input->post('email');
        if ($this->input->post('kirim')) {
            $this->form_validation->set_rules('username', 'New Username', 'required');
            $this->form_validation->set_rules('email', 'New email', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('pages/editAdminAccount', $data);
            } else {
                $data = array(
                    "username" => $username,
                    "email" => $email
                );

                $result = $this->DataModel->getWhere('id', $id);
                $result = $this->DataModel->update("admin", $data);
                // var_dump ($data);

                if ($result) {
                    redirect('Admin/account');
                }
            }
        }
        $this->load->view('pages/editAdminAccount', $data);
    }


    public function change_password()
    {
        if ($this->input->post('kirim')) {
            $old = $this->input->post('pass_old');
            $new = $this->input->post('pass_new');

            $this->form_validation->set_rules('pass_old', 'Old Password', 'required');
            $this->form_validation->set_rules('pass_new', 'New Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('pages/change_pass');
            } else {
                $data = $this->DataModel->getWhere('id', $this->session->userdata('admin_data')['id']);
                $data = $this->DataModel->getData('admin')->row();

                if ($old != $data->password) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Password not match</p></div>');
                    $this->load->view('pages/change_pass');
                } else {
                    $data = array('password' => md5($new));
                    $this->DataModel->getWhere('id', $this->session->userdata('admin_data')['id']);
                    $this->DataModel->update('admin', $data);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Password has been changed</p></div>');
                    $this->load->view('pages/change_pass');
                }
            }
        } else {
            $this->load->view('pages/change_pass');
        }
    }

    public function login()
    {
        if ($this->input->post('login')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->form_validation->set_rules('username', 'Username', 'required|max_length[20]');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('pages/login');
            } else {
                $data = array(
                    "username" => $username,
                    "password" => md5($password),
                );
                $log = $this->DataModel->Login('admin', $data)->row();
                if ($log != null) {
                    $account = array('id' => $log->id, 'username' => $log->username, 'status' => "true");
                    $this->session->set_userdata('admin_data', $account);
                    $lastLogin = array(
                        'last_login' => date('Y-m-d G:i:s')
                    );
                    $this->DataModel->getWhere('id', $log->id);
                    $this->DataModel->update('admin', $lastLogin);
                    redirect('admin/index');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Email atau password tidak dikenali</p></div>');
                    $this->load->view('pages/login');
                }
            }
        } else {
            $this->load->view('pages/login');
        }
    }

    public function logout()
    {
        $sess_array = array(
            'username' => '',
        );
        $this->session->unset_userdata('admin_data', $sess_array);
        $this->session->sess_destroy();
        redirect('admin/index', 'refresh');
    }

}