<?php

include ('../../function.php');

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.css">
    <title>Zakat Fitrah | Data Muzakki</title>
    <link rel="icon" type="image/png" href="../../assets/img/money-bag.png">
</head>
<body>
<!-- NAV HEAD -->
<header>
    <div class="header-wrapper">
        <h2>Zakat Fitrah</h2>
        <a class="btn btn-danger" href="../../logout.php">Logout</a>
    </div>
</header>
<!-- NAV HEAD END -->

<main>
    <div class="flex-container">
        <!-- SIDE BAR -->
        <div class="sidemenu">
            <div class="menu">
                <a href="../../index.php"><img src="../../assets/img/home.png" class="menu-icon">Beranda</a>
            </div>
            <div class="menu-active">
                <a href="muzakki_page.php"><img src="../../assets/img/folder.png" class="menu-icon">Data Muzakki</a>
            </div>
            <div class="menu">
                <a href="../mustahik/mustahik_page.php"><img src="../../assets/img/list.png" class="menu-icon">Kategori Mustahik</a>
            </div>
            <div class="menu">
                <a href="../bayar_zakat/bayar_zakat_pages.php"><img src="../../assets/img/wallet.png" class="menu-icon">Pembayaran Zakat</a>
            </div>
            <div class="menu">
                <a href="../distribusi_warga/distribusi_warga_page.php"><img src="../../assets/img/peoples.png" class="menu-icon">Distribusi Warga</a>
            </div>
            <div class="menu">
                <a href="../distribusi_lainnya/distribusi_lainnya_page.php"><img src="../../assets/img/menu.png" class="menu-icon">Distribusi Lainnya</a>
            </div>
        </div>
        <!-- SIDE BAR END -->

        <!-- CONTENT AREA -->
        <div class="content-area">
            <div class="page-title">
                <p>Halaman</p>
                <h2>Data Muzakki</h2>
            </div>

            <!-- MAIN CONTENT -->
            <div class="table-card">
                <a href="muzakki_page.php" class="tb-menu">Detail</a>
                <a href="tambah_muzakki.php" class="tb-menu-active">Tambah Data</a>

                <div class="form-card-2">
                    <form method="POST">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input class="form-control" name="nama_muzakki" required/>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Tanggungan</label>
                            <input class="form-control" name="jumlah_tanggungan" required/>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input class="form-control" name="keterangan"/>
                        </div>

                        <div class="form-group-btn">
                            <input type="submit" name="Simpan" value="Simpan" class="btn btn-submit"/>
                        </div>
                    </form>

                    <?php

                    $nama_muzakki = @$_POST ['nama_muzakki'];
                    $jumlah_tanggungan = @$_POST ['jumlah_tanggungan'];
                    $keterangan = @$_POST ['keterangan'];

                    $Simpan = @$_POST ['Simpan'];


                    if ($Simpan) {

                        $sql = $koneksi->query("insert into muzakki(nama_muzakki, jumlah_tanggungan, keterangan)values('$nama_muzakki', '$jumlah_tanggungan', '$keterangan')");
                        $pembayaran_zakat = $koneksi->query("insert into pembayaran_zakat(nama_muzakki, jumlah_tanggungan, keterangan)values('$nama_muzakki', '$jumlah_tanggungan', '$keterangan')");
                        $distribusi_zakat = $koneksi->query("insert into distribusi_zakat(nama_muzakki, jumlah_tanggungan, keterangan)values('$nama_muzakki', '$jumlah_tanggungan', '$keterangan')");

                        if ($sql && $pembayaran_zakat && $distribusi_zakat) {
                            ?>
                            <script type="text/javascript">
                                alert ("Data Berhasil Disimpan");
                                window.location.href="muzakki_page.php";
                            </script>
                            <?php
                        }
                    }

                    ?>
                </div>
            </div>
            <!-- MAIN CONTENT -->

        </div>
        <!-- CONTENT AREA END -->

    </div>
</main>

</body>
</html>