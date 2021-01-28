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

    if ($module == 'jenis_tunjangan' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $jenis_tunjangan = trimed($_POST['nama_jenis_tunjangan']);
        $cek = mysql_query("SELECT nama_jenis_tunjangan FROM jenis_tunjangan WHERE nama_jenis_tunjangan = '$jenis_tunjangan'");
        if (mysql_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Jenis yang anda masukkan sudah ada. Periksa kembali data tunjangan_jabatan yang sudah ada !');
                        window.location='index.php?modul=$module';
                </script>";
        } else {
            $besar_tunjangan = trim_number($_POST['besar_tunjangan']);
            $query = mysql_query("INSERT INTO jenis_tunjangan(nama_jenis_tunjangan)
                            VALUES('$jenis_tunjangan')");
            if ($query) {
                header('location:../../index.php?modul=' . $module . '&pesan=tambah');
            } else {
                header('location:../../index.php?modul=' . $module . '&pesan=error');
            }
        }
    } elseif ($module == 'jenis_tunjangan' AND $act == 'ubah') {
        $query = mysql_query("UPDATE jenis_tunjangan SET nama_jenis_tunjangan = '$_POST[nama_jenis_tunjangan]'
                                WHERE id_jenis_tunjangan      = '$_POST[id]'");
        if ($query) {
            header('location:../../index.php?modul=' . $module . '&pesan=ubah');
        } else {
            header('location:../../index.php?modul=' . $module . '&pesan=error');
        }
    } elseif ($module == 'jenis_tunjangan' AND $act == 'hapus') {
        $query = mysql_query("DELETE FROM jenis_tunjangan WHERE id_jenis_tunjangan='$_GET[id]'");

        if ($query) {
            header('location:../../index.php?modul=' . $module . '&pesan=hapus');
        } else {
            echo"<script language='javascript'>
                        alert('Tunjangan ini tidak bisa di hapus karena masih di pergunakan');
                        window.location='../../index.php?modul=$module';
                </script>";
        }
    }
}
?>
