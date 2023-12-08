<?php

include ('../../function.php');
$id_kategori = $_GET ['id_kategori'];
$koneksi->query("delete from kategori_mustahik where id_kategori = '$id_kategori'");

?>

<script type="text/javascript">
    alert ("Yakin ingin hapus data?");
    window.location.href="mustahik_page.php";
</script>