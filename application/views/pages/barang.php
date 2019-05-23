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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <?= $this->session->flashdata('pesan') ?>
                                <a class="btn btn-primary mb-1" href="<?= base_url('products/tambah') ?>"><i class="nav-icon fa fa-plus"></i> Barang</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-responsive-sm table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Kategori</th>
                                            <th>Stok</th>
                                            <th>Satuan</th>
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
                                                    <td><?php echo $bar['name']; ?>
                                                    <td><?php echo $bar['stok']; ?></td>
                                                    <td><?php echo $bar['satuan']; ?></td>
                                                    <td>
                                                        <a href="<?=base_url('products/ubah/'.$bar['idBarang'])?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data" class="btn btn-success" data-toggle="modal" data-target="#editModal"><i class="nav-icon fa fa-edit"></i></a>
                                                        <span id="delete" data-toggle="modal" data-target="#deleteModal" data-id="<?= $bar['idBarang'] ?>" >
                                                            <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data" ><i class="nav-icon fa fa-trash"></i></button>
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
                <form action="<?= base_url('products/hapus') ?>" method="post">
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
    <script>
        $(document).on("click", "#delete", function() {
            var id = $(this).data('id');
            $('input[name="id"]').val(id);
        });
    </script>
    <script src="<?= base_url() ?>assets/js/tooltips.js"></script>
</body>

</html>