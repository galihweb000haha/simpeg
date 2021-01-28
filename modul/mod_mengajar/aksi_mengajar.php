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

    $query_ajaran = mysql_query("SELECT * FROM semester WHERE status_aktif = 1");
    $hasil_ajaran = mysql_fetch_array($query_ajaran);

    $id_semester = $hasil_ajaran['id_semester'];
    $semester = $hasil_ajaran['semester'];

    if ($module == 'mengajar' AND $act == 'tambah') {
        $cek = mysql_query("SELECT * FROM ajar_detail ad
                                     JOIN mengajar m ON m.id_mengajar = ad.id_mengajar
                                     WHERE m.id_mp = '$_POST[id_mp]'
                                     AND ad.id_kelas ='$_POST[id_kelas]'
                                     AND ad.id_semester='$id_semester'");
        if (mysql_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Data mengajar yang anda masukkan telah terdaftar untuk semester ini. Periksa kembali data mengajar yang telah terdaftar !');
                        window.location='../../administrator/index.php?modul=$module';
                </script>";
        } else {
            mysql_query("INSERT INTO mengajar(nip, id_mp)
                            VALUES('$_POST[nip]', '$_POST[id_mp]')") or die(mysql_error());

            $query_mengajar = mysql_query("SELECT * FROM mengajar WHERE nip = '$_POST[nip]' AND id_mp = '$_POST[id_mp]'");
            $hasil_mengajar = mysql_fetch_array($query_mengajar);

            $query2 = mysql_query("INSERT INTO ajar_detail(id_mengajar, id_kelas, id_semester)
                                   VALUES('$hasil_mengajar[id_mengajar]', '$_POST[id_kelas]', '$id_semester')") or die(mysql_error());
            if ($query2) {
                header('location:../../administrator/index.php?modul=' . $module . '&pesan=tambah');
            } else {
                header('location:../../administrator/index.php?modul=' . $module . '&pesan=error');
            }
        }
    } elseif ($module == 'mengajar' AND $act == 'ubah') {
        $cek = mysql_query("SELECT * FROM ajar_detail ad 
                                     JOIN mengajar m ON m.id_mengajar = ad.id_mengajar
                                     WHERE m.id_mp = '$_POST[id_mp]'
                                     AND ad.id_kelas ='$_POST[id_kelas]'
                                     AND ad.id_semester='$id_semester'");
        if (mysql_num_rows($cek) > 0) {
            echo"<script language='javascript'>
                        alert('Data mengajar yang anda masukkan telah terdaftar untuk semester ini. Periksa kembali data mengajar yang telah terdaftar !');
                        window.location='../../administrator/index.php?modul=$module';
                </script>";
        } else {
            $query1 = mysql_query("UPDATE mengajar SET nip = '$_POST[nip]', id_mp = '$_POST[id_mp]'
                                WHERE id_mengajar = '$_POST[id]'")or die(mysql_error());

            $query2 = mysql_query("UPDATE ajar_detail SET id_kelas = '$_POST[id_kelas]', id_semester='$id_semester'
                                WHERE id_ajar_detail      = '$_POST[id_ajar_detail]'")or die(mysql_error());

            if ($query1 AND $query2) {
                header('location:../../administrator/index.php?modul=' . $module . '&pesan=ubah');
            } else {
                header('location:../../administrator/index.php?modul=' . $module . '&pesan=error');
            }
        }
    } elseif ($module == 'mengajar' AND $act == 'hapus') {
        $query = mysql_query("DELETE FROM mengajar WHERE id_mengajar='$_GET[id]'");
        $query2 = mysql_query("DELETE FROM ajar_detail WHERE id_mengajar='$_GET[id]'");

        if ($query AND $query2) {
            header('location:../../administrator/index.php?modul=' . $module);
        } else {
            echo" <script language='javascript'>
                        alert('Data mengajar tidak bisa di hapus karena masih di pergunakan');
                        window.location='../../administrator/index.php?modul=$module';
		</script>";
        }
    }
}
?>
