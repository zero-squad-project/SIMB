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
        if($this->IsLoggedIn()){
            $this->load->view('pages/dashboard');
        }else{
            $this->load->view('pages/login');
        }
    }

    public function change_password(){
        if($this->input->post('kirim')){
            $old = $this->input->post('pass_old');
            $new = $this->input->post('pass_new');

            $this->form_validation->set_rules('pass_old', 'Old Password', 'required');
            $this->form_validation->set_rules('pass_new', 'New Password', 'required');

            if($this->form_validation->run() == FALSE){
                $this->load->view('pages/change_pass');
            }else{
                $data = $this->DataModel->getWhere('id', $this->session->userdata('admin_data')['id']);
                $data = $this->DataModel->getData('admin')->row();

                if (md5($old) != $data->password) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Password not match</p></div>');
                    $this->load->view('pages/change_pass');
                }else{
                    $data = array('password' => md5($new));
                    $this->DataModel->getWhere('id',$this->session->userdata('admin_data')['id']);
                    $this->DataModel->update('admin',$data);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Password has been changed</p></div>');     
                    $this->load->view('pages/change_pass');
                }    
            }
        }else{
            $this->load->view('pages/change_pass');
        }
    }

    public function login()
    {
        if($this->input->post('login')){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $this->form_validation->set_rules('username','Username','required|max_length[20]');
            $this->form_validation->set_rules('password','Password','required');

            if($this->form_validation->run() == FALSE){
                $this->load->view('pages/login');
            }else{
                $data = array(
                    "username" => $username,
                    "password" => md5($password),
                );
                $log = $this->DataModel->Login('admin',$data)->row();
                if($log != null){
                    $account = array('id' => $log->id,'username' => $log->username,'status' => "true");
                    $this->session->set_userdata('admin_data',$account);
                    $lastLogin = array(
                        'last_login' => date('Y-m-d G:i:s')
                    );
                    $this->DataModel->getWhere('id',$log->id);
                    $this->DataModel->update('admin',$lastLogin);
                    redirect('admin/index');
                }else{
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Wrong Username or Password</p></div>');
                    $this->load->view('pages/login');
                }
            }
        }else{
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
        redirect('admin/index','refresh');
    }

}
