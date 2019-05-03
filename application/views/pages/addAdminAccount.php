<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="SIMB Project">
    <meta name="author" content="Zero Squad">
    <title>Admin Account</title>
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
                    <a href="#">Admin</a>
                </li>
                <li class="breadcrumb-item active">Add Admin</li>
                <!-- Breadcrumb Menu-->
                <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group">
                        <a class="btn" href="#">
                            <i class="icon-speech"></i>
                        </a>
                        <a class="btn" href="./">
                            <i class="icon-graph"></i>  Dashboard</a>
                        <a class="btn" href="#">
                            <i class="icon-settings"></i>  Settings</a>
                    </div>
                </li>
            </ol>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="<?php echo base_url('Category/index') ?>"><i class="nav-icon fa fa-arrow-left"></i> Back</a>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url() ?>admin/proses_simpan_admin" method="post">
                                    <div class="form-group">
                                        <label for="nf-username">Username</label>
                                        <input class="form-control" id="" type="text" name="username" placeholder="Enter Username...">
                                        <?= form_error('username') ?>
                                        <!-- <span class="help-block">Please enter your email</span> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-email">Email</label>
                                        <input class="form-control" id="" type="text" name="email" placeholder="Enter email...">
                                        <?= form_error('password') ?>
                                        <!-- <span class="help-block">Please enter your password</span> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="nf-password">Password</label>
                                        <input class="form-control" id="" type="password" name="pass" placeholder="Enter Password...">
                                        <?= form_error('password') ?>
                                        <!-- <span class="help-block">Please enter your password</span> -->
                                    </div>



                            </div>
                            <div class="card-footer">
                                <input class="btn btn-sm btn-primary" type="submit" name="kirim">
                                <!-- <i class="fa fa-dot-circle-o"></i> -->
                                <input class="btn btn-sm btn-danger" type="reset" name="batal">
                                <!-- <i class="fa fa-ban"></i> Reset</button> -->
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
            </div>
        </main>
    </div>
    <?php $this->load->view('assets/javascript') ?>
</body>

</html>