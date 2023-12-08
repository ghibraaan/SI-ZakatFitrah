<?php

include ('../../function.php');

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.css">
    <title>Zakat Fitrah | Pembayaran Zakat</title>
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
            <div class="menu-active">
                <a href="bayar_zakat_pages.php"><img src="../../assets/img/wallet.png" class="menu-icon">Pembayaran Zakat</a>
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
                <h2>Pembayaran Zakat</h2>
            </div>

            <!-- MAIN CONTENT -->
            <div class="table-card">
                <a href="bayar_zakat_pages.php" class="tb-menu">Detail</a>
                <a href="tambah_bayar_zakat.php" class="tb-menu-active">Bayar Zakat</a>

                <div class="form-card-4">
                    <form method="POST">
                        <?php

                        include ('../../function.php');
                        if(isset($_GET['id_bayar'])) {
                            $pembayaran_zakatEdit = $koneksi->query("select * from pembayaran_zakat where id_bayar='$_GET[id_bayar]'");
                            $tampil = mysqli_fetch_array($pembayaran_zakatEdit);
                        }

                        ?>

                        <div class="form-group-2">
                            <label>Nama</label>
                            <input class="form-control readonly" name="nama_muzakki" value="<?php echo $tampil['nama_muzakki']; ?>" readonly/>
                        </div>


                        <div class="form-group-2">
                            <label>Jumlah Tanggungan</label>
                            <input class="form-control readonly" name="jumlah_tanggungan" value="<?php echo $tampil['jumlah_tanggungan']; ?>" readonly/>
                        </div>

                        <div class="form-group-2">
                            <label>Jenis Zakat</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="">-- Pilihan --</option>
                                <option value="Beras">Beras</option>
                                <option value="Uang">Uang</option>
                            </select>
                        </div>

                        <div class="form-group-2">
                            <label>Jumlah Bayar</label>
                            <input class="form-control readonly" type="text" id="jumlah_tanggunganyangdibayar" name="jumlah_tanggunganyangdibayar" value="<?php echo $tampil['jumlah_tanggungan']; ?>" readonly/>
                        </div>

                        <div class="form-group-2">
                            <label>Total Beras</label>
                            <input class="form-control readonly" type="text" id="bayar_beras" name="bayar_beras" placeholder="Total Beras" readonly>
                        </div>

                        <div class="form-group-2">
                            <label>Total Uang</label>
                            <input class="form-control readonly" type="text" id="bayar_uang" name="bayar_uang" placeholder="Total Uang" readonly>
                        </div>

                        <div class="form-group-btn">
                            <input type="submit" name="Simpan" value="Simpan" class="btn btn-submit"/>
                        </div>
                    </form>

                    <?php

                    $id_bayar = @$_GET['id_bayar'];
                    $nama_muzakki = @$_POST ['nama_muzakki'];
                    $jumlah_tanggungan = @$_POST ['jumlah_tanggungan'];
                    $jenis = @$_POST ['jenis'];
                    $jumlah_tanggunganyangdibayar = @$_POST ['jumlah_tanggunganyangdibayar'];
                    $bayar_beras = @$_POST ['bayar_beras'];
                    $bayar_uang = @$_POST ['bayar_uang'];

                    $Simpan = @$_POST ['Simpan'];


                    if ($Simpan) {

                        $sql = $koneksi->query("insert into bayarzakat(nama_kk, jumlah_tanggungan, jenis_bayar, jumlah_tanggunganyangdibayar, bayar_beras, bayar_uang)values('$nama_muzakki', '$jumlah_tanggungan', '$jenis', '$jumlah_tanggunganyangdibayar', '$bayar_beras', '$bayar_uang')");
                        $hapus = $koneksi->query("delete from pembayaran_zakat where id_bayar = '$id_bayar'");

                        if ($sql && $hapus) {
                            ?>
                            <script type="text/javascript">
                                alert ("Data Berhasil Disimpan");
                                window.location.href="bayar_zakat_pages.php";
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

<script src="../../js/functions.js"></script>

</body>
</html>