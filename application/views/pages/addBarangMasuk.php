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
                            <?= $this->session->flashdata('pesan') ?>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- <div class="form-group">
                                            <label for="nf-email">ID Barang (SKU)</label>
                                            <input class="form-control" id="" type="text" name="id" placeholder="Masukkan ID Barang" value="<?= set_value('id') ?>" required>
                                            <?= form_error('nama') ?>
                                            <span class="help-block">Please enter your email</span>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="nf-email">Nama Barang</label>
                                            <select required class="form-control" aria-required="true" id="select1" name="id">
                                                <option value="">Pilih Barang</option>
                                                <?php
                                                if (!empty($barang)) {
                                                    foreach ($barang as $bar) { ?>
                                                        <option value="<?= $bar['idBarang'] ?>"><?= $bar['nama'] ?></option>
                                                    <?php }
                                            } ?>
                                            </select>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="nf-email">Tanggal Masuk</label>
                                            <input class="form-control" id="" type="date" name="tgl" value="<?= set_value('tgl') ?>" required>
                                            <?= form_error('tgl') ?>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nf-email">Jumlah Barang Masuk</label>
                                            <input class="form-control" id="" type="number" name="jumlah" placeholder="xxx" value="<?= set_value('jumlah') ?>" required>
                                            <?= form_error('jumlah') ?>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="nf-email">No Faktur (jika ada)</label>
                                            <input class="form-control" id="" type="text" name="faktur" placeholder="Masukkan No. Faktur" value="<?= set_value('faktur') ?>">
                                            <?= form_error('faktur') ?>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="nf-email">Supplier (jika ada)</label>
                                            <input class="form-control" id="" type="text" name="supplier" placeholder="Masukkan Nama Supplier" value="<?= set_value('supplier') ?>">
                                            <?= form_error('supplier') ?>
                                            <!-- <span class="help-block">Please enter your email</span> -->
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="nf-email">Harga Jual / Barang</label>
                                            <input class="form-control" id="harga" type="number" name="harga" placeholder="Rp xxx.xxx.xxx" value="<?= set_value('harga_jual') ?>" required>
                                            <?= form_error('min_stok') ?>
                                            <span class="help-block">Please enter your email</span>
                                        </div> -->
                                        <!-- <div class="form-group">
                                            <label for="nf-email">Total</label>
                                            <input class="form-control" id="harga" type="number" name="total" placeholder="Rp xxx.xxx.xxx" value="<?= set_value('total') ?>" required>
                                            <?= form_error('total') ?>
                                            <span class="help-block">Please enter your email</span>
                                        </div> -->
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
    <!-- <script src="<?= base_url() ?>assets/node_modules/jquery/dist/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Format mata uang.
            $('#harga').mask('000.000.000.000', {
                reverse: true
            });

        })
    </script> -->
</body>

</html>