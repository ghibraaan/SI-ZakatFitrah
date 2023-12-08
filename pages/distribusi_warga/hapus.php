<?php

include ('../../function.php');
$id_mustahikwarga = $_GET ['id_mustahikwarga'];
$nama = $_GET ['nama'];

$sql = $koneksi->query("SELECT * FROM muzakki WHERE nama_muzakki = '$nama'");
while ($data = mysqli_fetch_array($sql)) {
    $id_muzakki = $data["id_muzakki"];
    $jumlah_tanggungan = $data["jumlah_tanggungan"];
    $keterangan = $data["keterangan"];
}

$delete = $koneksi->query("delete from mustahik_warga where id_mustahikwarga = '$id_mustahikwarga'");
$insert = $koneksi->query("INSERT INTO distribusi_zakat(id_distribusi, nama_muzakki, jumlah_tanggungan, keterangan)values('$id_muzakki', '$nama', '$jumlah_tanggungan', '$keterangan')");

if ($delete && $insert) {
    ?>
    <script type="text/javascript">
        alert ("Data Berhasil Disimpan");
        window.location.href="distribusi_warga_page.php";
    </script>
    <?php
}

?>