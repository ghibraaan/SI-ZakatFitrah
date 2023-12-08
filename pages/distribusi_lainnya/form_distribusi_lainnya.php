<?php

include ('../../function.php');

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.css">
    <title>Zakat Fitrah | Distribusi Zakat</title>
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
            <div class="menu">
                <a href="../muzakki/muzakki_page.php"><img src="../../assets/img/folder.png" class="menu-icon">Data Muzakki</a>
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
            <div class="menu-active">
                <a href="distribusi_lainnya_page.php"><img src="../../assets/img/menu.png" class="menu-icon">Distribusi Lainnya</a>
            </div>
        </div>
        <!-- SIDE BAR END -->

        <!-- CONTENT AREA -->
        <div class="content-area">
            <div class="page-title">
                <p>Halaman</p>
                <h2>Distribusi Lainnya</h2>
            </div>

            <!-- MAIN CONTENT -->
            <div class="table-card">
                <a href="distribusi_lainnya_page.php" class="tb-menu">Detail</a>
                <a href="form_distribusi_lainnya.php" class="tb-menu-active">Distribusi Zakat</a>

                <div class="form-card-2">
                    <form method="POST">
                        <div class="form-group-2">
                            <label>Nama</label>
                            <input class="form-control" name="nama" required/>
                        </div>

                        <div class="form-group-2">
                            <label>Kategori</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">-- Pilihan --</option>
                                <option value="Amil Zakat">Amil Zakat</option>
                                <option value="Mualaf">Mualaf</option>
                                <option value="Fi Sabilillah">Fi Sabilillah</option>
                                <option value="Ibnu Sabil">Ibnu Sabil</option>
                            </select>
                        </div>

                        <div class="form-group-2">
                            <label>Jumlah Hak</label>
                            <input class="form-control readonly" type="text" id="hak" name="hak" value="" readonly/>
                        </div>

                        <div class="form-group-btn">
                            <input type="submit" name="Simpan" value="Simpan" class="btn btn-submit"/>
                        </div>
                    </form>

                    <?php

                    $nama = @$_POST ['nama'];
                    $kategori = @$_POST ['kategori'];
                    $hak = @$_POST ['hak'];

                    $Simpan = @$_POST ['Simpan'];


                    if ($Simpan) {

                        $sql = $koneksi->query("insert into mustahik_lainnya(nama, kategori, hak)values('$nama', '$kategori', '$hak')");

                        if ($sql) {
                            ?>
                            <script type="text/javascript">
                                alert ("Data Berhasil Disimpan");
                                window.location.href="distribusi_lainnya_page.php";
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

<script src="../../js/jumlah_hak_warga.js"></script>

</body>
</html>