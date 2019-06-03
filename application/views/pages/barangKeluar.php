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
                    <a href="<?= base_url('admin/index') ?>">
                        Admin
                    </a>
                </li>
                <li class="breadcrumb-item active">Barang Keluar</li>
                <!-- Breadcrumb Menu-->
            </ol>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <?= $this->session->flashdata('pesan') ?>
                                <div class="row">
                                    <div class="col">
                                        <a class="btn btn-primary" href="<?= base_url('transaksi/tambah_bk') ?>"><i class="nav-icon fa fa-plus"></i> Barang Keluar</a>
                                        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Import</button>
                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-19px, 35px, 0px);">
                                            <a class="dropdown-item" href="#"><i class="fa fa-excel"></i>Excel</a>
                                            <a class="dropdown-item" href="#"><i class=""></i>CSV</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group row">
                                                <label class="col-md-3 col-form-label" for="date-input">Tanggal</label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="date-input" type="date" name="tanggal" placeholder="date" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <span class="input-group ">
                                                    <input class="btn btn-primary" id="tampilkan" type="submit" name="cari" value="Cari">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Barang</th>
                                            <th width="300px">Nama Barang</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Harga Satuan</th>
                                            <th>Jumlah Keluar</th>
                                            <th>Stok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        if (!empty($barang)) {
                                            foreach ($barang as $bar) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $bar['idBarang']; ?></td>
                                                    <td><?php echo $bar['nama']; ?></td>
                                                    <td><?php echo date("d-m-Y", strtotime($bar['tanggal_keluar'])); ?></td>
                                                    <td><?php echo $bar['harga'] ?></td>
                                                    <td><?php echo $bar['jumlah']; ?></td>
                                                    <td><?php echo $bar['stok']; ?></td>
                                                    <td>
                                                        <span id="delete" data-toggle="modal" data-target="#addModal" data-id="<?= $bar['idBarang'] ?>">
                                                            <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Stok" class="btn btn-primary" data-toggle="modal" data-target="#editModal"><i class="nav-icon fa fa-plus"></i></button>
                                                        </span>
                                                        <span id="delete" data-toggle="modal" data-target="#deleteModal" data-id="<?= $bar['idBK'] ?>" data-idb="<?= $bar['idBarang'] ?>" data-stok="<?= $bar['jumlah'] ?>">
                                                            <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data"><i class="nav-icon fa fa-trash"></i></button>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php }
                                    } else {
                                        ?>
                                            <tr>
                                                <td colspan="7">
                                                    <center>Data Tidak ada</center>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
            </div>
        </main>
    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Barang</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="<?= base_url('transaksi/hapus_bk') ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" required name="id">
                        <input type="hidden" required name="idBarang">
                        <input type="hidden" required name="stok">
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
    <script>
        $(document).on("click", "#delete", function() {
            var id = $(this).data('id');
            var idB = $(this).data('idb');
            var stok = $(this).data('stok');
            $('input[name="id"]').val(id);
            $('input[name="idBarang"').val(idB);
            $('input[name="stok"').val(stok);
        });
    </script>
</body>

</html>