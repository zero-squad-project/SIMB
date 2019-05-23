<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="SIMB Project">
    <meta name="author" content="Zero Squad">
    <title> SIMB | Ubah Password</title>
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
                <li class="breadcrumb-item active">Ubah Password</li>
                <!-- Breadcrumb Menu-->
            </ol>
            <div class="container-fluid">
                <?= $this->session->flashdata('pesan') ?>
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">Ubah Password</div>
                                <div class="card-body">
                                    <form action="<?= base_url('admin/change_password') ?>" method="POST">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-asterisk"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control" id="username" type="password" name="pass_old"
                                                    placeholder="Password Lama">
                                            </div>
                                            <?= form_error('pass_old') ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-asterisk"></i>
                                                    </span>
                                                </div>
                                                <input class="form-control" id="password" type="password"
                                                    name="pass_new" placeholder="Password Baru">
                                            </div>
                                            <?= form_error('pass_new') ?>
                                        </div>
                                        <div class="form-group form-actions">
                                            <input type="submit" name="kirim" value="Kirim" class="btn btn-md btn-success">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- /.row-->
                </div>
        </main>
    </div>
    <?php $this->load->view('assets/javascript') ?>
</body>

</html>