<?php

include ('../../function.php');
$id_muzakki = $_GET ['id_muzakki'];
$koneksi->query("delete from muzakki where id_muzakki = '$id_muzakki'");
$koneksi->query("delete from pembayaran_zakat where id_bayar = '$id_muzakki'");
$koneksi->query("delete from distribusi_zakat where id_distribusi = '$id_muzakki'");

?>

<script type="text/javascript">
    alert ("Yakin ingin hapus data?");
    window.location.href="muzakki_page.php";
</script>