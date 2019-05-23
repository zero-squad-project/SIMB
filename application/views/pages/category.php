<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="SIMB Project">
    <meta name="author" content="Zero Squad">
    <title>Category Page</title>
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
                <li class="breadcrumb-item active">Kategori</li>
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
                                <a class="btn btn-primary mb-1" data-toggle="modal" data-target="#primaryModal"
                                    href="#"><i
                                        class="nav-icon fa fa-plus"></i> Tambah Kategori</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th width="600px">Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($Category as $category) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $category['name']; ?></td>
                                            <td><?php echo $category['description']; ?></td>
                                            <td>
                                                <a href="#"
                                                    class="btn btn-success" data-toggle="modal" data-target="#editModal">Edit</a>
                                                <a href="#"
                                                    class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!-- <nav>
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
                                </nav> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
            </div>
        </main>
    </div>
    <div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-primary" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kategori</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('category/addCategory') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nf-email">Nama</label>
                            <input class="form-control" id="" type="text" name="nama"
                                placeholder="Masukkan Nama kategori" value="<?= set_value('nama') ?>" required>
                            <?= form_error('nama') ?>
                            <!-- <span class="help-block">Please enter your email</span> -->
                        </div>
                        <div class="form-group">
                            <label for="nf-password">Description (optional)</label>
                            <textarea class="form-control" rows="5" id="" type="text" name="description"
                                placeholder="Masukkan Deskripsi"><?= set_value('description') ?></textarea>
                            <?= form_error('description') ?>
                            <!-- <span class="help-block">Please enter your password</span> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <input class="btn btn-primary" type="submit" name="kirim" value="kirim">
                    </div>
                </form>
            </div>
            <!-- /.modal-content-->
        </div>
        <!-- /.modal-dialog-->
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-success" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kategori</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('category/eddCategory/') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nf-email">Nama</label>
                            <input class="form-control" id="" type="text" name="nama"
                                placeholder="Masukkan Nama Kategori" value="<?php //echo $category->name; ?>" required>
                            <?php //echo form_error('nama') ?>
                            <!-- <span class="help-block">Please enter your email</span> -->
                        </div>
                        <div class="form-group">
                            <label for="nf-password">Deskripsi (optional)</label>
                            <textarea rows="10" class="form-control" id="" type="text-area" name="description"
                                placeholder="Masukkan Deskripsi Kategori"><?php //echo $category->description; ?></textarea>
                            <?php //echo form_error('description') ?>
                            <!-- <span class="help-block">Please enter your password</span> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <input class="btn btn-success" type="submit" name="kirim" value="kirim">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Kategori</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('category/deleteCategory/') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id">
                        Apakah anda yakin menghapus data ini?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <input class="btn btn-danger" type="submit" name="kirim" value="Ya!">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $this->load->view('assets/javascript') ?>
</body>

</html>