<?php

session_start();

include "../../fungsi/koneksi.php";
include "../../fungsi/fungsi_tanggal.php";
include"../../fungsi/pdf/fpdf.php";

$format_bulan = format_month($_POST['bulan']);
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
//QUERY ULANGAN
$query_absensi = mysql_query("SELECT substr(tgl_absensi,9,2) AS tgl FROM absensi 
							WHERE substr(tgl_absensi,1,4) = '$tahun'
							AND substr(tgl_absensi,6,2) = '$bulan'
							GROUP BY tgl_absensi") or die(mysql_error());
$jumlah_absensi = mysql_num_rows($query_absensi);


//QUERY Karyawan
$query_karyawan = mysql_query("SELECT * FROM karyawan GROUP BY nip") or die(mysql_error());
$jlh_karyawan = mysql_num_rows($query_karyawan);

if ($jumlah_absensi < 1) {
    echo "<script language='javascript'>
                        alert('Data absensi tidak ditemukan atau masih kosong');
                        window.location='../../index.php?modul=laporan_absensi';
		</script>";
} else {
    $pdf = new FPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L');
    $pdf->Ln();
//TABEL FORM
    $linespace1 = 3;

    $pdf->SetFont('Times', 'BU', '10');
    $pdf->Cell(0, 6, 'PT. ARI WIBOWO', 0, 1, 'C');
    $pdf->Ln(-2);
    $pdf->SetFont('Times', 'B', '10');
    $pdf->Cell(0, 6, 'Rekapitulasi Absensi', 0, 1, 'C');
    $pdf->Cell(0, 6, 'Bulan : ' . $format_bulan . ' ' . $tahun, 0, 1, 'C');

//TABEL DATA
    $linespace = 3;
    $w = array(6, 15, 40, 7, 7, 15, 7, 7, 15);
//=========0, 1,  2,  3, 4, 5, 6, 7=====//

    $pdf->setX(4);
    $pdf->SetFont('Arial', 'B', 6);

    $pdf->Cell($w[0], 6, '', 'TLR', 0, 'L');
    $pdf->Cell($w[1], 6, '', 'TLR', 0, 'C');
    $pdf->Cell($w[2], 6, '', 'TLR', 0, 'C');
//PERULANGAN KOLOM TANGGAL
    $pdf->Cell($w[4] * $jumlah_absensi, 6, 'TANGGAL', 'TLR', 0, 'C');
    $pdf->Cell($w[5], 6, '', 'TLR', 0, 'C');
    $pdf->Ln();
    $pdf->setX(4);
    $pdf->Cell($w[0], 6, 'NO', 'LR', 0, 'L');
    $pdf->Cell($w[1], 6, 'NIP', 'LR', 0, 'C');
    $pdf->Cell($w[2], 6, 'NAMA', 'LR', 0, 'C');
//PERULANGAN KOLOM TANGGAL
    $nou = 0;
    while ($data_absen = mysql_fetch_array($query_absensi)) {
        $nou++;
        $pdf->Cell($w[4], 6, $data_absen['tgl'], 'TLR', 0, 'C');
    }
    $pdf->Cell($w[5], 6, 'JML HADIR', 'LR', 0, 'C');
    $pdf->Ln();
//=========0, 1,  2,  3,  4,  5,  6,  7=====//
//Color and font restoration
    $pdf->setX(4);
    $pdf->SetFillColor(224, 235, 255);
    $pdf->SetTextColor(1);
    $pdf->SetFont('Arial', '', 6);
//Data

    $fill = false;
    $i = 0;

    $num = count($query_absensi);

    $data_result = array();

    while ($data = mysql_fetch_array($query_karyawan)) {
        $jumlah_kanan = 0;
        $result_kehadiran = array();

        $query_jlh_kehadiran = mysql_query("SELECT * FROM absensi
									  WHERE nip = '$data[nip]' AND kehadiran = 'Hadir' AND MONTH(tgl_absensi) = '$bulan' AND YEAR(tgl_absensi) = '$tahun'") or die(mysql_error());
        $jumlah_kehadiran = mysql_num_rows($query_jlh_kehadiran);

        $data_result[] = array(
            'nip' => $data['nip'],
            'nama_karyawan' => $data['nama_karyawan'],
            'jkanan' => $jumlah_kehadiran,
        );
        //var_dump($data_result);die();
    }

    $j = 0;
    foreach ($data_result as $row) {
        $pdf->setX(4);
        $i++;
        $pdf->Cell($w[0], $linespace, $i, 'TLRB', 0, 'L', $fill); //NOMOR
        $pdf->Cell($w[1], $linespace, $row['nip'], 'TLRB', 0, 'L', $fill); //NIS
        $pdf->Cell($w[2], $linespace, ucwords(strtolower($row['nama_karyawan'])), 'TLRB', 0, 'L', $fill); //NAMA KARYAWAN

        $query_tgl = mysql_query("SELECT tgl_absensi FROM absensi 
							WHERE substr(tgl_absensi,1,4) = '$tahun'
							AND substr(tgl_absensi,6,2) = '$bulan'
							GROUP BY tgl_absensi") or die(mysql_error());
        $no_tgl = 0;
        while ($data_tgl = mysql_fetch_array($query_tgl)) {
            $hadir_nip = mysql_query("SELECT * FROM absensi WHERE nip = $row[nip] AND tgl_absensi = '$data_tgl[tgl_absensi]'") or die(mysql_error());
            $data_hadir_nip = mysql_fetch_array($hadir_nip);
            if ($data_hadir_nip['kehadiran'] == 'Hadir') {
                $kehadiran = 'H';
            } else if ($data_hadir_nip['kehadiran'] == 'Sakit') {
                $kehadiran = 'S';
            } else if ($data_hadir_nip['kehadiran'] == 'Ijin') {
                $kehadiran = 'I';
            } else if ($data_hadir_nip['kehadiran'] == 'Cuti') {
                $kehadiran = 'C';
            } else {
                $kehadiran = '-';
            }

            $no_tgl++;
            $pdf->Cell($w[4], $linespace, $kehadiran, 'TLRB', 0, 'C', $fill);
        }
        $pdf->Cell($w[5], $linespace, $row['jkanan'], 'TLRB', 0, 'C', $fill); //JUMLAH KANAN
        $fill = !$fill;
        $pdf->Ln();
        $j++;
    }
    $query_dirut = mysql_query("SELECT * FROM karyawan k 
							JOIN jabatan j ON j.id_jabatan = k.id_jabatan 
							WHERE nama_jabatan = 'Direktur'") or die(mysql_error());
    $data_dirut = mysql_fetch_array($query_dirut);

    $pdf->Ln();
//footer selalu sama
    $pdf->SetX(-330);
    $pdf->Cell(0, 6, 'Mengetahui,', 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', '7');
    $pdf->SetX(-330);
    $pdf->Cell(0, 6, 'Direktur Utama', 0, 0, 'C');
    $pdf->SetX(50);
    $pdf->Cell(0, 6, 'Disiapkan Oleh', 0, 1, 'C');
    $pdf->Ln(10);
    $pdf->SetFont('Arial', 'BU', '7');
    $pdf->SetX(-330);
    $pdf->Cell(0, 6, $data_dirut['nama_karyawan'], 0, 0, 'C'); //NAMA DIREKTUR
    $pdf->SetX(50);
    $pdf->Cell(0, 6, $_SESSION['nama'], 0, 1, 'C'); //NAMA KEUANGAN
    $pdf->ln(-3);

    $pdf->SetFont('Arial', 'B', '7');
    $pdf->SetX(-330);
    $pdf->Cell(0, 6, 'NIP. ' . $data_dirut['nip'], 0, 0, 'C'); //NIP DIREKTUR
    $pdf->SetX(50);
    $pdf->Cell(0, 6, 'NIP. ' . $_SESSION['id_pengguna'], 0, 1, 'C'); //NIP KEUANGAN

    $pdf->Output();
}