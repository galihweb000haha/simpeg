<?php

session_start();
if (empty($_SESSION['id_pengguna']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    $module = $_GET['modul'];
    $act = $_GET['act'];

    include "../../fungsi/koneksi.php";
    include"../../fungsi/fungsi_tanggal.php";
    include"../../fungsi/fungsi_validasi.php";
    include"../../fungsi/format_number.php";

    if ($module == 'jabatan' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $jabatan = trimed($_POST['nama_jabatan']);
        $cek = mysql_query("SELECT nama_jabatan FROM jabatan WHERE nama_jabatan = '$jabatan'");
        if (mysql_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Jabatan yang anda masukkan sudah ada. Periksa kembali data jabatan yang sudah ada !');
                        window.location='index.php?modul=$module';
                </script>";
        } else {
            $gapok = trim_number($_POST['gapok']);
            $query = mysql_query("INSERT INTO jabatan(nama_jabatan, gapok)
                            VALUES('$_POST[nama_jabatan]', $gapok)");
            if ($query) {
                header('location:../../index.php?modul=' . $module . '&pesan=tambah');
            } else {
                header('location:../../index.php?modul=' . $module . '&pesan=error');
            }
        }
    } elseif ($module == 'jabatan' AND $act == 'ubah') {
        $query = mysql_query("UPDATE jabatan SET nama_jabatan = '$_POST[nama_jabatan]', gapok = '$_POST[gapok]'
                                WHERE id_jabatan      = '$_POST[id]'");
        if ($query) {
            header('location:../../index.php?modul=' . $module . '&pesan=ubah');
        } else {
            header('location:../../index.php?modul=' . $module . '&pesan=error');
        }
    } elseif ($module == 'jabatan' AND $act == 'hapus') {
        $query = mysql_query("DELETE FROM jabatan WHERE id_jabatan='$_GET[id]'");

        if ($query) {
            header('location:../../index.php?modul=' . $module . '&pesan=hapus');
        } else {
            echo"<script language='javascript'>
                        alert('Jabatan ini tidak bisa di hapus karena masih di pergunakan');
                        window.location='../../index.php?modul=$module';
                </script>";
        }
    }
}
?>
