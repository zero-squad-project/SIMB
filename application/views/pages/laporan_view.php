<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="SIMB Project">
    <meta name="author" content="Zero Squad">
    <title>Dashboard Page</title>
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
                <li class="breadcrumb-item active">Dashboard</li>
                <!-- Breadcrumb Menu-->
            </ol>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <!-- /.col-->
                        <div class="col-sm-6 col-lg-4">
                            <div class="card">
                                <div class="card-body p-0 d-flex align-items-center">
                                    <i class="icon-layers bg-primary p-4 px-5 font-2xl mr-3"></i>
                                    <div>
                                        <div class="text-value-sm text-primary"></div>
                                        <div class="text-muted text-uppercase font-weight-bold small"><a href="<?= base_url('transaksi/laporan?page=barang') ?>">Laporan Data Barang</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="card">
                                <div class="card-body p-0 d-flex align-items-center">
                                    <i class="icon-action-redo bg-primary p-4 px-5 font-2xl mr-3"></i> 
                                    <div>
                                        <div class="text-value-sm text-primary"></div>
                                        <div class="text-muted text-uppercase font-weight-bold small"><a href="<?= base_url('transaksi/laporan?page=barang_keluar') ?>">Laporan Barang Keluar</a></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="card">
                                <div class="card-body p-0 d-flex align-items-center">
                                    <i class="icon-action-undo bg-primary p-4 px-5 font-2xl mr-3"></i>
                                    <div>
                                        <div class="text-value-sm text-primary"></div>
                                        <div class="text-muted text-uppercase font-weight-bold small"><a href="<?= base_url('transaksi/laporan?page=barang_masuk') ?>">Laporan Barang Masuk</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row-->
                </div>
        </main>
    </div>
    <?php $this->load->view('assets/javascript') ?>
    <script src="<?= base_url() ?>assets/node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
</body>

</html>