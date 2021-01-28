<?php

session_start();
if (empty($_SESSION['id_pengguna']) AND empty($_SESSION['passuser'])) {
    echo "<center>Untuk mengakses modul, Anda harus login <br>";
    echo "<a href=../../index.php><b>LOGIN</b></a></center>";
} else {
    $module = $_GET['modul'];
    $act = $_GET['act'];

    //echo $_SESSION['hak_akses'];
    //die();

    include "../../fungsi/koneksi.php";
    include"../../fungsi/fungsi_tanggal.php";
    if ($_SESSION['hak_akses'] == 'guru') {
        if ($module == 'profil' AND $act == 'update') {
            $tgl_lahir = format_indotosql($_POST['tgl_lahir_guru']);

            mysql_query("UPDATE guru SET nama_guru       = '$_POST[nama_guru]',
                                   agama_guru        = '$_POST[agama_guru]',
                                   tempat_lahir_guru = '$_POST[tempat_lahir_guru]',
                                   tgl_lahir_guru    = '$tgl_lahir',
                                   alamat_guru       = '$_POST[alamat_guru]',
                                   kota_guru         = '$_POST[kota_guru]',
                                   telepon_guru      = '$_POST[telepon_guru]',
                                   email_guru        = '$_POST[email_guru]'
                                WHERE nip      = '$_SESSION[id_pengguna]'");
            header('location:../../index.php?modul=' . $module);
        } elseif ($module == 'foto' AND $act == 'update') {
            $lokasi_file = $_FILES['foto']['tmp_name'];
            $tipe_file = $_FILES['foto']['type'];
            $nama_file = $_FILES['foto']['name'];

            $ext = substr($nama_file, strpos($nama_file, '.'), strlen($nama_file) - 1);
            $direktori = "../../file/foto_guru/$nama_file";
            $file_2 = "../../file/foto_guru/$_SESSION[id_pengguna]$ext";

            move_uploaded_file($lokasi_file, $direktori);
            $file_1 = "../../file/foto_guru/$nama_file";
            rename($file_1, $file_2);
            $file = "file/foto_guru/$_SESSION[id_pengguna]$ext";

            mysql_query("UPDATE guru SET foto_guru  = '$file'
                                WHERE nip = '$_SESSION[id_pengguna]'") or die(mysql_error());
            header('location:../../index.php?modul=' . $module);
        } else if ($module == 'password' AND $act == 'update') {
            //QUERY PASSWORD LAMA
            $cek = mysql_query("SELECT password FROM guru WHERE username = '$_SESSION[id_pengguna]'") or die(mysql_error());
            $data = mysql_fetch_array($cek);

            $password_lama = $data['password'];
            $password1 = md5($_POST["password_lama"]);
            $password2 = md5($_POST["password_baru"]);
            $password3 = md5($_POST["konf_password"]);
            //CEK PASSWORD LAMA
            if ($password1 != $password_lama) {
                header('location:../../index.php?modul=' . $module . '&pesan=salah_pass');
            } else {
                mysql_query("UPDATE guru SET password  = '$password3'
                                WHERE username      = '$_SESSION[id_pengguna]'") or die(mysql_error());
                header('location:../../index.php?modul=' . $module . '&pesan=tambah');
            }
        }
    } elseif ($_SESSION['hak_akses'] == 'siswa') {
        if ($module == 'profil' AND $act == 'update') {
            $tgl_lahir = format_indotosql($_POST['tanggal_lahir_siswa']);

            mysql_query("UPDATE siswa SET nama_siswa  = '$_POST[nama_siswa]',
                                   agama_siswa        = '$_POST[agama_siswa]',
                                   tempat_lahir_siswa = '$_POST[tempat_lahir_siswa]',
                                   tanggal_lahir_siswa= '$tgl_lahir',
                                   alamat_siswa       = '$_POST[alamat_siswa]',
                                   kota_siswa         = '$_POST[kota_siswa]',
                                   telepon_siswa      = '$_POST[telepon_siswa]',
                                   email_siswa        = '$_POST[email_siswa]'
                                WHERE nis      = '$_SESSION[id_pengguna]'");
            header('location:../../index.php?modul=' . $module);
        } elseif ($module == 'foto' AND $act == 'update') {
            $lokasi_file = $_FILES['foto']['tmp_name'];
            $tipe_file = $_FILES['foto']['type'];
            $nama_file = $_FILES['foto']['name'];

            $ext = substr($nama_file, strpos($nama_file, '.'), strlen($nama_file) - 1);
            $direktori = "../../file/foto_siswa/$nama_file";
            $file_2 = "../../file/foto_siswa/$_SESSION[id_pengguna]$ext";

            move_uploaded_file($lokasi_file, $direktori);
            $file_1 = "../../file/foto_siswa/$nama_file";
            rename($file_1, $file_2);
            $file = "file/foto_siswa/$_SESSION[id_pengguna]$ext";

            mysql_query("UPDATE siswa SET foto_siswa  = '$file'
                                WHERE nis = '$_SESSION[id_pengguna]'") or die(mysql_error());
            header('location:../../index.php?modul=' . $module);
        } else if ($module == 'password' AND $act == 'update') {
            //QUERY PASSWORD LAMA
            $cek = mysql_query("SELECT password FROM siswa WHERE nis = '$_SESSION[id_pengguna]'");
            $data = mysql_fetch_array($cek);

            $password_lama = $data['password'];
            $password1 = md5($_POST["password_lama"]);
            $password2 = md5($_POST["password_baru"]);
            $password3 = md5($_POST["konf_password"]);
            //CEK PASSWORD LAMA
            if ($password1 != $password_lama) {
                header('location:../../index.php?modul=' . $module . '&pesan=salah_pass');
            } else {
                mysql_query("UPDATE siswa SET password  = '$password3'
                                WHERE nis      = '$_SESSION[id_pengguna]'") or die(mysql_error());
                header('location:../../index.php?modul=' . $module . '&pesan=tambah');
            }
        }
    } elseif ($_SESSION['hak_akses'] == 'admin') {
        if ($module == 'profil' AND $act == 'update') {
            //QUERY PASSWORD LAMA
            $cek = mysql_query("SELECT password FROM guru WHERE nip = '$_SESSION[id_pengguna]'");
            $data = mysql_fetch_array($cek);

            $password_lama = $data['password'];
            $password1 = md5($_POST["password_lama"]);
            $password2 = md5($_POST["password_baru"]);
            $password3 = md5($_POST["konf_password"]);
            //CEK PASSWORD LAMA
            if ($password1 != $password_lama) {
                header('location:../../administrator/index.php?modul=' . $module . '&pesan=salah_pass');
            } else {
                mysql_query("UPDATE guru SET password  = '$password3'
                                WHERE nip = '$_SESSION[id_pengguna]'") or die(mysql_error());
                header('location:../../administrator/index.php?modul=' . $module);
            }
        } elseif ($module == 'foto' AND $act == 'update') {
            $lokasi_file = $_FILES['foto']['tmp_name'];
            $tipe_file = $_FILES['foto']['type'];
            $nama_file = $_FILES['foto']['name'];

            $ext = substr($nama_file, strpos($nama_file, '.'), strlen($nama_file) - 1);
            $direktori = "../../file/foto_admin/$nama_file";
            $file_2 = "../../file/foto_admin/$_SESSION[id_pengguna]$ext";

            move_uploaded_file($lokasi_file, $direktori);
            $file_1 = "../../file/foto_admin/$nama_file";
            rename($file_1, $file_2);
            $file = "file/foto_admin/$_SESSION[id_pengguna]$ext";

            mysql_query("UPDATE admin SET foto_admin  = '$file'
                                WHERE id_admin      = '$_SESSION[id_pengguna]'") or die(mysql_error());
            header('location:../../administrator/index.php?modul=' . $module);
        }
    }
}
?>
