<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>admin/index">
                    <i class="nav-icon icon-speedometer"></i> Dashboard
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-folder"></i> Data Master</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" style="padding-left:30px" href="<?= base_url() ?>admin/products">
                            <i class="nav-icon icon-social-dropbox"></i> Data Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="padding-left:30px" href="<?= base_url() ?>admin/category">
                            <i class="nav-icon fa fa-list"></i> Data Kategori
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-basket-loaded"></i> Transaksi</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" style="padding-left:30px" href="<?=base_url('Transaksi/barang_masuk')?>">
                            <i class="nav-icon icon-action-undo"></i> Barang Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="padding-left:30px" href="<?=base_url('Transaksi/barang_keluar')?>">
                            <i class="nav-icon icon-action-redo"></i> Barang Keluar</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>Transaksi/laporan">
                    <i class="nav-icon fa fa-file"></i> Laporan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>admin/account">
                    <i class="nav-icon fa fa-users"></i> Manajemen Admin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>admin/change_password">
                    <i class="nav-icon fa fa-key"></i> Ubah Password</a>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
