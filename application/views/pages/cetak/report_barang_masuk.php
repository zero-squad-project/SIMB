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
                    <th scope="col">No</th>
                    <!-- <th scope="col">Id Barang</th> -->
                    <th scope="col">Nama Barang</th>
                    <!-- <th scope="col">Harga Modal</th> -->
                    <th scope="col">Harga</th>
                    <!-- <th scope="col">Stok</th> -->
                    <th scope="col">Jumlah Masuk</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $biaya = 0;
                $no = 1;
                if ($pembelian != null) {
                    foreach ($pembelian as $key) {
                        ?>
                        <tr>
                            <th scope="row" width="10px"><?php echo $no++ ?></th>
                            <td width="300px"><?php echo $key['nama'] ?></td>
                            <td><?php echo $key['harga'] ?></td>
                            <td><?php echo $key['jumlah'] ?></td>
                            <td><?php echo "Rp " . number_format($key['total']) ?></td>
                        </tr>
                        <?php
                        $biaya += $key['total'];
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan=5>
                            <center><b>Tidak Ada Data</b></center>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan=4>
                        <p style="text-align:right"><b>Total Pembelian</b></p>
                    </td>
                    <td>
                        <p><?php echo "Rp " . number_format($biaya) ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>