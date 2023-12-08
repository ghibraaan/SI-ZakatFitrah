<?php

header('Content-Type: application/json');
require "../../function.php";
$path = "http://localhost/web_zakatfitrah";

$sql = mysqli_query($koneksi, "SELECT * FROM kategori_mustahik");

$array = [];
while ($data = mysqli_fetch_assoc($sql)) {
    $array[] = $data;
}

echo json_encode($array);

?>