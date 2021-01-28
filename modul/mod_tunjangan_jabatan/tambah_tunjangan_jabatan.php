<?php
$aksi = "modul/mod_tunjangan_jabatan/aksi_tunjangan_jabatan.php";
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Tambah Jabatan</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=tunjangan_jabatan&act=tambah" class="form uniformForm validateForm">
        <div class="field-group">
            <label>Nama Karyawan :</label>

            <div class="field">
                <select name="nip" id="nip" class="validate[required]">
                    <?php
                    $tampil = mysql_query("SELECT * FROM karyawan ORDER BY nama_karyawan");
                    if ($r['nip'] == 0) {
                        echo "<option value='' selected>- Pilih Karyawan -</option>";
                    }

                    while ($w = mysql_fetch_array($tampil)) {
                        echo "<option value=$w[nip]> $w[nama_karyawan]</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="field-group">
            <label>Jenis Tunjangan :</label>

            <div class="field">
                <select name="id_jenis_tunjangan" id="id_jenis_tunjangan" class="validate[required]">
                    <?php
                    $tampil2 = mysql_query("SELECT * FROM jenis_tunjangan ORDER BY nama_jenis_tunjangan");
                    if ($r['id_jenis_tunjangan'] == 0) {
                        echo "<option value='' selected>- Pilih Jenis Tunjangan -</option>";
                    }

                    while ($w2 = mysql_fetch_array($tampil2)) {
                        echo "<option value=$w2[id_jenis_tunjangan]> $w2[nama_jenis_tunjangan]</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="field-group" style="display: none;" id="banyak">
            <label for="required">Banyak:</label>
            <div class="field">
                <input type="text" name="banyak" id="banyaknya" size="20" class="validate[required,max[3]]" />
            </div>
        </div> <!-- .field-group -->
        <div class="field-group" style="display: none;" id="per_anak">
            <label for="required">Tunjangan Per Anak:</label>
            <div class="field">
                <input type="text" name="per_anak" id="per_anaknya" size="20" value="0" class="validate[required]  formatCurrency" />
            </div>
        </div> <!-- .field-group -->
        <div class="field-group">
            <label for="required">Besar Tunjangan:</label>
            <div class="field">
                <input type="text" name="besar_tunjangan" id="besar_tunjangan" size="20" class="validate[required]  formatCurrency" />
            </div>
        </div> <!-- .field-group -->

        <div class="actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->

    </form>
</div> <!-- .widget-content -->



