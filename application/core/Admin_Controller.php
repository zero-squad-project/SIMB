<?php

class Admin_Controller extends CI_Controller {

    protected function IsLoggedIn(){
        $AdminisLoggedIn = $this->session->userdata('admin_data');
        if (isset($AdminisLoggedIn)) {
            return TRUE;
        }else{
            return FALSE;
        }
    }   

}