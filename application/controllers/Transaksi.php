<?php

class Transaksi extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
    }

    protected $idB, $tgl, $no_faktur, $jumlah, $harga, $total, $supplier;

    public function barang_masuk()
    {
        if($this->IsLoggedIn()){
            $barang = $this->DataModel->getJoin('barang', 'barang_masuk.idBarang = barang.idBarang', 'inner');
            $barang = $this->DataModel->getData('barang_masuk')->result_array();
            $data = array("barang" => $barang);
            if ($this->input->post('cari')) {
                $tgl = $this->input->post('tanggal');
                // die(json_encode($tgl));
                $barang = $this->DataModel->getWhere('tanggal_masuk', $tgl);
                $barang = $this->DataModel->getJoin('barang', 'barang_masuk.idBarang = barang.idBarang', 'inner');
                $barang = $this->DataModel->getData('barang_masuk')->result_array();
                // die(json_encode($barang));
                $data = array("barang" => $barang);
                $this->load->view('pages/barangMasuk', $data);
            } else {
                $this->load->view('pages/barangMasuk', $data);
            }
        }else{
            $this->load->view('pages/login');
        }
    }

    public function tambah_bm()
    {
        if($this->IsLoggedIn()){
            $data = array(
                "barang" => $this->DataModel->getData('barang')->result_array()
            );
            if ($this->input->post('kirim')) {
                $this->_initComponent();
                $data = array(
                    "idBarang" => $this->idB,
                    "noFaktur" => $this->no_faktur,
                    "jumlah" => $this->jumlah,
                    "tanggal_masuk" => $this->tgl,
                    "hargaSatuan" => $this->harga,
                    "total" => $this->harga * $this->jumlah,
                    "supplier" => $this->supplier
                );
                $result = $this->DataModel->insert('barang_masuk', $data);
                if ($result) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <p>Data Berhasil ditambahkan</p></div>');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <p>Data Gagal ditambahkan</p></div>');
                }
                redirect('transaksi/barang_masuk');
            } else {
                $this->load->view('pages/addBarangMasuk', $data);
            }   
        }else{
            $this->load->view('pages/login');
        }
    }

    public function tambah_bk()
    { }

    public function barang_keluar()
    {
        if($this->IsLoggedIn()){
            $this->load->view('pages/barangKeluar');   
        }else{
            $this->load->view('pages/login');
        }
    }

    public function laporan()
    {
        if($this->IsLoggedIn()){
            $this->load->view('pages/laporan');
        }else{
            $this->load->view('pages/login');
        }
    }

    private function _initComponent()
    {
        $this->idB = $this->input->post('id');
        $this->tgl = $this->input->post('tgl');
        $this->no_faktur = $this->input->post('faktur');
        $this->jumlah = $this->input->post('jumlah');
        $this->harga = $this->input->post('harga');
        $this->total = $this->input->post('total');
        $this->supplier = $this->input->post('supplier');
    }

    private function _validate()
    { }
}