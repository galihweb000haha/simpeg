<?php

session_start();
if (empty($_SESSION['id_pengguna']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    $module = $_GET['modul'];
    $act = $_GET['act'];

    include "../../fungsi/excel_reader2.php";
    include "../../fungsi/koneksi.php";
    include"../../fungsi/fungsi_tanggal.php";
    include"../../fungsi/fungsi_validasi.php";

    //MODUL TAMBAH GURU
    if ($module == 'absensi' AND $act == 'tambah') {
        $tgl_absensi = format_indotosql($_POST['tgl_absensi']);
        $cek = mysql_query("SELECT * FROM absensi WHERE tgl_absensi = '$tgl_absensi'") or die(mysql_error());

        if (mysql_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Absensi tanggal $_POST[tgl_absensi] telah dilakukan, periksa kembali tanggal absensi!');
                        window.location='../../index.php?modul=$module';
                </script>";
        } else {
            $n = $_POST['jumlah_data'];
            for ($i = 1; $i <= $n; $i++) {
                $nip = $_POST['nip' . $i];
                $kehadiran = $_POST['kehadiran' . $i];
                $waktu_masuk = $_POST['waktu_masuk' . $i];
                $waktu_keluar = $_POST['waktu_keluar' . $i];

                $query = "INSERT INTO absensi(
                                    nip,
                                    kehadiran,
                                    waktu_masuk,
                                    waktu_keluar,
                                    tgl_absensi)
                            VALUES(
                                    '$nip',
                                    '$kehadiran',
                                    '$waktu_masuk',
                                    '$waktu_keluar',
                                    '$tgl_absensi')";
                $hasil = mysql_query($query);
                if ($hasil) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
        }
    }
    //MODUL UBAH GURU
    elseif ($module == 'absensi' AND $act == 'ubah') {
        mysql_query("UPDATE absensi SET kehadiran               = '$_POST[kehadiran]',
                                     waktu_masuk         = '$_POST[waktu_masuk]',
                                     waktu_keluar           = '$_POST[waktu_keluar]'
                                WHERE id_absensi     = '$_POST[id_absensi]'");
        header('location:../../index.php?modul=detail_absensi&&id='.$_POST[nip].'&&pesan=ubah');
    } elseif ($module == 'absensi' AND $act == 'hapus') {
            $query = mysql_query("DELETE FROM absensi WHERE id_absensi='$_GET[id]'");
            if ($query) {

                header('location:../../index.php?modul=detail_absensi&&id='.$_GET['nip'].'&&pesan=hapus_absensi');
            } else {
                echo"<script language='javascript'>
                        alert('Data tidak dapat dihapus, karena masih dipergunakan!');
                        window.location='../../index.php?modul=$module';
                </script>";
            }
    }
}
?>
