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
                <h2>Kategori Mustahik</h2>
            </div>

            <!-- MAIN CONTENT -->
            <div class="table-card">
                <a href="mustahik_page.php" class="tb-menu-active">Detail</a>
                <a href="tambah_mustahik.php" class="tb-menu">Tambah Kategori</a>
                <form method="get" action="" class="search">
                    <input class="search-form" type="text" name="search" placeholder="Search">
                </form>

                <div class="table-card-2">
                    <div class="table-container">
                        <table class="content-table">
                            <thead>
                            <tr align="center">
                                <th style="width: 20px">No</th>
                                <th>Nama Kategori</th>
                                <th>Jumlah Hak</th>
                                <th>Opsi</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            $no = 1;

                            $sql = $koneksi->query("select * from kategori_mustahik");

                            if(isset($_GET['search'])) {
                                $sql = $koneksi->query("select * from kategori_mustahik WHERE nama_kategori LIKE '%".$_GET['search']."%'");
                            }

                            while ($data = $sql->fetch_assoc()) {

                                ?>

                                <tr>
                                    <td align="center" style="width: 20px"><?php echo $no++;?></td>
                                    <td><?php echo $data['nama_kategori'];?></td>
                                    <td align="center"><?php echo $data['jumlah_hak'];?> Kg</td>
                                    <td style="width: 120px;" align="center">
                                        <a href='ubah.php?id_kategori=<?php echo $data['id_kategori'] ?>'><img src="../../assets/img/edit (2).png"></a>
                                        <a href='hapus.php?id_kategori=<?php echo $data['id_kategori'] ?>'><img src="../../assets/img/trash.png"></a>
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