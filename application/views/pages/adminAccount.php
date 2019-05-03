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
                <li class="breadcrumb-item active">Admin Account</li>
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
                                <a href="<?php echo base_url('Admin/addAdminAccount') ?>"><i
                                        class="nav-icon fa fa-plus"></i> Add
                                    Admin Account</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($admin as $admin) {
                                            ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $admin['username']; ?></td>
                                            <td><?php echo $admin['email'];    ?></td>
                                            <td><?php echo $admin['password']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('Admin/edit_data/' . $admin['id']); ?>"
                                                    class="btn btn-success">Edit</a>
                                                <a href="<?php echo base_url('Admin/deleteAdminAccount/' . $admin['id']); ?>"
                                                    class="btn btn-danger" onClick="">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#">Prev</a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
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