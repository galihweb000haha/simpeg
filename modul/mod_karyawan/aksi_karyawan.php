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
    if ($module == 'karyawan' AND $act == 'tambah') {

        $tgl_lahir = format_indotosql($_POST['tgl_lahir']);
        $password = md5($_POST['nip']);

        $lokasi_file = $_FILES['foto']['tmp_name'];
        $tipe_file = $_FILES['foto']['type'];
        $nama_file = $_FILES['foto']['name'];
        $allowed_filetypes = array('.png', '.gif', '.jpg', '.bmp');
        $ext = substr($nama_file, strpos($nama_file, '.'), strlen($nama_file) - 1);
        //FUNGSI MENGHILANGKAN BANYAK SPASI DIAMBIL DARI fungsi/fungsi_validasi.php =>function trimed
        $nip = trimed($_POST['nip']);

        $cek = mysql_query("SELECT nip FROM karyawan WHERE nip = '$nip'");
        if (mysql_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('NIP yang anda masukkan sudah ada. Periksa kembali data NIP yang sudah ada !');
                        self.history.back();
                </script>";
        } else {
            //JIKA FOTO KOSONG
            if (empty($nama_file)) {
                $query = mysql_query("INSERT INTO karyawan(
                                    nip,
                                    nama_karyawan,
                                    jk,
                                    tempat_lahir,
                                    tgl_lahir,
                                    agama,
                                    alamat_karyawan,
                                    telp,
                                    email,
                                    password,
                                    foto,
                                    id_jabatan)
                            VALUES(
                                    '$_POST[nip]',
                                    '$_POST[nama_karyawan]',
                                    '$_POST[jk]',
                                    '$_POST[tempat_lahir]',
                                    '$tgl_lahir',
                                    '$_POST[agama]',
                                    '$_POST[alamat_karyawan]',
                                    '$_POST[telp]',
                                    '$_POST[email]',
                                    '$password',
                                    'file/default_user.png',
                                    '$_POST[id_jabatan]')");
                if ($query) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
            //JIKA FOTO ADA TAPI FORMAT SALAH
            else if (!in_array($ext, $allowed_filetypes)) {
                header('location:../../index.php?modul=tambah_karyawan&pesan=foto_error');
            }
            //JIKA FOTO ADA N FORMAT TIDAK SALAH
            else {
                $ext = substr($nama_file, strpos($nama_file, '.'), strlen($nama_file) - 1);
                $direktori = "../../file/foto_karyawan/$nama_file";
                $file_2 = "../../file/foto_karyawan/$_POST[nip]$ext";

                move_uploaded_file($lokasi_file, $direktori);
                $file_1 = "../../file/foto_karyawan/$nama_file";
                rename($file_1, $file_2);
                $file = "file/foto_karyawan/$_POST[nip]$ext";

                $query = mysql_query("INSERT INTO karyawan(
                                    nip,
                                    nama_karyawan,
                                    jk,
                                    tempat_lahir,
                                    tgl_lahir,
                                    agama,
                                    alamat_karyawan,
                                    telp,
                                    email,
                                    password,
                                    foto,
                                    id_jabatan)
                            VALUES(
                                    '$_POST[nip]',
                                    '$_POST[nama_karyawan]',
                                    '$_POST[jk]',
                                    '$_POST[tempat_lahir]',
                                    '$tgl_lahir',
                                    '$_POST[agama]',
                                    '$_POST[alamat_karyawan]',
                                    '$_POST[telp]',
                                    '$_POST[email]',
                                    '$password',
                                    '$file',
                                    '$_POST[id_jabatan]')") or die(mysql_error());
                if ($query) {
                    header('location:../../index.php?modul=' . $module . '&pesan=tambah');
                } else {
                    header('location:../../index.php?modul=' . $module . '&pesan=error');
                }
            }
        }
    }
    //MODUL UBAH GURU
    elseif ($module == 'karyawan' AND $act == 'ubah') {
        $tgl_lahir = format_indotosql($_POST['tgl_lahir']);
        if($_POST['konf_password'] == ''){
            $niph = $_POST['niph'];
            mysql_query("UPDATE karyawan SET nama_karyawan         = '$_POST[nama_karyawan]',
                                         jk             = '$_POST[jk]',
                                         tempat_lahir = '$_POST[tempat_lahir]',
                                         tgl_lahir    = '$tgl_lahir',
                                         agama       = '$_POST[agama]',
                                         alamat_karyawan       = '$_POST[alamat_karyawan]',
                                         email        = '$_POST[email]',
                                         telp      = '$_POST[telp]',
                                         id_jabatan      = '$_POST[id_jabatan]'
                                    WHERE nip      = '$niph'")or die(mysql_error());
            
            mysql_query("UPDATE karyawan SET nip               = '$_POST[nip]'
                                    WHERE nama_karyawan      = '$_POST[nama_karyawan]' 
                                    AND tgl_lahir = '$tgl_lahir'")or die(mysql_error());
        }else{
            if($_POST['password'] != $_POST['konf_password']){
            echo"<script language='javascript'>
                        alert('Konfirmasi password salah!');
                        window.location='../../index.php?modul=ubah_karyawan&&id=$_POST[niph]';
                </script>";
            }else{
            $password = md5($_POST['konf_password']);
            mysql_query("UPDATE karyawan SET 
                                         nama_karyawan         = '$_POST[nama_karyawan]',
                                         jk             = '$_POST[jk]',
                                         tempat_lahir = '$_POST[tempat_lahir]',
                                         tgl_lahir    = '$tgl_lahir',
                                         agama       = '$_POST[agama]',
                                         alamat_karyawan       = '$_POST[alamat_karyawan]',
                                         email        = '$_POST[email]',
                                         telp      = '$_POST[telp]',
                                         id_jabatan      = '$_POST[id_jabatan]',
                                         password      = '$password'
                                    WHERE nip      = '$niph'")or die(mysql_error());
            
            mysql_query("UPDATE karyawan SET nip               = '$_POST[nip]'
                                    WHERE nama_karyawan      = '$_POST[nama_karyawan]' 
                                    AND tgl_lahir = '$tgl_lahir'")or die(mysql_error());
            }
        }
            header('location:../../index.php?modul=' . $module . '&pesan=ubah');
    } elseif ($module == 'karyawan' AND $act == 'hapus') {
        $data = mysql_fetch_array(mysql_query("SELECT foto_karyawan FROM karyawan WHERE nip='$_GET[id]'"));
        if ($data['foto_karyawan'] != 'file/default_user.png') {
            $_SESSION['foto'] = substr($data['foto_karyawan'], 15);

            //HAPUS DATA GURU
            $query = mysql_query("DELETE FROM karyawan WHERE nip='$_GET[id]'");
            if ($query) {
                unlink("../../file/foto_karyawan/$_SESSION[foto]");
                //HAPUS DATA PENGGUNA
                mysql_query("DELETE FROM pengguna WHERE username='$_GET[id]'");

                header('location:../../index.php?modul=' . $module . '&pesan=hapus');
            } else {
                echo"<script language='javascript'>
                        alert('Data tidak dapat dihapus, karena masih dipergunakan!');
                        window.location='../../index.php?modul=$module';
                </script>";
            }
        } else {
            //HAPUS DATA GURU
            $query = mysql_query("DELETE FROM karyawan WHERE nip='$_GET[id]'");
            if ($query) {

                header('location:../../index.php?modul=' . $module . '&pesan=hapus');
            } else {
                echo"<script language='javascript'>
                        alert('Data tidak dapat dihapus, karena masih dipergunakan!');
                        window.location='../../index.php?modul=$module';
                </script>";
            }
        }
    }
}
?>
