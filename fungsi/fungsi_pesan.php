<?php
if (!empty($_GET['pesan']) && $_GET['pesan'] == 'import') {//NOTIFIKASI IMPORT DATA
?>
        <div class="notify notify-info">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=<?php echo $_GET["modul"]; ?>">×</a></div>
            <h3>Import Data berhasil</h3>
    <?php
        echo "<p>Jumlah data yang sukses di import : $_GET[sukses]<br>";
        echo "Jumlah data yang gagal di import : $_GET[gagal]</p>";
    ?>
    </div>
<?php
    } else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'tambah') {//NOTIFIKASI DATA BERHASIL DITAMBAH
?>
        <div class="notify notify-success">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=<?php echo $_GET["modul"]; ?>">×</a></div>
            <h3>Data berhasil disimpan.</h3>
        </div>
<?php
    } else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'tambah_soal') {//NOTIFIKASI DATA SOAL BERHASIL DISIMPAN
?>
        <div class="notify notify-success">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=<?php echo $_GET["modul"]; ?>&&id=<?php echo $_GET['id'];?>">×</a></div>
            <h3>Data soal berhasil disimpan.</h3>
        </div>
<?php
    } else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'ubah_nilai') {//NOTIFIKASI DATA BERHASIL NILAI
?>
        <div class="notify notify-success">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=<?php echo $_GET['modul']; ?>&&id=<?php echo $_GET['id'];?>">×</a></div>
            <h3>Nilai berhasil disimpan.</h3>
        </div>
<?php
    } else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'ubah') {//NOTIFIKASI DATA BERHASIL DIUBAH
?>
        <div class="notify notify-success">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=<?php echo $_GET["modul"]; ?>">×</a></div>
            <h3>Data berhasil diubah.</h3>
        </div>
<?php
    } else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'hapus') {//NOTIFIKASI DATA BERHASIL DIHAPUS
?>
        <div class="notify notify-success">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=<?php echo $_GET["modul"]; ?>">×</a></div>
            <h3>Data berhasil dihapus.</h3>
        </div>
<?php
    } else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'hapus_absensi') {//NOTIFIKASI DATA BERHASIL DIHAPUS
?>
        <div class="notify notify-success">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=detail_absensi&&id=<?php echo $_GET["id"]; ?>">×</a></div>
            <h3>Data absensi berhasil dihapus.</h3>
        </div>
<?php
    } else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'error') {//NOTIFIKASI DATA ERROR
?>
        <div class="notify notify-error">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=<?php echo $_GET["modul"]; ?>">×</a></div>
            <h3>Data gagal disimpan.</h3>
        </div>
<?php
    } else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'error_nilai') {//NOTIFIKASI DATA ERROR NILAI
?>
        <div class="notify notify-error">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=<?php echo $_GET['modul']; ?>&&id=<?php echo $_GET['id'];?>">×</a></div>
            <h3>Data nilai gagal disimpan.</h3>
        </div>
<?php
    } else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'file_error') {//NOTIFIKASI DATA ERROR
?>
        <div class="notify notify-error">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=tambah_materi">×</a></div>
            <h3>File harus berupa format (*.png, *.gif, *.jpg, *.pdf, *.xlsx, *.xls, *.doc, *.docx, *.ppt, *.pptx, *.pdf, *.txt, *.flv, *.avi, *.mp4, *.swf).</h3>
        </div>
<?php
    } else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'aktif_kuis') {//NOTIFIKASI AKTIFKAN KUIS
?>
        <div class="notify notify-success">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=<?php echo $_GET["modul"]; ?>">×</a></div>
            <h3>Kuis telah diaktifkan.</h3>
        </div>
<?php
    }else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'salah_pass') {//NOTIFIKASI SALAH UBAH PASSWORD LAMA
?>
        <div class="notify notify-error">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=<?php echo $_GET['modul']; ?>">×</a></div>
            <h3>Password lama tidak sesuai, silahkan masukkan kembali password lama anda dengan benar!.</h3>
        </div>
<?php
    } else if (!empty($_GET['pesan']) && $_GET['pesan'] == 'foto_error') {//NOTIFIKASI DATA ERROR
?>
        <div class="notify notify-error">
            <div align="right" style="font-size: 20px; color:red;"><a href="index.php?modul=<?php echo $_GET['modul'];?>">×</a></div>
            <h3>File harus berupa format (*.png, *.gif, *.jpg, *.bmp).</h3>
        </div>
<?php
    } 