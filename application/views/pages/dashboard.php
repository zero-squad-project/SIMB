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
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body p-0 d-flex align-items-center">
                                    <i class="icon-people bg-primary p-4 px-5 font-2xl mr-3"></i>
                                    <div>
                                        <div class="text-value-sm text-primary"><?=$admin?></div>
                                        <div class="text-muted text-uppercase font-weight-bold small">Total Admin</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body p-0 d-flex align-items-center">
                                    <i class="icon-layers bg-primary p-4 px-5 font-2xl mr-3"></i>
                                    <div>
                                        <div class="text-value-sm text-primary"><?=$barang?></div>
                                        <div class="text-muted text-uppercase font-weight-bold small">Total Barang</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body p-0 d-flex align-items-center">
                                    <i class="icon-action-redo bg-primary p-4 px-5 font-2xl mr-3"></i>
                                    <div>
                                        <div class="text-value-sm text-primary"><?php if ($bk == null) {
                                                                                    $bk = 0;
                                                                                };
                                                                                echo $bk; ?></div>
                                        <div class="text-muted text-uppercase font-weight-bold small">Barang Keluar Hari
                                            ini</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card">
                                <div class="card-body p-0 d-flex align-items-center">
                                    <i class="icon-action-undo bg-primary p-4 px-5 font-2xl mr-3"></i>
                                    <div>
                                        <div class="text-value-sm text-primary"><?php if ($bm == null) {
                                                                                    $bm = 0;
                                                                                };
                                                                                echo $bm; ?></div>
                                        <div class="text-muted text-uppercase font-weight-bold small">Barang Masuk Hari
                                            ini</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-wrapper">
                                <canvas id="canvas-2"></canvas>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row text-center">
                                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                    <div class="text-muted">Visits</div>
                                    <strong>29.703 Users (40%)</strong>
                                    <div class="progress progress-xs mt-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md mb-sm-2 mb-0">
                                    <div class="text-muted">Unique</div>
                                    <strong>24.093 Users (20%)</strong>
                                    <div class="progress progress-xs mt-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </main>
    </div>
    <?php $this->load->view('assets/javascript') ?>
    <script src="<?= base_url() ?>assets/node_modules/chart.js/dist/Chart.min.js"></script>
    <script
        src="<?= base_url() ?>assets/node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
    <script>
        var random = function random() {
            return Math.round(Math.random() * 100);
        }; // eslint-disable-next-line no-unused-vars
        var barChart = new Chart($('#canvas-2'), {
            type: 'bar',
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli','Agustus','September','Oktober','Nopember','Desember'],
                datasets: [{
                    label: 'Barang Masuk',
                    backgroundColor: 'rgba(220, 220, 220, 0.5)',
                    borderColor: 'rgba(220, 220, 220, 0.8)',
                    highlightFill: 'rgba(220, 220, 220, 0.75)',
                    highlightStroke: 'rgba(220, 220, 220, 1)',
                    data: [10, random(), random(), random(), random(), random(), random(),random(),random(),random(),random(),random()]
                }, {
                    label: 'Barang Keluar',
                    backgroundColor: 'rgba(151, 187, 205, 0.5)',
                    borderColor: 'rgba(151, 187, 205, 0.8)',
                    highlightFill: 'rgba(151, 187, 205, 0.75)',
                    highlightStroke: 'rgba(151, 187, 205, 1)',
                    data: [5, random(), random(), random(), random(), random(), random(),random(),random(),random(),random(),random()]
                }]
            },
            options: {
                responsive: true
            }
        }); // eslint-disable-next-line no-unused-vars
    </script>
</body>

</html>