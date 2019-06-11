<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="SIMB Project">
    <meta name="author" content="Zero Squad">
    <title>SIMB | Data Barang</title>
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
                    <a href="<?= base_url('transaksi/laporan') ?>">Laporan</a>
                </li>
                <li class="breadcrumb-item active"><?=$this->input->get('page')?></li>
                <!-- Breadcrumb Menu-->
            </ol>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="row">
                                        <?php if ($this->input->get('page') != "barang") { ?>
                                            <div class="col-lg-4">
                                                <div class="form-group row">
                                                    <label class="col-md-3 col-form-label" for="date-input">Tanggal</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" id="date-input" type="date" name="tgl" value="<?php if (isset($tgl)) {
                                                                                                                                        echo $tgl;
                                                                                                                                    } ?>" placeholder="date" required>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <span class="input-group ">
                                                    <?php if ($this->input->get('page') != "barang") {?>
                                                    <input style="margin-right:10px" class="btn btn-primary" id="tampilkan" type="submit" name="kirim" value="Cari">
                                                    <?php }
                                                    if (isset($stat) && $stat == true) { ?>
                                                        <input type="submit" name="export" class="btn btn-success" value="Cetak">
                                                    <?php } ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row">
                                    <?php if (isset($penjualan)) { ?>
                                        <div class="col-lg-12">
                                            <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Barang</th>
                                                        <!-- <th>Harga Modal</th> -->
                                                        <th>Harga Jual</th>
                                                        <th>Terjual</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($penjualan as $row) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $row['nama'] ?></td>
                                                            <!-- <td><?= $row['harga'] ?></td> -->
                                                            <td><?= $row['harga_jual'] ?></td>
                                                            <td><?= $row['jumlah'] ?></td>
                                                            <td><?= $row['total'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                        </div>
                                    <?php } else if (isset($pembelian)) { ?>
                                        <div class="col-lg-12">
                                            <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Barang</th>
                                                        <!-- <th>Harga Modal</th> -->
                                                        <th>Harga Beli</th>
                                                        <th>Jumlah Masuk</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($pembelian as $row) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $row['nama'] ?></td>
                                                            <td><?= $row['harga'] ?></td>
                                                            <td><?= $row['jumlah'] ?></td>
                                                            <td><?= $row['total'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                        </div>
                                    <?php } else if (isset($barang)) { ?>
                                        <div class="col-lg-12">
                                            <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>ID Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>Harga Beli</th>
                                                        <th>Stok</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no = 1;
                                                    foreach ($barang as $row) { ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $row['idBarang'] ?></td>
                                                            <td><?= $row['nama'] ?></td>
                                                            <td><?= $row['harga'] ?></td>
                                                            <td><?= $row['stok'] . " pcs" ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php $this->load->view('assets/javascript') ?>
</body>

</html>