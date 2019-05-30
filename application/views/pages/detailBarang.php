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
                <li class="breadcrumb-item active">Data Barang</li>
                <!-- Breadcrumb Menu-->
            </ol>
            <div class="container-fluid">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Detail Barang
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img width="300px" src="<?=base_url()?>assets/img/barang/<?=$barang->foto?>">
                                </div>
                                <div class="col-lg-8">
                                    <p>
                                        <b>Nama Barang : </b><pre><?=$barang->nama?></pre>
                                    <p>
                                    <p>
                                        <b>Kategori Barang : </b><pre><?=$barang->name?></pre>
                                    <p>
                                    <p>
                                        <b>Stok Barang : </b><pre><?=$barang->stok?></pre>
                                    <p>
                                    <p>
                                        <b>Harga Jual : </b><pre><?php echo "Rp.".number_format($barang->harga,"2");?></pre>
                                    <p>
                                    <p>
                                        <b>Deskripsi Barang : </b><pre><?=$barang->keterangan?></pre>
                                    <p>
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