<?php
$aksi = "modul/mod_mengajar/aksi_mengajar.php";

$id_mengajar = $_GET['id'];
$id_ajar_detail = $_GET['id_ajar'];
$query = mysql_query("SELECT * FROM ajar_detail ad
                               JOIN mengajar m ON m.id_mengajar = ad.id_mengajar
                               JOIN mata_pelajaran mp ON mp.id_mp = m.id_mp
                               JOIN guru g ON g.nip = m.nip
                               JOIN kelas k ON k.id_kelas = ad.id_kelas
                               WHERE ad.id_ajar_detail = $id_ajar_detail")or die(mysql_error());
$hasil = mysql_num_rows($query);
$data = mysql_fetch_array($query);
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Ubah Mengajar</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="../<?php echo $aksi; ?>?modul=mengajar&act=ubah" class="form uniformForm validateForm">
        <input type="hidden" value="<?php echo $data['id_mengajar']; ?>" name="id" id="id"/>
        <input type="hidden" value="<?php echo $_GET['id_ajar']; ?>" name="id_ajar_detail" id="id_ajar_detail"/>
        <div class="field-group">
            <label>Guru:</label>

            <div class="field">
                <select name="nip" id="nip">
                    <?php
                    $tampil = mysql_query("SELECT * FROM guru ORDER BY nama_guru");
                    if ($data['nip'] == 0) {
                        echo "<option value='' selected>- Pilih Guru-</option>";
                    }

                    while ($w = mysql_fetch_array($tampil)) {
                        if ($data['nip'] == $w['nip']) {
                            echo "<option value=$w[nip] selected> $w[nama_guru]</option>";
                        } else {
                            echo "<option value=$w[nip]> $w[nama_guru]</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        
        <div class="field-group">
            <label>Kelas:</label>

            <div class="field">
                <select name="id_kelas" id="id_kelas">
                    <?php
                    $tampil = mysql_query("SELECT * FROM kelas ORDER BY nama_kelas");
                    if ($data['id_kelas'] == 0) {
                        echo "<option value='' selected>- Pilih Kelas -</option>";
                    }

                    while ($w = mysql_fetch_array($tampil)) {
                        if ($data['id_kelas'] == $w['id_kelas']) {
                            echo "<option value=$w[id_kelas] selected> $w[nama_kelas]</option>";
                        } else {
                            echo "<option value=$w[id_kelas]> $w[nama_kelas]</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="field-group">
            <label>Mata Pelajaran:</label>

            <div class="field">
                <select name="id_mp" id="id_mp">
                    <?php
                    $tampil = mysql_query("SELECT * FROM mata_pelajaran ORDER BY nama_mp");
                    if ($data['id_mp'] == 0) {
                        echo "<option value='' selected>- Pilih Mata Pelajaran -</option>";
                    }

                    while ($w = mysql_fetch_array($tampil)) {
                        if ($data['id_mp'] == $w['id_mp']) {
                            echo "<option value=$w[id_mp] selected> $w[nama_mp]</option>";
                        } else {
                            echo "<option value=$w[id_mp]> $w[nama_mp]</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->

    </form>
</div> <!-- .widget-content -->



