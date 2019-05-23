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
                <li class="breadcrumb-item">
                    <a href="<?= base_url('admin/category') ?>">Data Kategori</a>
                </li>
                <li class="breadcrumb-item active">Tambah Kategori</li>
                <!-- Breadcrumb Menu-->
                <!-- <li class="breadcrumb-menu d-md-down-none">
                    <div class="btn-group" role="group" aria-label="Button group">
                        <a class="btn" href="#">
                            <i class="icon-speech"></i>
                        </a>
                        <a class="btn" href="./">
                            <i class="icon-graph"></i>  Dashboard</a>
                        <a class="btn" href="#">
                            <i class="icon-settings"></i>  Settings</a>
                    </div>
                </li> -->
            </ol>
            <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <a href="<?php echo base_url('admin/category') ?>"><i class="nav-icon fa fa-arrow-left"></i> Kembali</a>
                  </div>
                  <div class="card-body">
                    <form action="" method="post">
                      <div class="form-group">
                        <label for="nf-email">Nama</label>
                        <input class="form-control" id="" type="text" name="nama" placeholder="Masukkan Nama kategori" value="<?= set_value('nama') ?>" required>
                        <?= form_error('nama') ?>
                        <!-- <span class="help-block">Please enter your email</span> -->
                      </div>
                      <div class="form-group">
                        <label for="nf-password">Description (optional)</label>
                        <textarea class="form-control" rows="10" id="" type="text" name="description" placeholder="Masukkan Deskripsi" required><?= set_value('description') ?></textarea>
                        <?= form_error('description') ?>
                        <!-- <span class="help-block">Please enter your password</span> -->
                      </div>
                    
                  </div>
                  <div class="card-footer">
                    <input class="btn btn-sm btn-primary" type="submit" value="kirim" name="kirim">
                      <!-- <i class="fa fa-dot-circle-o"></i> -->
                    <input class="btn btn-sm btn-danger" type="reset" value="batal" name="batal">
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