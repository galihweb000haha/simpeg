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

    if ($module == 'tunjangan_jabatan' AND $act == 'tambah') {
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $jenis_tunjangan = $_POST['id_jenis_tunjangan'];
        $cek = mysql_query("SELECT * FROM tunjangan_jabatan WHERE id_jenis_tunjangan = '$jenis_tunjangan' AND nip = '$_POST[nip]'");
        if (mysql_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Tunjagan yang anda masukkan sudah ada. Periksa kembali data tunjangan_jabatan yang sudah ada !');
                        window.location='index.php?modul=$module';
                </script>";
        } else {
            $besar_tunjangan = trim_number($_POST['besar_tunjangan']);
            $query = mysql_query("INSERT INTO tunjangan_jabatan(id_jenis_tunjangan, nip, besar_tunjangan)
                            VALUES('$jenis_tunjangan', '$_POST[nip]' , '$besar_tunjangan')")or die(mysql_error());
            if ($query) {
                header('location:../../index.php?modul=' . $module . '&pesan=tambah');
            } else {
                header('location:../../index.php?modul=' . $module . '&pesan=error');
            }
        }
    } elseif ($module == 'tunjangan_jabatan' AND $act == 'ubah') {
        $query = mysql_query("UPDATE tunjangan_jabatan SET jenis_tunjangan_jabatan = '$_POST[jenis_tunjangan_jabatan]'
                                WHERE id_tunjangan_jabatan      = '$_POST[id]'");
        if ($query) {
            header('location:../../index.php?modul=' . $module . '&pesan=ubah');
        } else {
            header('location:../../index.php?modul=' . $module . '&pesan=error');
        }
    } elseif ($module == 'tunjangan_jabatan' AND $act == 'hapus') {
        $query = mysql_query("DELETE FROM tunjangan_jabatan WHERE id_tunjangan_jabatan='$_GET[id]'");

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
