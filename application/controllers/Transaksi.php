<?php

class Transaksi extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('upload');
        $this->load->library('CSVReader');
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

    public function import()
    {
        if ($this->IsLoggedIn()) {
            if ($this->input->post('kirim')) {
                $upload = $this->upload_file("lazada");
                if ($upload['result'] == "success") {
                    $result =  $this->csvreader->parse_file('assets/bk/lazada.csv');
                    $data = array();
                    $temp = array();
                    $i = 0;
                    foreach ($result as $row) {
                        if (!isset($temp[$row['Seller SKU']])) {
                            $temp[$row['Seller SKU']] = 1;
                        } else {
                            $temp[$row['Seller SKU']] = $temp[$row['Seller SKU']] + 1;
                        }
                        $data[$i]['idBarang'] = $row['Seller SKU'];
                        $data[$i]['harga'] = $row['Unit Price'];
                        $data[$i]['noPesanan'] = $row['Lazada SKU'];
                        $data[$i]['jumlah'] = 0;
                        $data[$i]['tanggal_keluar'] = date("Y-m-d");
                        $data[$i]['waktu_keluar'] = date("Y-m-d H:i:s");
                        $data[$i]['total'] = $row['Unit Price'];
                        $i++;
                    }
                    $output = $this->unique_multi_array($data, 'idBarang');
                    $dt = $this->DataModel->select('idBarang,stok');
                    $dt = $this->DataModel->getData('barang')->result_array();
                    $stok = array();
                    foreach ($dt as $row) {
                        $stok[$row['idBarang']] = $row['stok'];
                    }
                    $a = 0;
                    $out = array();
                    foreach ($output as $row => $val) {
                        $output[$row]['jumlah'] = $temp[$val['idBarang']];
                        $output[$row]['total'] = $temp[$val['idBarang']] * $val['harga'];
                        $out[$a]['idBarang'] = $val['idBarang'];
                        $out[$a]['stok'] = $stok[$val['idBarang']] - $temp[$val['idBarang']];
                        $a++;
                    }
                    // die(json_encode($out));
                    $query = $this->DataModel->insert_multiple('barang_keluar', $output);
                    $query = $this->DataModel->update_multiple('barang', $out, 'idBarang');
                    if ($query) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p>Data Berhasil ditambahkan</p></div>');
                    }
                    redirect('transaksi/barang_keluar');
                }
            } else {
                $this->load->view('pages/importFile');
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
            if ($this->input->get('page') == "barang_keluar") {
                $tgl = $this->input->post('tgl');
                // die(json_encode($tgl));
                $penjualan = $this->DataModel->select('barang.nama,barang.harga,barang.stok,barang_keluar.jumlah,barang_keluar.total,barang_keluar.harga as harga_jual');
                $penjualan = $this->DataModel->getWhere('barang_keluar.tanggal_keluar', $tgl);
                $penjualan = $this->DataModel->getJoin('barang', 'barang.idBarang=barang_keluar.idBarang', 'inner');
                $penjualan = $this->DataModel->getData('barang_keluar')->result_array();
                if ($this->input->post('kirim')) {
                    $data = array(
                        "tgl" => $tgl,
                        "stat" => true,
                        "penjualan" => $penjualan);
                    $this->load->view('pages/laporan', $data);
                } else if ($this->input->post('export')) {
                    $data = array(
                        "title" => 'Laporan Penjualan Harian',
                        "tgl" => $this->tgl_indo(date('d-m-Y')),
                        "penjualan" => $penjualan
                    );
                    $view = "pages/cetak/report_barang_keluar";
                    // $this->load->view($view, $data);
                    $this->exportPDFP($view, $data,'Laporan_Penjualan_');
                }else{
                    $this->load->view('pages/laporan');
                }
            }else if($this->input->get('page') == "barang_masuk"){
                $tgl = $this->input->post('tgl');
                // die(json_encode($tgl));
                $pembelian = $this->DataModel->select('barang.nama,barang.harga,barang.stok,barang_masuk.jumlah,barang_masuk.total');
                $pembelian = $this->DataModel->getWhere('barang_masuk.tanggal_masuk', $tgl);
                $pembelian = $this->DataModel->getJoin('barang', 'barang.idBarang=barang_masuk.idBarang', 'inner');
                $pembelian = $this->DataModel->getData('barang_masuk')->result_array();
                if ($this->input->post('kirim')) {
                    $data = array(
                        "tgl" => $tgl,
                        "stat" => true,
                        "pembelian" => $pembelian);
                    $this->load->view('pages/laporan', $data);
                } else if ($this->input->post('export')) {
                    $data = array(
                        "title" => 'Laporan Pembelian Harian',
                        "tgl" => $this->tgl_indo(date('d-m-Y')),
                        "pembelian" => $pembelian
                    );
                    $view = "pages/cetak/report_barang_masuk";
                    // $this->load->view($view, $data);
                    $this->exportPDFP($view, $data,'Laporan_Pembelian_');
                }else{
                    $this->load->view('pages/laporan');
                }
            }else if($this->input->get('page') == "barang"){
                $barang = $this->DataModel->getData('barang')->result_array();
                if ($this->input->post('export')) {
                    $data = array(
                        "title" => 'Laporan Barang',
                        "tgl" => $this->tgl_indo(date('d-m-Y')),
                        "barang" => $barang
                    );
                    $view = "pages/cetak/report_barang";
                    $this->load->view($view,$data);
                    $this->exportPDFL($view, $data,'Laporan_Barang_');
                }else{
                    $data = array("stat" => true,"barang" => $barang);
                    $this->load->view('pages/laporan',$data);
                }
            }else{
                $this->load->view('pages/laporan_view');
            }
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

    private function upload_file($filename)
    {
        // Load librari upload
        $config['upload_path'] = 'assets/bk';
        $config['allowed_types'] = 'csv';
        $config['max_size']  = '2048';
        $config['overwrite'] = true;
        $config['file_name'] = $filename;

        $this->upload->initialize($config);
        if ($this->upload->do_upload('barang')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    private function unique_multi_array($array, $key)
    {
        $temp_array = array();
        $i = 0;
        $key_array = array();

        foreach ($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                $temp_array[$i] = $val;
            }
            $i++;
        }
        return $temp_array;
    }
}