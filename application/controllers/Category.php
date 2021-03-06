<?php

class Category extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    }

    public function index()
    {
        if ($this->IsLoggedIn()) {
            $data["Category"] = $this->DataModel->getData('category')->result_array();
            $this->load->view('pages/Category', $data);
        } else {
            $this->load->view('pages/login');
        }
        // echo json_encode($data);
    }

    public function addCategory()
    {
        if ($this->IsLoggedIn()) {
            $nama = $this->input->post('nama');
            $desc = $this->input->post('description');

            if ($this->input->post('kirim')) {
                $this->form_validation->set_rules('nama', 'Name', 'required');
                // $this->form_validation->set_rules('description', 'Description', 'required');

                if ($this->form_validation->run() == false) {
                    $this->load->view('pages/addCategory');
                } else {
                    $data = array(
                        "name" => $nama,
                        "description" => $desc,
                        "created_at" => date('Y-m-d G:i:s')
                    );

                    $result = $this->DataModel->insert("category", $data);
                    // var_dump ($data);

                    if ($result) {
                        redirect('category/index');
                    }
                }
            } else {
                $this->load->view('pages/addCategory');
            }
        } else {
            $this->load->view('pages/login');
        }
    }

    public function editCategory($id)
    {
        if ($this->IsLoggedIn()) {
            $data['category'] = $this->DataModel->getWhere('id', $id);
            $data['category'] = $this->DataModel->getData('category')->row();

            $nama = $this->input->post('nama');
            $desc = $this->input->post('description');
            if ($this->input->post('kirim')) {
                $this->form_validation->set_rules('nama', 'New Name', 'required');
                // $this->form_validation->set_rules('description', 'New Description', 'required');

                if ($this->form_validation->run() == false) {
                    $this->load->view('pages/editCategory', $data);
                } else {
                    $data = array(
                        "name" => $nama,
                        "description" => $desc,
                        "updated_at" => date('Y-m-d G:i:s')
                    );

                    $result = $this->DataModel->getWhere('id', $id);
                    $result = $this->DataModel->update("category", $data);
                    // var_dump ($data);

                    if ($result) {

                        redirect('category/index');
                    }
                }
            } else {
                $this->load->view('pages/editCategory', $data);
            }
        } else {
            $this->load->view('pages/login');
        }
    }

    public function deleteCategory()
    {
        if($this->IsLoggedIn()){
            $id = $this->input->post('id');
            // $this->DataModel->getWhere('id', $id);
            $result = $this->DataModel->delete('id', $id, 'category');
            if ($result) {
                redirect('category');
            }
        }else{
            $this->load->view('pages/login');
        }
    }
}
