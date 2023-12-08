<?php

include('../function.php');
include('../rupiah.php');

require_once('../tcpdf/tcpdf.php');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Nicola Asuni');
$pdf->setTitle('TCPDF Example 001');
$pdf->setSubject('TCPDF Tutorial');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

$pdf->setFont('times', '', 12, '', true);

$pdf->setPrintHeader(false);
$pdf->AddPage();

$html = '
        <style>
            .content-table td,
             .content-table th{
                border: 1px solid #000000;
            }
        </style>
        
        <h2 align="center">Data Distribusi Lainnya</h2>';

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

$html .= '
        <p>Total Amil Zakat : '.$totalamilzakat.' Orang
        <br>Total Mualaf : '.$totalmualaf.' Orang
        <br>Total Fi Sabilillah : '.$totalfisabilillah.' Orang
        <br>Total Ibnu Sabil : '.$totalibnusabil.' Orang
        <br>Total Mustahik : '.$totalmustahik.' Orang
        <br>Total Hak Beras : '.$totalmustahik.'
        <br>Total Beras : '.$totalberas.' Kg </p>
        
        <table class="content-table">
            <thead>
            <tr>
                <th align="center" style="width: 20px">No</th>
                <th align="center" style="width: 220px;">Nama</th>
                <th align="center" style="width: 160px;">Kategori</th>
                <th align="center">Jumlah Hak</th>
            </tr>
            </thead>';

        $no = 1;

        $sql = $koneksi->query("select * from mustahik_lainnya");

        while ($data = $sql->fetch_assoc()) {
            $html .= '
                <tbody>
                    <tr>
                        <td align="center" style="width: 20px">'.$no.'</td>
                        <td style="width: 220px;">'.$data["nama"].'</td>
                        <td style="width: 160px;">'.$data["kategori"].'</td>
                        <td align="center">'.$data["hak"].' Kg</td>
                    </tr> ';
            $no++;
        }

        $html .= '
                </tbody>
            </table>';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('Laporan_Distribusi_Lainnya.pdf', 'I');

?>