<?php

class Products extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    private $id, $nama, $satuan, $stok, $minStok, $harga, $ket, $kategori, $foto;

    public function index()
    {
        if ($this->IsLoggedIn()) {
            $barang = $this->DataModel->getJoin('category', 'barang.idKategori = category.id', 'inner');
            $barang = $this->DataModel->getData('barang')->result_array();
            $data = array('barang' => $barang);
            $this->load->view('pages/barang', $data);
        } else {
            $this->load->view('pages/login');
        }
    }

    public function detail($id){
        if ($this->IsLoggedIn()) {
            $barang = $this->DataModel->getWhere('idBarang',$id);
            $barang = $this->DataModel->getJoin('category','barang.idKategori = category.id','inner');
            $barang = $this->DataModel->getData('barang')->row();
            $data = array("barang" => $barang);
            $this->load->view('pages/detailBarang',$data);
        }else{
            $this->load->view('pages/login');
        }
    }

    public function tambah()
    {
        if ($this->IsLoggedIn()) {
            $data = array('kategori' => $this->DataModel->getData('category')->result_array());
            // die(json_encode($data));
            if ($this->input->post('kirim')) {
                $this->_validate();
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('pages/addBarang', $data);
                } else {
                    if (!empty($_FILES['foto']['name'])) {
                        $this->_initComponent();
                        $this->_uploadImage($this->foto);
                        if (!$this->upload->do_upload('foto')) {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <p>' . $this->upload->display_errors() . '</p></div>');
                            $this->load->view('pages/addBarang',$data);
                            // var_dump($this->upload->display_errors());
                        } else {
                            $eks = substr(strrchr($_FILES['foto']['name'], '.'), 1);
                            $data = array(
                                "idBarang" => $this->id,
                                "idKategori" => $this->kategori,
                                "nama" => $this->nama,
                                "harga" => $this->harga,
                                "stok" => $this->stok,
                                "stok_min" => $this->minStok,
                                "satuan" => $this->satuan,
                                "keterangan" => $this->ket,
                                "foto" => $this->foto . "." . $eks
                            );
                            $result = $this->DataModel->insert('barang', $data);
                            if ($result) {
                                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <p>Data Berhasil ditambahkan</p></div>');
                            } else {
                                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <p>Data Gagal ditambahkan</p></div>');
                            }
                            redirect('products/index');
                        }
                    }
                }
            } else {
                $this->load->view('pages/addBarang', $data);
            }
        } else {
            $this->load->view('pages/login');
        }
    }

    public function ubah($id)
    {
        if ($this->IsLoggedIn()) {
            $barang = $this->DataModel->getWhere('idBarang', $id);
            $barang = $this->DataModel->getData('barang')->row();
            $kategori = $this->DataModel->getData('category')->result_array();
            $data = array('barang' => $barang, 'kategori' => $kategori);
            if ($this->input->post('kirim')) {
                $this->_validate();
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('pages/editBarang', $data);
                } else {
                    $this->_initComponent();
                    if (!empty($_FILES['foto']['name'])) {
                        unlink("assets/img/barang/" . $barang->foto);
                        $this->_uploadImage($this->foto);
                        if (!$this->upload->do_upload('foto')) {
                            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <p>' . $this->upload->display_errors() . '</p></div>');
                            $this->load->view('pages/editBarang',$data);
                            // var_dump($this->upload->display_errors());
                        } else {
                            $eks = substr(strrchr($_FILES['foto']['name'], '.'), 1);
                            $data = array(
                                "idBarang" => $this->id,
                                "idKategori" => $this->kategori,
                                "nama" => $this->nama,
                                "harga" => $this->harga,
                                "stok" => $this->stok,
                                "stok_min" => $this->minStok,
                                "satuan" => $this->satuan,
                                "keterangan" => $this->ket,
                                "foto" => $this->foto . "." . $eks
                            );
                        }      
                    }else{
                        $data = array(
                            "idBarang" => $this->id,
                            "idKategori" => $this->kategori,
                            "nama" => $this->nama,
                            "harga" => $this->harga,
                            "stok" => $this->stok,
                            "stok_min" => $this->minStok,
                            "satuan" => $this->satuan,
                            "keterangan" => $this->ket,
                        );
                    }
                    $result = $this->DataModel->getWhere('idBarang',$id);
                    $result = $this->DataModel->update('barang',$data);
                    if ($result) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>Data Berhasil diubah</p></div>');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>Data Gagal diubah</p></div>');
                    }
                    redirect('products/index');
                }
            } else {
                $this->load->view('pages/editBarang', $data);
            }
        } else {
            $this->load->view('pages/login');
        }
    }

    public function hapus()
    {
        if ($this->IsLoggedIn()) {
            $id = $this->input->post('id');
            $barang = $this->DataModel->select('foto');
            $barang = $this->DataModel->getWhere('idBarang', $id);
            $barang = $this->DataModel->getData('barang')->row();
            if ($barang != null) {
                unlink("assets/img/barang/" . $barang->foto);
            }
            $result = $this->DataModel->delete('idBarang', $id, 'barang');
            if ($result) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>Data Berhasil dihapus</p></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>Data Gagal dihapus</p></div>');
            }
            redirect('products/index');
        } else {
            $this->load->view('pages/login');
        }
    }

    private function _validate()
    {
        $this->form_validation->set_rules('nama', 'Nama Barang', 'required');
        $this->form_validation->set_rules('id', 'ID Barang', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan Barang', 'required');
        $this->form_validation->set_rules('stok', 'Stok Barang', 'required');
        $this->form_validation->set_rules('min_stok', 'Minimal Stok Barang', 'required');
        $this->form_validation->set_rules('harga_jual', 'Harga Jual Produk', 'required');
    }

    private function _initComponent()
    {
        $this->nama = $this->input->post('nama');
        $this->id = $this->input->post('id');
        $this->kategori = $this->input->post('kategori');
        $this->satuan = $this->input->post('satuan');
        $this->stok = $this->input->post('stok');
        $this->minStok = $this->input->post('min_stok');
        $this->harga = $this->input->post('harga_jual');
        $this->ket = $this->input->post('ket');
        $foto = str_replace(" ","_",$this->id);
        $this->foto = $foto."_".$this->kategori;
    }

    private function _uploadImage($image)
    {
        $config['upload_path'] = 'assets/img/barang';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = $image;
        $this->upload->initialize($config);
    }
}