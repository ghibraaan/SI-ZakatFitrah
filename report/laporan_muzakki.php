<?php

include('../function.php');

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
        .width-no {
            width: 20px;
        }
        .content-table th,
        .content-table td {
            border: 1px solid #000000;
        }
    </style>
    
    <h2 align="center">Data Muzakki</h2>
    <table class="content-table">
        <thead>
            <tr class="header">
                <th align="center" class="width-no">No</th>
                <th align="center" style="width: 240px;">Nama Lengkap</th>
                <th align="center">Jumlah Tanggungan</th>
                <th align="center">Keterangan</th>
            </tr>
        </thead>';


        $no = 1;

        $sql = $koneksi->query("select * from muzakki");

        if(isset($_GET['search'])) {
            $sql = $koneksi->query("select * from muzakki WHERE nama_muzakki LIKE '%".$_GET['search']."%' OR keterangan LIKE '%".$_GET['search']."%'");
        }

        while ($data = mysqli_fetch_array($sql)) {
        $html .= '
        <tbody>    
            <tr>
                <td align="center" class="width-no">'.$no.'</td>
                <td style="width: 240px;">'.$data["nama_muzakki"].'</td>
                <td align="center"> '.$data["jumlah_tanggungan"].'</td>
                <td>'.$data["keterangan"].'</td>
            </tr>';
        $no++;

        }


        $html .= '
        </tbody>
    </table>';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('Laporan_Muzakki.pdf', 'I');

?>