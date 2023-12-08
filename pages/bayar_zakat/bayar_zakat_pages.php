<?php

include ('../../function.php');
include ('../../rupiah.php');

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../style/style.css">
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
                <a href="../../report/laporan_bayarzakat.php" class="btn-pdf green" style="color: #ffffff; font-size: 0.9em;"><img src="../../assets/img/donwload.png">PDF</a>
                <form method="get" action="" class="search">
                    <input class="search-form" type="text" name="search" placeholder="Search">
                </form>

                <?php

                $sql = $koneksi->query("select * from bayarzakat");
                $totalmuzakki = mysqli_num_rows($sql);
                $totaljiwa = 0;
                $totalberas = 0;
                $totaluang = 0;

                while ($data = $sql->fetch_assoc()) {
                    $totaljiwa += $data['jumlah_tanggungan'];
                    $totalberas += $data['bayar_beras'];
                    $totaluang += $data['bayar_uang'];
                }

                ?>

                <div class="main-content-flex">
                    <div class="flex-content">
                        <div class="total-card bayar first yellow">
                            <p>Total Muzakki</p>
                            <h2><?php echo $totalmuzakki; ?> Orang</h2>
                        </div>

                        <div class="total-card bayar second pink">
                            <p>Total Jiwa</p>
                            <h2><?php echo $totaljiwa; ?> Orang</h2>
                        </div>

                        <div class="total-card bayar purple">
                            <p>Total Beras</p>
                            <h2><?php echo $totalberas; ?> Kg</h2>
                        </div>

                        <div class="total-card bayar green">
                            <p>Total Uang</p>
                            <h2><?php echo rupiah($totaluang); ?></h2>
                        </div>
                    </div>
                </div>

                <div class="table-card-2">
                    <div class="table-container">
                        <table class="content-table">
                            <thead>
                            <tr align="center">
                                <th style="width: 20px">No</th>
                                <th>Nama</th>
                                <th>Jumlah Tanggungan</th>
                                <th>Jenis Zakat</th>
                                <th>Jumlah Bayar</th>
                                <th>Beras</th>
                                <th>Uang</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            $no = 1;

                            $sql = $koneksi->query("select * from bayarzakat");

                            if(isset($_GET['search'])) {
                                $sql = $koneksi->query("select * from bayarzakat WHERE nama_kk LIKE '%".$_GET['search']."%' OR jenis_bayar LIKE '%".$_GET['search']."%'");
                            }

                            while ($data = $sql->fetch_assoc()) {

                                ?>

                                <tr>
                                    <td align="center" style="width: 20px"><?php echo $no++;?></td>
                                    <td><?php echo $data['nama_kk'];?></td>
                                    <td style="width: 160px" align="center"><?php echo $data['jumlah_tanggungan'];?></td>
                                    <td style="width: 110px;" align="center"><?php echo $data['jenis_bayar'];?></td>
                                    <td style="width: 130px;" align="center"><?php echo $data['jumlah_tanggunganyangdibayar'];?></td>
                                    <td align="center"><?php echo $data['bayar_beras'];?> Kg</td>
                                    <td align="center"><?php echo rupiah($data['bayar_uang']);?></td>
                                    <td style="width: 120px;" align="center">
                                        <a href='ubah.php?id_zakat=<?php echo $data['id_zakat'] ?>'><img src="../../assets/img/edit (2).png"></a>
                                        <a href='hapus.php?id_zakat=<?php echo $data['id_zakat'] ?>&nama=<?php echo $data['nama_kk'] ?>'><img src="../../assets/img/trash.png"></a>
                                    </td>
                                </tr>

                            <?php } ?>

                            </tbody>
                        </table>
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