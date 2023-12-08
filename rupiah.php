<?php

function rupiah($bayar_uang){
    $hasil_rupiah = "Rp " . number_format($bayar_uang,0,',',',');
    return $hasil_rupiah;
}

?>