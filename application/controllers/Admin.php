<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('pages/dashboard');
    }

    public function products()
    {
        $this->load->view('pages/products');
    }

    public function transaction()
    {
        $this->load->view('pages/transaction');
    }

    public function login()
    {
        $this->load->view('pages/login');
    }

    public function logout()
    {
        redirect('admin/login');
    }

}
