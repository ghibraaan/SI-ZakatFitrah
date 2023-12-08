<?php

include ('function.php');
include ('rupiah.php');

session_start();

if (!isset($_SESSION['nama'])) {
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <title>Zakat Fitrah</title>
    <link rel="icon" type="image/png" href="assets/img/money-bag.png">
</head>
<body>
<!-- NAV HEAD -->
<header>
    <div class="header-wrapper">
        <h2>Zakat Fitrah</h2>
        <a class="btn btn-danger" href="logout.php">Logout</a>
    </div>
</header>
<!-- NAV HEAD END -->

<main>
    <div class="flex-container">
        <!-- SIDE BAR -->
        <div class="sidemenu">
            <div class="menu-active">
                <a href="index.php"><img src="assets/img/home.png" class="menu-icon">Beranda</a>
            </div>
            <div class="menu">
                <a href="pages/muzakki/muzakki_page.php"><img src="assets/img/folder.png" class="menu-icon">Data Muzakki</a>
            </div>
            <div class="menu">
                <a href="pages/mustahik/mustahik_page.php"><img src="assets/img/list.png" class="menu-icon">Kategori Mustahik</a>
            </div>
            <div class="menu">
                <a href="pages/bayar_zakat/bayar_zakat_pages.php"><img src="assets/img/wallet.png" class="menu-icon">Pembayaran Zakat</a>
            </div>
            <div class="menu">
                <a href="pages/distribusi_warga/distribusi_warga_page.php"><img src="assets/img/peoples.png" class="menu-icon">Distribusi Warga</a>
            </div>
            <div class="menu">
                <a href="pages/distribusi_lainnya/distribusi_lainnya_page.php"><img src="assets/img/menu.png" class="menu-icon">Distribusi Lainnya</a>
            </div>
        </div>
        <!-- SIDE BAR END -->

        <!-- CONTENT AREA -->
        <div class="content-area">
            <div class="page-title">
                <p>Halaman</p>
                <h2>Beranda</h2>
            </div>

            <!-- MAIN CONTENT -->
            <?php

            $sql = $koneksi->query("select * from bayarzakat");
            $totalmuzakki = mysqli_num_rows($sql);
            $totalberas = 0;
            $totaluang = 0;

            while ($data = $sql->fetch_assoc()) {
                $totalberas += $data['bayar_beras'];
                $totaluang += $data['bayar_uang'];
            }


            ?>

            <div class="main-content-flex">
                <div class="flex-content">
                    <div class="content-card yellow first">
                        <p>Sudah Bayar Zakat</p>
                        <h1><?php echo $totalmuzakki; ?> Orang</h1>
                    </div>

                    <div class="content-card pink second">
                        <p>Total Beras</p>
                        <h1><?php echo $totalberas; ?> Kg</h1>
                    </div>

                    <div class="content-card green">
                        <p>Total Uang</p>
                        <h1><?php echo rupiah($totaluang); ?></h1>
                    </div>
                </div>

                <!--
                <div class="flex-content">
                    <div class="content-card contact">
                        <h3>Contact - Muhammad Ghibran Al Khamaeni</h3>
                        <p><i class="fa-solid fa-phone"></i>+62 821-2060-5545</p>
                        <p><i class="fa-solid fa-envelope"></i>mghbrn.alkhamaeni@gmail.com</p>
                        <a href="https://www.linkedin.com/in/muhammad-ghibran-al-khamaeni-950a2b215"><i class="fa-brands fa-linkedin-in"></i>Muhammad Ghibran Al Khamaeni</a> <br>
                        <a href="https://www.instagram.com/ghbraaan/"><i class="fa-brands fa-instagram"></i>ghbraaan</a>
                    </div>
                </div>
                -->
            </div>
            <!-- MAIN CONTENT -->

        </div>
        <!-- CONTENT AREA END -->

    </div>
</main>

</body>
</html>