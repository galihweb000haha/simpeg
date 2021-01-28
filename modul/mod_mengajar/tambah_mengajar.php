<?php
$aksi = "../modul/mod_mengajar/aksi_mengajar.php";
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Tambah Mengajar</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=mengajar&act=tambah" class="form uniformForm validateForm">

        <div class="field-group">
            <label>Guru :</label>

            <div class="field">
                <select name="nip" id="nip" class="validate[required]">
                    <?php
                    $tampil = mysql_query("SELECT * FROM guru ORDER BY nama_guru");
                    if ($r['nip'] == 0) {
                        echo "<option value='' selected>- Pilih Guru -</option>";
                    }

                    while ($w = mysql_fetch_array($tampil)) {
                            echo "<option value=$w[nip]> $w[nama_guru]</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="field-group">
            <label>Kelas:</label>

            <div class="field">
                <?php  dropdown_kelas();?>
            </div>
        </div>

        <div class="field-group">
            <label>Mata Pelajaran:</label>

            <div class="field">
                <select name="id_mp" id="id_mp" class="validate[required]">
                    <?php
                    $tampil = mysql_query("SELECT * FROM mata_pelajaran ORDER BY nama_mp");
                    if ($r['id_kelas'] == 0) {
                        echo "<option value='' selected>- Pilih Mata Pelajaran -</option>";
                    }

                    while ($w = mysql_fetch_array($tampil)) {
                            echo "<option value=$w[id_mp]> $w[nama_mp]</option>";
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



