<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/tabel.css">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="willy" />
    <style>
        body,
        h2 {
            font-family: "Courier new";
        }

        h2,
        h3 {
            margin-bottom: 5px;
            margin-top: 0px;
        }

        .garis {
            height: 2px;
            background-color: #000;
            margin-bottom: 0px;
            margin-top: 10px;
        }

        hr {
            height: 0.5px;
            background-color: #000;
            margin-top: 5px;
        }
    </style>

</head>

<body style="font-family: 'Courier';">
    <div class="container">
        <div align="center" style="margin-top: 20px;">
            <h2 align="center" style="font-family: 'Courier';"><?= $title ?></h2>
            <h3 align="center">LAPORAN PER <?= strtoupper(date('d-M-Y')); ?></h3>
            <hr class="garis" />
            <hr />
        </div>
        <div class="right" align='right' style="margin-top: 0px;"><b>
                <p><?php echo $tgl; ?></p>
            </b></div>

        <table class="table table-striped">
            <thead class="thead bg-dark text-white">
                <tr>
                    <th>No</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $biaya = 0;
                $no = 1;
                if ($barang != null) {
                    foreach ($barang as $key) {
                        ?>
                        <tr>
                            <th scope="row" width="10px"><?php echo $no++ ?></th>
                            <td><?php echo $key['idBarang'] ?></td>
                            <td><?php echo $key['nama'] ?></td>
                            <td><?php echo $key['harga'] ?></td>
                            <td><?php echo $key['stok'] . " pcs" ?></td>
                        </tr>
                    <?php
                }
            } else {
                ?>
                    <tr>
                        <td colspan=5>
                            <center><b>Tidak Ada Data</b></center>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>