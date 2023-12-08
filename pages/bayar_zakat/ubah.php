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
                <a href="bayar_zakat_pages.php" class="tb-menu-active">Detail</a>
                <a href="tambah_bayar_zakat.php" class="tb-menu">Bayar Zakat</a>

                <div class="form-card-4">
                    <form method="POST">
                        <?php

                        include ('../../function.php');
                        if(isset($_GET['id_zakat'])) {
                            $sqlEdit = $koneksi->query("select * from bayarzakat where id_zakat='$_GET[id_zakat]'");
                            $tampil = mysqli_fetch_array($sqlEdit);
                        }

                        ?>

                        <div class="form-group-2">
                            <label>Nama</label>
                            <input class="form-control readonly" name="nama_kk" value="<?php echo $tampil['nama_kk']; ?>" readonly/>
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
                            <input class="form-control readonly" type="text" id="jumlah_tanggunganyangdibayar" name="jumlah_tanggunganyangdibayar" value="<?php echo $tampil['jumlah_tanggunganyangdibayar']; ?>" readonly/>
                        </div>

                        <div class="form-group-2">
                            <label>Total Beras</label>
                            <input class="form-control readonly" type="text" id="bayar_beras" name="bayar_beras" value="<?php echo $tampil['bayar_beras']; ?>" placeholder="Total Beras" readonly>
                        </div>

                        <div class="form-group-2">
                            <label>Total Uang</label>
                            <input class="form-control readonly" type="text" id="bayar_uang" name="bayar_uang" value="<?php echo $tampil['bayar_uang']; ?>" placeholder="Total Uang" readonly>
                        </div>

                        <div class="form-group-btn">
                            <input type="submit" name="Simpan" value="Simpan" class="btn btn-submit"/>
                        </div>
                    </form>

                    <?php

                    $id_zakat = @$_GET['id_zakat'];
                    $nama_kk = @$_POST ['nama_kk'];
                    $jumlah_tanggungan = @$_POST ['jumlah_tanggungan'];
                    $jenis = @$_POST ['jenis'];
                    $jumlah_tanggunganyangdibayar = @$_POST ['jumlah_tanggunganyangdibayar'];
                    $bayar_beras = @$_POST ['bayar_beras'];
                    $bayar_uang = @$_POST ['bayar_uang'];

                    $Simpan = @$_POST ['Simpan'];


                    if ($Simpan) {

                        $sql = $koneksi->query("
                                                    update bayarzakat set nama_kk='$nama_kk',
                                                    jumlah_tanggungan='$jumlah_tanggungan',
                                                    jenis_bayar='$jenis',
                                                    jumlah_tanggunganyangdibayar = '$jumlah_tanggunganyangdibayar',
                                                    bayar_beras = '$bayar_beras',
                                                    bayar_uang = '$bayar_uang'
                                                    where id_zakat='$id_zakat'");

                        if ($sql) {
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