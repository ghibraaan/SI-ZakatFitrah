<?php

include ('../../function.php');

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.css">
    <title>Zakat Fitrah | Kategori Mustahik</title>
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
            <div class="menu-active">
                <a href="mustahik_page.php"><img src="../../assets/img/list.png" class="menu-icon">Kategori Mustahik</a>
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
                <a href="mustahik_page.php" class="tb-menu-active">Detail</a>
                <a href="tambah_mustahik.php" class="tb-menu">Tambah Kategori</a>

                <div class="form-card-1">
                    <form method="POST">

                        <?php

                        include ('../../function.php');
                        if(isset($_GET['id_kategori'])) {
                            $sqlEdit = $koneksi->query("select * from kategori_mustahik where id_kategori='$_GET[id_kategori]'");
                            $tampil = mysqli_fetch_array($sqlEdit);
                        }

                        ?>

                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input class="form-control" name="nama_kategori" value="<?php echo $tampil['nama_kategori']; ?>" />
                        </div>


                        <div class="form-group">
                            <label>Jumlah Hak</label>
                            <input class="form-control" name="jumlah_hak" value="<?php echo $tampil['jumlah_hak']; ?>"/>
                        </div>

                        <div class="form-group-btn">

                            <input type="submit" name="Simpan" value="Simpan" class="btn btn-submit"/>

                        </div>
                    </form>

                    <?php

                    $id_kategori = @$_GET['id_kategori'];
                    $nama_kategori = @$_POST ['nama_kategori'];
                    $jumlah_hak = @$_POST ['jumlah_hak'];

                    $Simpan = @$_POST ['Simpan'];


                    if ($Simpan) {

                        $sql = $koneksi->query("update kategori_mustahik set nama_kategori='$nama_kategori', jumlah_hak='$jumlah_hak' where id_kategori='$id_kategori'");

                        if ($sql) {
                            ?>
                            <script type="text/javascript">
                                alert ("Data Berhasil Disimpan");
                                window.location.href="mustahik_page.php";
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