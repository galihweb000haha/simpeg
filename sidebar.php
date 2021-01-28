<?php
if ($_SESSION == NULL) {
?>
    <div class="box">
        <h3><span class="icon-key-stroke"></span>&nbsp;Form Login</h3>
        <form class="form uniformForm validateForm" method="post" action="cek_login.php">
            <label for="required">Nama Pengguna:</label>
            <div class="field">
                <input type="text" name="username" id="username" size="20" class="validate[required]" />
            </div>
            <label for="required">Kata Sandi:</label>
            <div class="field">
                <input type="password" name="password" id="password" size="20" class="validate[required]" />
            </div>
            <div class="field">
                <label><input type="radio" name="tipe" id="tipe" size="20" class="validate[required]" value="siswa"/>Siswa</label>
                <label><input type="radio" name="tipe" id="tipe" size="20" class="validate[required]" value="guru"/>Guru</label>
            </div>
            <div align="right"><a href="lupa_password.php">Lupa Password ?</a></div>
            <div class="actions">
                <button type="submit" class="btn btn-success">Masuk</button>
            </div> <!-- .actions -->
        </form>

    </div>
<?php
} else {
?>

    <?php
    if ($_SESSION['hak_akses'] == 'siswa') {
        //QUERY DATA SISWA SIDEBAR
        $query_sidebar = mysql_query("select * from siswa where nis=$_SESSION[id_pengguna]");
        $data_sidebar = mysql_fetch_array($query_sidebar);

        $foto_siswa_sidebar = $data_sidebar['foto_siswa'];
        //QUERY TUGAS TERBARU TERAKHIR
        $query_tugas_sidebar = mysql_query("SELECT * FROM tugas t
                               JOIN tugas_detail td ON td.id_tugas = t.id_tugas
                               JOIN ajar_detail ad ON ad.id_ajar_detail = td.id_ajar_detail
                               JOIN mengajar m ON m.id_mengajar = ad.id_mengajar
                               JOIN detail_kelas sk ON sk.id_kelas = ad.id_kelas
                               JOIN siswa s ON s.nis = sk.nis
                               WHERE s.nis = $_SESSION[id_pengguna]
                               AND ad.id_semester=$id_semester
                               AND id_tahun_ajaran = $id_tahun_ajaran
                               ORDER BY t.id_tugas DESC LIMIT 1");
        $data_tugas_sidebar = mysql_fetch_array($query_tugas_sidebar);
        //QUERY MATERI TERBARU TERAKHIR
        $query_materi_sidebar = mysql_query("SELECT * FROM materi t
                               JOIN ajar_detail ad ON ad.id_ajar_detail = t.id_ajar_detail
                               JOIN mengajar m ON m.id_mengajar = ad.id_mengajar
                               JOIN detail_kelas sk ON sk.id_kelas = ad.id_kelas
                               JOIN siswa s ON s.nis = sk.nis
                               WHERE s.nis = $_SESSION[id_pengguna]
                               AND id_semester=$id_semester
                               AND id_tahun_ajaran = $id_tahun_ajaran
                               ORDER BY t.id_materi DESC LIMIT 1");
        $data_materi_sidebar = mysql_fetch_array($query_materi_sidebar);
        //QUERY PENGUMUMAN TERBARU TERAKHIR
        $query_pengumuman_sidebar = mysql_query("SELECT * FROM pengumuman t
                               JOIN ajar_detail ad ON ad.id_ajar_detail = t.id_ajar_detail
                               JOIN mengajar m ON m.id_mengajar = ad.id_mengajar
                               JOIN detail_kelas sk ON sk.id_kelas = ad.id_kelas
                               JOIN siswa s ON s.nis = sk.nis
                               WHERE s.nis = $_SESSION[id_pengguna]
                               AND id_semester=$id_semester
                               AND id_tahun_ajaran = $id_tahun_ajaran
                               ORDER BY t.id_pengumuman DESC LIMIT 1");
        $data_pengumuman_sidebar = mysql_fetch_array($query_pengumuman_sidebar);
    ?>
<div class="box">
        <h3>Akun Saya</h3>
        <div class="sidebar_profil">
            <center><a href="index.php?modul=foto"><button class="btn btn-small">&nbsp;&nbsp;Ubah Foto Profil&nbsp;&nbsp;</button></a></center>
            <img src="<?php echo $foto_siswa_sidebar; ?>" title="ubah foto"><br/>
            <div class="identitas">
                <table width="100%">
                    <tr>
                        <td width="20%">Nama</td>
                        <td>: <?php echo $_SESSION['nama']; ?></td>
                    </tr>
                    <tr>
                        <td width="20%">NIS</td>
                        <td>: <?php echo $_SESSION['id_pengguna']; ?></td>
                    </tr>
                    <tr>
                        <td width="30%">Hak Akses</td>
                        <td>: Siswa</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                            <a href="index.php?modul=password" title="Ubah Password">
                                <button class="btn btn-warning"><span class="icon-key-stroke"></span></button>
                            </a>
                            <a href="index.php?modul=profil" title="Ubah Profil">
                                <button class="btn btn-success"><span class="icon-user"></span></button>
                            </a>
                            <a href="logout.php">
                                <button class="btn btn-error">Keluar</button>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
</div>
<div class="box">
    <h3>Info Terbaru</h3>
    <ul class="bullet secondary">
            <li id="mdl_tugas">Tugas : <?php echo $data_tugas_sidebar['judul_tugas'];?></li>
            <li id="mdl_materi">Materi : <?php echo $data_materi_sidebar['judul_materi'];?></li>
            <li id="mdl_pengumuman" value="<?php echo $data_pengumuman_sidebar['id_pengumuman'];?>">Pengumuman : <a href="#"><?php echo $data_pengumuman_sidebar['judul_pengumuman'];?></a></li>
            <li>Quiz : Info Quiz terbaru</li>
    </ul>
</div> <!-- .box -->
    <?php } else {
        //QUERY DATA GURU SIDEBAR
        $query_sidebar = mysql_query("select * from guru where nip=$_SESSION[id_pengguna]")or die(mysql_error());
        $data_sidebar = mysql_fetch_array($query_sidebar);

        $foto_guru_sidebar = $data_sidebar['foto_guru'];
    ?>
<div class="box">
        <h3>Akun Saya</h3>
        <div class="sidebar_profil">
            <center><a href="index.php?modul=foto"><button class="btn btn-small">&nbsp;&nbsp;Ubah Foto Profil&nbsp;&nbsp;</button></a></center>
            <img src="<?php echo $foto_guru_sidebar; ?>" title="ubah foto"><br/>
            <div class="identitas">
                <table width="100%">
                    <tr>
                        <td width="30%">Nama</td>
                        <td>: <?php echo $_SESSION['nama']; ?></td>
                    </tr>
                    <tr>
                        <td width="30%">NIP</td>
                        <td>: <?php echo $_SESSION['id_pengguna']; ?></td>
                    </tr>
                    <tr>
                        <td width="30%">Hak Akses</td>
                        <td>: Guru</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                            <a href="index.php?modul=password" title="Ubah Password">
                                <button class="btn btn-warning"><span class="icon-key-stroke"></span></button>
                            </a>
                            <a href="index.php?modul=profil" title="Ubah Profil">
                                <button class="btn btn-success"><span class="icon-user"></span></button>
                            </a>
                            <a href="logout.php">
                                <button class="btn btn-error">Keluar</button>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
</div>
<!--
<div class="box">
    <h3>Info Terbaru</h3>
    <ul class="bullet secondary">
            <li>Info Terbaru tugas terbaru</li>
            <li>Info Terbaru siswa ujian terbaru</li>
            <li>Info Terbaru pengumuman terbaru</li>
    </ul>
</div> <!-- .box -->
    <?php } ?>
<?php } ?>