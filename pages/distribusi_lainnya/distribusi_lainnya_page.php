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
                <a href="distribusi_lainnya_page.php" class="tb-menu-active">Detail</a>
                <a href="form_distribusi_lainnya.php" class="tb-menu">Distribusi Zakat</a>
                <a href="../../report/laporan_distribusilainnya.php" class="btn-pdf green" style="color: #ffffff; font-size: 0.9em;"><img src="../../assets/img/donwload.png">PDF</a>
                <form method="get" action="" class="search">
                    <input class="search-form" type="text" name="search" placeholder="Search">
                </form>

                <div class="table-card-2">
                    <div class="table-container">
                        <table class="content-table">
                            <thead>
                            <tr align="center">
                                <th style="width: 20px">No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Jumlah Hak</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            $no = 1;

                            $sql = $koneksi->query("select * from mustahik_lainnya");

                            if(isset($_GET['search'])) {
                                $sql = $koneksi->query("select * from mustahik_lainnya WHERE nama LIKE '%".$_GET['search']."%' OR kategori LIKE '%".$_GET['search']."%'");
                            }

                            while ($data = $sql->fetch_assoc()) {

                                ?>

                                <tr>
                                    <td align="center" style="width: 20px"><?php echo $no++;?></td>
                                    <td><?php echo $data['nama'];?></td>
                                    <td align="center"><?php echo $data['kategori'];?></td>
                                    <td align="center"><?php echo $data['hak'];?> Kg</td>
                                    <td style="width: 130px;" align="center">
                                        <a href='ubah.php?id_mustahiklainnya=<?php echo $data['id_mustahiklainnya'] ?>'><img src="../../assets/img/edit (2).png"></a>
                                        <a href='hapus.php?id_mustahiklainnya=<?php echo $data['id_mustahiklainnya'] ?>&nama=<?php echo $data['nama'] ?>'><img src="../../assets/img/trash.png"></a>
                                    </td>
                                </tr>

                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>

                <?php

                $mustahik = $koneksi->query("select * from mustahik_lainnya");
                $totalmustahik = mysqli_num_rows($mustahik);

                $amilzakat = $koneksi->query("select * from mustahik_lainnya where kategori='Amil Zakat'");
                $totalamilzakat = mysqli_num_rows($amilzakat);

                $mualaf = $koneksi->query("select * from mustahik_lainnya where kategori='Mualaf'");
                $totalmualaf = mysqli_num_rows($mualaf);

                $fisabilillah = $koneksi->query("select * from mustahik_lainnya where kategori='Fi Sabilillah'");
                $totalfisabilillah = mysqli_num_rows($fisabilillah);

                $ibnusabil = $koneksi->query("select * from mustahik_lainnya where kategori='Ibnu Sabil'");
                $totalibnusabil = mysqli_num_rows($ibnusabil);

                $totalberas = 0;

                while ($data = $mustahik->fetch_assoc()) {
                    $totalberas += $data['hak'];
                }

                ?>

                <div class="main-content-flex">
                    <div class="flex-content">
                        <div class="total-card distribusi second yellow">
                            <p>Amil Zakat</p>
                            <h2><?php echo $totalamilzakat; ?> Orang</h2>
                        </div>

                        <div class="total-card distribusi pink">
                            <p>Mualaf</p>
                            <h2><?php echo $totalmualaf; ?> Orang</h2>
                        </div>

                        <div class="total-card distribusi orange">
                            <p>Fi Sabilillah</p>
                            <h2><?php echo $totalfisabilillah; ?> Orang</h2>
                        </div>

                        <div class="total-card distribusi green">
                            <p>Ibnu Sabil</p>
                            <h2><?php echo $totalibnusabil; ?> Orang</h2>
                        </div>
                    </div>

                    <div class="flex-content">
                        <div class="total-card distribusi first blue">
                            <p>Total Mustahik</p>
                            <h2><?php echo $totalmustahik; ?> Orang</h2>
                        </div>

                        <div class="total-card distribusi second yellow">
                            <p>Hak Beras</p>
                            <h2><?php echo $totalmustahik; ?></h2>
                        </div>

                        <div class="total-card distribusi purple">
                            <p>Total Beras</p>
                            <h2><?php echo $totalberas; ?> Kg</h2>
                        </div>
                    </div>
                </div>

            </div>
            <!-- MAIN CONTENT -->

        </div>
        <!-- CONTENT AREA END -->

    </div>
</main>

</body>
</html>