<?php

session_start();

include "../../fungsi/koneksi.php";
include "../../fungsi/fungsi_tanggal.php";
include"../../fungsi/pdf/fpdf.php";

$format_bulan = format_month($_POST['bulan']);
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$nip = $_POST['nip'];
//QUERY ULANGAN
$query_absensi = mysql_query("SELECT * FROM absensi 
							WHERE substr(tgl_absensi,1,4) = '$tahun'
							AND substr(tgl_absensi,6,2) = '$bulan'
							AND nip = $nip") or die(mysql_error());
$jumlah_absensi = mysql_num_rows($query_absensi);

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage('P', 'A4');
$pdf->Ln();
//TABEL FORM
$linespace1 = 3;

$pdf->SetXY(5, 4);
$pdf->SetFont('Times', 'BU', '10');
$pdf->Cell(0, 6, 'PT. DUTA PANITRA SERCO', 0, 1, 'C');
$pdf->Ln(-2);
$pdf->SetX(5);
$pdf->SetFont('Times', 'B', '10');
$pdf->Cell(0, 6, 'Rekapitulasi Absensi', 0, 1, 'C');
$pdf->Cell(0, 6, 'Bulan : ' . $format_bulan . ' ' . $tahun, 0, 1, 'C');
$pdf->Cell(0, 6, 'Nama karyawan : ' . $format_bulan . ' ' . $tahun, 0, 1, 'C');
$pdf->ln();

//TABEL DATA
$linespace = 3;
$w = array(6, 25, 40, 25, 25);
//=========0, 1,  2,  3, 4, 5, 6, 7=====//

$pdf->setX(40);
$pdf->SetFont('Arial', 'B', 6);

$pdf->Cell($w[0], 6, 'NO', 'TLR', 0, 'C');
$pdf->Cell($w[1], 6, 'TANGGAL', 'TLR', 0, 'C');
$pdf->Cell($w[2], 6, 'KEHADIRAN', 'TLR', 0, 'C');
$pdf->Cell($w[3], 6, 'JAM MASUK', 'TLR', 0, 'C');
$pdf->Cell($w[4], 6, 'JAM KELUAR', 'TLR', 0, 'C');
$pdf->Ln();
//=========0, 1,  2,  3,  4,  5,  6,  7=====//
//Color and font restoration
$pdf->setX(40);
$pdf->SetFillColor(224, 235, 255);
$pdf->SetTextColor(1);
$pdf->SetFont('Arial', '', 6);

$fill = false;
$i = 0;

while ($data = mysql_fetch_array($query_absensi)) {
    if($data['kehadiran'] == 'Hadir'){
        $kehadiran = 'Hadir';
        $jam_masuk = $data['waktu_masuk'];
        $jam_keluar = $data['waktu_keluar'];
    }else{
        $kehadiran = $data['kehadiran'];
        $jam_masuk = '-';
        $jam_keluar = '-';
    }
    
    $pdf->setX(40);
    $i++;
    $pdf->Cell($w[0], 6, $i, 'TLRB', 0, 'L');
    $pdf->Cell($w[1], 6, format_date($data['tgl_absensi']), 'TLRB', 0, 'C');
    $pdf->Cell($w[2], 6, $kehadiran, 'TLRB', 0, 'C');
    $pdf->Cell($w[3], 6, $jam_masuk, 'TLRB', 0, 'C');
    $pdf->Cell($w[4], 6, $jam_keluar, 'TLRB', 0, 'C');
    $pdf->Ln();
}
$pdf->Output();