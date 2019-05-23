<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="SIMB Project">
    <meta name="author" content="Zero Squad">
    <title>Data Barang</title>
    <?php $this->load->view('assets/stylesheet') ?>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <?php $this->load->view('master/header'); ?>
    <div class="app-body">
        <?php $this->load->view('master/sidebar'); ?>
        <main class="main">
            <!-- Breadcrumb-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">
                    <a href="<?= base_url('admin/products') ?>">Data Barang</a>
                </li>
                <li class="breadcrumb-item active">Tambah Barang</li>
            </ol>
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo base_url('admin/products') ?>"><i class="nav-icon fa fa-arrow-left"></i>
                                Kembali</a>
                                <?=$this->session->flashdata('pesan')?>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nf-email">ID Barang (SKU)</label>
                                            <input class="form-control" id="" type="text" name="id"
                                                placeholder="Masukkan ID Barang" value="<?= set_value('id') ?>"
                                                required>
                                            <?= form_error('nama') ?>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="nf-email">Nama</label>
                                            <input class="form-control" id="" type="text" name="nama"
                                                placeholder="Masukkan Nama Barang" value="<?= set_value('nama') ?>"
                                                required>
                                            <?= form_error('nama') ?>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="nf-email">Kategori</label>
                                            <select required class="form-control" aria-required="true" id="select1" name="kategori">
                                                <option value="">Pilih Kategori</option>
                                                <?php
                                                if(!empty($kategori)){ 
                                                    foreach($kategori as $cat){ ?>
                                                    <option value="<?=$cat['id']?>"><?=$cat['name']?></option>
                                                <?php }
                                                } ?>
                                            </select>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="nf-email">Satuan</label>
                                            <input class="form-control" id="" type="text" name="satuan"
                                                placeholder="Masukkan Satuan Barang" value="<?= set_value('satuan') ?>"
                                                required>
                                            <?= form_error('satuan') ?>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="nf-email">Foto</label>
                                            <input class="form-control" id="" type="file" name="foto" accept="image/png,image/jpg,image/jpeg">
                                            <?= form_error('satuan') ?>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nf-email">Stok</label>
                                            <input class="form-control" id="" type="number" name="stok"
                                                placeholder="Masukkan Stok Barang" value="<?= set_value('stok') ?>"
                                                required>
                                            <?= form_error('stok') ?>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="nf-email">Stok Minimal</label>
                                            <input class="form-control" id="" type="number" name="min_stok"
                                                placeholder="Masukkan Stok Minimal Barang"
                                                value="<?= set_value('min_stok') ?>" required>
                                            <?= form_error('min_stok') ?>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="nf-email">Harga Jual</label>
                                            <input class="form-control" id="" type="number" name="harga_jual"
                                                placeholder="Masukkan Harga Jual Barang"
                                                value="<?= set_value('harga_jual') ?>" required>
                                            <?= form_error('min_stok') ?>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="nf-password">Keterangan / Deskripsi (optional)</label>
                                            <textarea class="form-control" rows="5" id="" type="text" name="ket"
                                                placeholder="Masukkan Deskripsi"
                                                required><?= set_value('ket') ?></textarea>
                                            <?= form_error('description') ?>
                                            <!-- <span class="help-block">Please enter your password</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input class="btn btn-md btn-primary" type="submit" value="kirim" name="kirim">
                                <!-- <i class="fa fa-dot-circle-o"></i> -->
                                <input class="btn btn-md btn-danger" type="reset" value="batal" name="batal">
                                <!-- <i class="fa fa-ban"></i> Reset</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </main>
    </div>
    <?php $this->load->view('assets/javascript') ?>
</body>

</html>