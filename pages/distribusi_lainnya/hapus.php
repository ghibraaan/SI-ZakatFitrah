<?php

include ('../../function.php');
$id_mustahiklainnya = $_GET ['id_mustahiklainnya'];
$koneksi->query("delete from mustahik_lainnya where id_mustahiklainnya = '$id_mustahiklainnya'");

?>

<script type="text/javascript">
    alert ("Yakin ingin hapus data?");
    window.location.href="distribusi_lainnya_page.php";
</script>