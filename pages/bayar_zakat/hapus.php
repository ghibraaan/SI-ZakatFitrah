<?php

include ('../../function.php');
$id_zakat = $_GET ['id_zakat'];
$nama = $_GET ['nama'];

$sql = $koneksi->query("SELECT * FROM muzakki WHERE nama_muzakki = '$nama'");
while ($data = mysqli_fetch_array($sql)) {
    $id_muzakki = $data["id_muzakki"];
    $jumlah_tanggungan = $data["jumlah_tanggungan"];
    $keterangan = $data["keterangan"];
}

$delete = $koneksi->query("delete from bayarzakat where id_zakat = '$id_zakat'");
$insert = $koneksi->query("INSERT INTO pembayaran_zakat(id_bayar, nama_muzakki, jumlah_tanggungan, keterangan)values('$id_muzakki', '$nama', '$jumlah_tanggungan', '$keterangan')");

if ($delete && $insert) {
    ?>
    <script type="text/javascript">
        alert ("Data Berhasil Disimpan");
        window.location.href="bayar_zakat_pages.php";
    </script>
    <?php
}
?>