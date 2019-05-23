<?php

class Transaksi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('DataModel');
    }

    public function barang_masuk(){
        $barang = $this->DataModel->getJoin('barang','barang_masuk.idBarang = barang.idBarang','inner');
        $barang = $this->DataModel->getData('barang_masuk')->result_array();
        $data = array("barang" => $barang);
        if($this->input->post('cari')){
            $tgl = $this->input->post('tanggal');
            // die(json_encode($tgl));
            $barang = $this->DataModel->getWhere('tanggal_masuk',$tgl);
            $barang = $this->DataModel->getJoin('barang','barang_masuk.idBarang = barang.idBarang','inner');
            $barang = $this->DataModel->getData('barang_masuk')->result_array();
            // die(json_encode($barang));
            $data = array("barang" => $barang);
            $this->load->view('pages/barangMasuk',$data);
        }else{
            $this->load->view('pages/barangMasuk',$data);
        }
    }

    public function barang_keluar(){
        $this->load->view('pages/barangKeluar');
    }

    public function laporan(){
        $this->load->view('pages/laporan');
    }


}