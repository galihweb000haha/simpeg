<?php

session_start();

include "../../fungsi/koneksi.php";
include "../../fungsi/fungsi_tanggal.php";
include"../../fungsi/pdf/fpdf.php";
include"../../fungsi/format_number.php";

$format_bulan = format_month($_POST['bulan']);
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
//QUERY ULANGAN
$query_absensi = mysql_query("SELECT date(tgl_absensi) AS tgl FROM absensi 
							WHERE YEAR(tgl_absensi) = '$tahun'
							AND MONTH(tgl_absensi) = '$bulan'
							GROUP BY tgl_absensi") or die(mysql_error());
$jumlah_absensi = mysql_num_rows($query_absensi);

//QUERY JENIS TUNJANGAN
$query_jenis_tunjangan = mysql_query("SELECT * FROM jenis_tunjangan");
$query_jenis_tunjangan2 = mysql_query("SELECT * FROM jenis_tunjangan");
$jlh_jenis_tunjangan = mysql_num_rows($query_jenis_tunjangan);

//QUERY KARYAWAN
$query_karyawan = mysql_query("SELECT * FROM karyawan GROUP BY nip") or die(mysql_error());
$jlh_karyawan = mysql_num_rows($query_karyawan);

if ($jumlah_absensi < 1) {
    echo "<script language='javascript'>
                        alert('Data gaji tidak ditemukan atau masih kosong');
                        window.location='../../index.php?modul=laporan_gaji';
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
    $pdf->Cell(0, 6, 'Rekapitulasi Gaji', 0, 1, 'C');
    $pdf->Cell(0, 6, 'Bulan : ' . $format_bulan . ' ' . $tahun, 0, 1, 'C');

//TABEL DATA
    $linespace = 3;
    $w = array(6, 25, 40, 7, 20, 20, 20, 20, 25);
//=========0, 1,  2,  3, 4,   5, 6, 7=====//

    $pdf->setX(4);
    $pdf->SetFont('Arial', 'B', 6);

    $pdf->Cell($w[0], 4, 'NO', 'TLR', 0, 'L');
    $pdf->Cell($w[1], 4, 'NIP', 'TLR', 0, 'C');
    $pdf->Cell($w[2], 4, 'NAMA', 'TLR', 0, 'C');
//PERULANGAN KOLOM SOAL
    $nou = 0;
    $total_cell = 0;
    while ($data_jt = mysql_fetch_array($query_jenis_tunjangan2)) {
        $nou++;
        $total_cell += $w[4];
    }
    $pdf->Cell($total_cell, 4, 'TUNJANGAN', 'TB', 0, 'C');
    $pdf->Cell($w[5], 4, 'KEHADIRAN', 'TLR', 0, 'C');
    $pdf->Cell($w[6], 4, 'JLH KERJA', 'TLR', 0, 'C');
    $pdf->Cell($w[7], 4, 'GAJI', 'TLR', 0, 'C');
    $pdf->Cell($w[8], 4, 'JLH GAJI', 'TLR', 0, 'C');
    $pdf->Ln();
    $pdf->setX(4);
    $pdf->SetFont('Arial', 'B', 6);

    $pdf->Cell($w[0], 4, '', 'LR', 0, 'L');
    $pdf->Cell($w[1], 4, '', 'LR', 0, 'C');
    $pdf->Cell($w[2], 4, '', 'LR', 0, 'C');
//PERULANGAN KOLOM SOAL
    $nou1 = 0;
    while ($data_jt2 = mysql_fetch_array($query_jenis_tunjangan)) {
        $nou1++;
        $pdf->Cell($w[4], 4, strtoupper($data_jt2['nama_jenis_tunjangan']), 'LR', 0, 'C');
    }
    $pdf->Cell($w[5], 4, '(HARI)', 'LR', 0, 'C');
    $pdf->Cell($w[6], 4, '(JAM)', 'LR', 0, 'C');
    $pdf->Cell($w[7], 4, '', 'LR', 0, 'C');
    $pdf->Cell($w[8], 4, '(GAJI + TUNJANGAN)', 'LR', 0, 'C');
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
    $jlh_jam = 0;

    while ($data = mysql_fetch_array($query_karyawan)) {
        $query_jenis_tunjangan2 = mysql_query("SELECT * FROM jenis_tunjangan");
        $nou = 0;
        $jumlah_btunjangan = 0;
        $result_btunjangan = array();

        while ($data_jt2 = mysql_fetch_array($query_jenis_tunjangan2)) {
            $id_jenis_tunjangan = $data_jt2['id_jenis_tunjangan'];

            $query_besar_tunjangan = mysql_query("SELECT * FROM tunjangan_jabatan 
										  WHERE nip = '$data[nip]'
										  AND id_jenis_tunjangan = '$id_jenis_tunjangan'") or die(mysql_error());
            $data_bt = mysql_fetch_array($query_besar_tunjangan);
            if ($data_bt['besar_tunjangan'] != NULL) {
                $btunjangan = $data_bt['besar_tunjangan'];
            } else {
                $btunjangan = 0;
            }

            $jumlah_btunjangan += $btunjangan;
            $result_btunjangan[] = $btunjangan;

            $nou++;
        }

        $query_jlh_kehadiran = mysql_query("SELECT HOUR(timediff(waktu_keluar, waktu_masuk)) AS jlh_jam, kehadiran 
									  FROM absensi
									  WHERE nip = '$data[nip]' AND kehadiran = 'Hadir'
									  AND MONTH(tgl_absensi) = '$bulan' AND YEAR(tgl_absensi) = '$tahun'") or die(mysql_error());
        $jumlah_kehadiran = mysql_num_rows($query_jlh_kehadiran);

        $nou = 0;
        $jumlah_jam_kehadiran = 0;

        while ($data_jlh_kehadiran = mysql_fetch_array($query_jlh_kehadiran)) {
            if ($data_jlh_kehadiran['kehadiran'] == 'Hadir') {
                $jlh_jam = $data_jlh_kehadiran['jlh_jam'];
            } else {
                $jlh_jam = '0';
            }

            $jumlah_jam_kehadiran += $jlh_jam; //HITUNG TOTAL JAM KERJA 1 BULAN (26 HARI)

            $nou++;
        }

        $query_gapok = mysql_query("SELECT * FROM jabatan j 
								JOIN karyawan k ON k.id_jabatan = j.id_jabatan
								WHERE nip = '$data[nip]' GROUP BY nip");
        $data_gapok = mysql_fetch_array($query_gapok);

        $gaji_jam = $data_gapok['gapok'] / 208; // gaji per jam = GAPOK/8jam x 26


        $data_result[] = array(
            'nip' => $data['nip'],
            'nama_karyawan' => $data['nama_karyawan'],
            'gjam' => $gaji_jam,
            'jkehadiran' => $jumlah_kehadiran,
            'btunjangan' => $result_btunjangan,
            'jjk' => $jumlah_jam_kehadiran,
            'jbtunjangan' => $jumlah_btunjangan,
        );
        //var_dump($data_result);die();
    }

    $j = 0;
    $total_gapok = 0;
    $total_jgapok = 0;
    foreach ($data_result as $row) {
        $pdf->setX(4);
        $i++;
        $pdf->Cell($w[0], $linespace, $i, 'TLRB', 0, 'L', $fill); //NOMOR
        $pdf->Cell($w[1], $linespace, $row['nip'], 'TLRB', 0, 'L', $fill); //NIS
        $pdf->Cell($w[2], $linespace, ucwords(strtolower($row['nama_karyawan'])), 'TLRB', 0, 'L', $fill); //NAMA KARYAWAN

        $query_jenis_tunjangan4 = mysql_query("SELECT * FROM jenis_tunjangan");
        $nou4 = 0;
        while ($data_tjt4 = mysql_fetch_array($query_jenis_tunjangan4)) {
            @$total_tunjangan[$nou4] += $row['btunjangan'][$nou4];
            $nou4++;
        }

        foreach ($row['btunjangan'] as $row_ => $value_) {
            $pdf->Cell($w[4], $linespace, indo_number($value_), 'TLRB', 0, 'R', $fill); //JAWABAN
        }

        $pdf->Cell($w[5], $linespace, $row['jkehadiran'], 'TLRB', 0, 'C', $fill); //JUMLAH KANAN
        $pdf->Cell($w[6], $linespace, $row['jjk'], 'TLRB', 0, 'C', $fill); //JUMLAH KANAN

        $gaji = $row['jjk'] * $row['gjam']; //HITUNG GAJI = JUMLAH JAM KERJA x GAJI PER JAM
        $jgaji = ($row['jjk'] * $row['gjam']) + $row['jbtunjangan']; //HITUNG GAJI = JUMLAH JAM KERJA x GAJI PER JAM
        $total_gapok += $gaji; //TOTAL GAPOK SAJA
        $total_jgapok += $jgaji; //TOTAL JUMLAH GAPOK

        $pdf->Cell($w[7], $linespace, indo_number($gaji), 'TLRB', 0, 'R', $fill); //JUMLAH KANAN
        $pdf->Cell($w[8], $linespace, indo_number($jgaji), 'TLRB', 0, 'R', $fill); //JUMLAH KANAN
        $fill = !$fill;
        $pdf->Ln();
        $j++;
    }
//var_dump($total_tunjangan);die();
    $pdf->setX(4);
    $pdf->SetFont('Arial', 'B', '6');
    $pdf->Cell($w[0] + $w[1] + $w[2], $linespace, 'TOTAL', 'TLRB', 0, 'R', $fill); //NOMOR
    $query_jenis_tunjangan5 = mysql_query("SELECT * FROM jenis_tunjangan") or die(mysql_error());
    $nos5 = 0;
    while ($data_tjt5 = mysql_fetch_array($query_jenis_tunjangan5)) {
        $pdf->Cell($w[4], $linespace, indo_number($total_tunjangan[$nos5]), 'TLRB', 0, 'R', $fill); //JAWABAN	
        $nos5++;
    }
    $pdf->Cell($w[5], $linespace, '-', 'TLRB', 0, 'C', $fill);
    $pdf->Cell($w[6], $linespace, '-', 'TLRB', 0, 'C', $fill);
    $pdf->Cell($w[7], $linespace, indo_number($total_gapok), 'TLRB', 0, 'R', $fill); //TOTAL GAPOK
    $pdf->Cell($w[8], $linespace, indo_number($total_jgapok), 'TLRB', 0, 'R', $fill); //TOTAL JUMLAH GAPOK
    $fill = !$fill;
    $pdf->Ln();

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