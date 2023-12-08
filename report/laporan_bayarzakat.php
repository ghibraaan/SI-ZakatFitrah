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

$html ='
        <style>
            .content-table td,
             .content-table th{
                border: 1px solid #000000;
            }
        </style>
        
        <h2 align="center">Data Pembayaran Zakat</h2>';

        $sql = $koneksi->query("select * from bayarzakat");
        $totalmuzakki = mysqli_num_rows($sql);
        $totaljiwa = 0;
        $totalberas = 0;
        $totaluang = 0;

        while ($data = $sql->fetch_assoc()) {
            $totaljiwa += $data['jumlah_tanggungan'];
            $totalberas += $data['bayar_beras'];
            $totaluang += $data['bayar_uang'];
        }

$html .= '
            <p>Total Muzakki : '.$totalmuzakki.' Orang
            <br>Total Jiwa : '.$totaljiwa.' Orang
            <br>Total Beras : '.$totalberas.' Kg
            <br>Total Uang : '.rupiah($totaluang).'</p>
            
            <table class="content-table">
                <thead>
                <tr>
                    <th align="center" style="width: 20px">No</th>
                    <th align="center" style="width: 170px;">Nama</th>
                    <th align="center" style="width: 70px;">Jumlah Tanggungan</th>
                    <th align="center" style="width: 70px;">Jenis Zakat</th>
                    <th align="center" style="width: 70px;">Jumlah Bayar</th>
                    <th align="center" style="width: 50px;">Beras</th>
                    <th align="center" style="width: 80px;">Uang</th>
                </tr>
                </thead>';
        $no = 1;

        $sql = $koneksi->query("select * from bayarzakat");

        while ($data = $sql->fetch_assoc()) {
            $html .= '
                <tbody>
                    <tr>
                        <td align="center" style="width: 20px">'.$no.'</td>
                        <td style="width: 170px;">'.$data["nama_kk"].'</td>
                        <td align="center" style="width: 70px;">'.$data["jumlah_tanggungan"].'</td>
                        <td align="center" style="width: 70px;">'.$data["jenis_bayar"].'</td>
                        <td align="center" style="width: 70px;">'.$data["jumlah_tanggunganyangdibayar"].'</td>
                        <td align="center" style="width: 50px;">'.$data["bayar_beras"].' Kg</td>
                        <td align="center" style="width: 80px;">'.rupiah($data["bayar_uang"]).'</td>
                    </tr>';
                    $no++;
        }

        $html .= '
                </tbody>
            </table>';

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('Laporan_Pembayaran_Zakat.pdf', 'I');

?>