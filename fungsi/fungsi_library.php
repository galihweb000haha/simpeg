<?php

function query_tahun() {
    //QUERY MEMANGGIL TAHUN AJARAN YANG AKTIF
    $query_ajaran = mysql_query("SELECT * FROM tahun_ajaran ORDER BY id_tahun_ajaran DESC LIMIT 1");
    $hasil_ajaran = mysql_fetch_array($query_ajaran);
    $id_tahun_ajaran = $hasil_ajaran['id_tahun_ajaran'];
    $nama_tahun_ajaran = $hasil_ajaran['nama_tahun_ajaran'];
    //QUERY MEMANGGIL SEMESTER YANG AKTIF
    $query_ajaran = mysql_query("SELECT * FROM semester ORDER BY id_semester DESC LIMIT 1");
    $hasil_ajaran = mysql_fetch_array($query_ajaran);

    $id_semester = $hasil_ajaran['id_semester'];
    $semester = $hasil_ajaran['semester'];
}

//FUNGSI ID SEMESTER
function id_semester() {
    //QUERY MEMANGGIL SEMESTER YANG AKTIF
    $query_ajaran = mysql_query("SELECT * FROM semester ORDER BY id_semester DESC LIMIT 1");
    $hasil_ajaran = mysql_fetch_array($query_ajaran);

    $id_semester = $hasil_ajaran['id_semester'];

    return $id_semester;
}

//FUNGSI NAMA SEMESTER
function nama_semester() {
    //QUERY MEMANGGIL SEMESTER YANG AKTIF
    $query_ajaran = mysql_query("SELECT * FROM semester ORDER BY id_semester DESC LIMIT 1");
    $hasil_ajaran = mysql_fetch_array($query_ajaran);

    $semester = $hasil_ajaran['semester'];

    return $semester;
}

//FUNGSI ID TAHUN
function id_tahun() {
    //QUERY MEMANGGIL TAHUN AJARAN YANG AKTIF
    $query_ajaran = mysql_query("SELECT * FROM tahun_ajaran ORDER BY id_tahun_ajaran DESC LIMIT 1");
    $hasil_ajaran = mysql_fetch_array($query_ajaran);
    $id_tahun_ajaran = $hasil_ajaran['id_tahun_ajaran'];

    return $id_tahun_ajaran;
}

//FUNGSI NAMA TAHUN
function nama_tahun() {
    //QUERY MEMANGGIL TAHUN AJARAN YANG AKTIF
    $query_ajaran = mysql_query("SELECT * FROM tahun_ajaran ORDER BY id_tahun_ajaran DESC LIMIT 1");
    $hasil_ajaran = mysql_fetch_array($query_ajaran);
    $nama_tahun_ajaran = $hasil_ajaran['nama_tahun_ajaran'];

    return $nama_tahun_ajaran;
}

//FUNGSI DROPDOWN KELAS
function dropdown_kelas() {
?>

    <select name="id_kelas" id="id_kelas" class="validate[required]">
    <?php
    $tampil = mysql_query("SELECT * FROM kelas ORDER BY nama_kelas");
    if ($r['id_kelas'] == 0) {
        echo "<option value='' selected>- Pilih Kelas -</option>";
    }

    while ($w = mysql_fetch_array($tampil)) {
        echo "<option value=$w[id_kelas]> $w[nama_kelas]</option>";
    }
    ?>
</select>
<?php
}

//FUNGSI DROPDOWN KELAS DIAJAR
function dropdown_kelas_diajar() {
?>

    <select name="id_mengajar" id="id_kelas" class="validate[required]">
    <?php
    $query_dropdown_mengajar = mysql_query("SELECT * FROM mengajar m
                           JOIN ajar_detail ad ON ad.id_mengajar = m.id_mengajar
                           JOIN kelas k ON k.id_kelas = ad.id_kelas
                           JOIN mata_pelajaran mp ON mp.id_mp = m.id_mp
                           WHERE nip='$_SESSION[id_pengguna]' ORDER BY id_mengajar");

    echo "<option value='' selected>- Pilih Kelas -</option>";

    while ($wdm = mysql_fetch_array($query_dropdown_mengajar)) {
        echo "<option value=$wdm[id_mengajar]> $wdm[nama_kelas] - $wdm[nama_mp]</option>";
    }
    ?>
</select>
<?php
}

//FUNGSI MATERI BY NIP
function dropdown_materi_by_nip() {
?>
    <select name="id_materi" id="id_materi" class="validate[required]">
    <?php
    $tampil = mysql_query("SELECT * FROM materi m
                                                    JOIN materi_detail md ON md.id_materi = m.id_materi
                                                    JOIN mengajar mj ON mj.id_mengajar = md.id_mengajar
                                                    WHERE mj.nip = '$_SESSION[id_pengguna]'
                                                    ORDER BY judul_materi") or die(mysql_error());

    echo "<option value='' selected>- Pilih Materi -</option>";

    while ($w = mysql_fetch_array($tampil)) {
        echo "<option value=$w[id_materi]> $w[judul_materi]</option>";
    }
    ?>
</select>
<?php
}

function guru_by_nip() {
    $query = mysql_query("select * from guru where nip=$_SESSION[id_pengguna]");
    $data = mysql_fetch_array($query);
}
?>
