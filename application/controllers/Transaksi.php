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
        if ($this->IsLoggedIn()) {
            // $barang = $this->DataModel->getWhere('tanggal_masuk', date("Y-m-d"));
            // die(json_encode(date("Y-m-d")));
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
        } else {
            $this->load->view('pages/login');
        }
    }

    public function tambah_bm()
    {
        if ($this->IsLoggedIn()) {
            $data = array(
                "barang" => $this->DataModel->getData('barang')->result_array()
            );
            if ($this->input->post('kirim')) {
                $this->_initComponent();
                $brg = $this->DataModel->select('harga,stok');
                $brg = $this->DataModel->getWhere('idBarang', $this->idB);
                $brg = $this->DataModel->getData('barang')->row();
                $data = array(
                    "idBarang" => $this->idB,
                    "noFaktur" => $this->no_faktur,
                    "jumlah" => $this->jumlah,
                    "tanggal_masuk" => $this->tgl,
                    "hargaSatuan" => $brg->harga,
                    "total" => $brg->harga * $this->jumlah,
                    "supplier" => $this->supplier
                );
                $stok = $this->jumlah + $brg->stok;
                $dataB = array(
                    "stok" => $stok
                );
                // die(json_encode($dataB));
                $result = $this->DataModel->getWhere('idBarang', $this->idB);
                $result = $this->DataModel->update('barang', $dataB);
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
        } else {
            $this->load->view('pages/login');
        }
    }

    public function ubah_bm()
    {
        if ($this->IsLoggedIn()) {
            $id = $this->input->post('id');
            $idB = $this->input->post('idBarang');
            $jml = $this->input->post('jumlah');
            $brg = $this->DataModel->select('stok');
            $brg = $this->DataModel->getWhere('idBarang', $idB);
            $brg = $this->DataModel->getData('barang')->row();
            $stok = $brg->stok + $jml;
            $data = array(
                "stok" => $stok
            );
            $dataB = array(
                "jumlah" => $jml
            );
            $result = $this->DataModel->getWhere('idBarang', $idB);
            $result = $this->DataModel->update('barang', $data);
            $result = $this->DataModel->getWhere('idBM', $id);
            $result = $this->DataModel->update('barang_masuk', $dataB);
            if ($result) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>Data Berhasil diubah</p></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p>Data Gagal diubah</p></div>');
            }
            redirect('transaksi/barang_masuk');
        } else {
            $this->load->view('pages/login');
        }
    }

    public function hapus_bm()
    {
        if ($this->IsLoggedIn()) {
            $idB = $this->input->post('idBarang');
            $id = $this->input->post('id');
            $stok = $this->input->post('stok');
            $brg = $this->DataModel->select('stok');
            $brg = $this->DataModel->getWhere('idBarang', $idB);
            $brg = $this->DataModel->getData('barang')->row();
            $stok = $brg->stok - $stok;
            $data = array(
                "stok" => $stok
            );
            $result = $this->DataModel->getWhere('idBarang', $idB);
            $result = $this->DataModel->update('barang', $data);
            $result = $this->DataModel->delete('idBM', $id, 'barang_masuk');
            if ($result) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>Data Berhasil dihapus</p></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>Data Gagal dihapus</p></div>');
            }
            redirect('transaksi/barang_masuk');
        } else {
            $this->load->view('pages/login');
        }
    }

    public function barang_keluar()
    {
        if ($this->IsLoggedIn()) {
            $barang = $this->DataModel->getJoin('barang', 'barang_keluar.idBarang = barang.idBarang', 'inner');
            $barang = $this->DataModel->getData('barang_keluar')->result_array();
            $data = array("barang" => $barang);
            if ($this->input->post('cari')) {
                $tgl = $this->input->post('tanggal');
                // die(json_encode($tgl));
                $barang = $this->DataModel->getWhere('tanggal_keluar', $tgl);
                $barang = $this->DataModel->getJoin('barang', 'barang_keluar.idBarang = barang.idBarang', 'inner');
                $barang = $this->DataModel->getData('barang_keluar')->result_array();
                // die(json_encode($barang));
                $data = array("barang" => $barang);
                $this->load->view('pages/barangKeluar', $data);
            } else {
                $this->load->view('pages/barangKeluar', $data);
            }
        } else {
            $this->load->view('pages/login');
        }
    }

    public function tambah_bk()
    { 
        if ($this->IsLoggedIn()) {
            $data = array(
                "barang" => $this->DataModel->getData('barang')->result_array()
            );
            if ($this->input->post('kirim')) {
                $this->_initComponent();
                $brg = $this->DataModel->select('harga,stok');
                $brg = $this->DataModel->getWhere('idBarang', $this->idB);
                $brg = $this->DataModel->getData('barang')->row();
                $data = array(
                    "idBarang" => $this->idB,
                    "noPesanan" => $this->no_faktur,
                    "jumlah" => $this->jumlah,
                    "tanggal_keluar" => $this->tgl,
                    "harga" => $this->harga,
                    "total" => $brg->harga * $this->jumlah,
                    "supplier" => $this->supplier
                );
                $stok = $brg->stok - $this->jumlah;
                $dataB = array(
                    "stok" => $stok
                );
                // die(json_encode($dataB));
                $result = $this->DataModel->getWhere('idBarang', $this->idB);
                $result = $this->DataModel->update('barang', $dataB);
                $result = $this->DataModel->insert('barang_keluar', $data);
                if ($result) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <p>Data Berhasil ditambahkan</p></div>');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <p>Data Gagal ditambahkan</p></div>');
                }
                redirect('transaksi/barang_keluar');
            } else {
                $this->load->view('pages/addBarangKeluar', $data);
            }
        } else {
            $this->load->view('pages/login');
        }
    }

    public function hapus_bk()
    { 
        if ($this->IsLoggedIn()) {
            $idB = $this->input->post('idBarang');
            $id = $this->input->post('id');
            $stok = $this->input->post('stok');
            $brg = $this->DataModel->select('stok');
            $brg = $this->DataModel->getWhere('idBarang', $idB);
            $brg = $this->DataModel->getData('barang')->row();
            $stok = $brg->stok + $stok;
            $data = array(
                "stok" => $stok
            );
            $result = $this->DataModel->getWhere('idBarang', $idB);
            $result = $this->DataModel->update('barang', $data);
            $result = $this->DataModel->delete('idBK', $id, 'barang_keluar');
            if ($result) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>Data Berhasil dihapus</p></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>Data Gagal dihapus</p></div>');
            }
            redirect('transaksi/barang_keluar');
        } else {
            $this->load->view('pages/login');
        }
    }

    public function laporan()
    {
        if ($this->IsLoggedIn()) {
            $this->load->view('pages/laporan');
        } else {
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