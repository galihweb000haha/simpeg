<?php
$aksi = "modul/mod_jenis_tunjangan/aksi_jenis_tunjangan.php";
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Tambah Jenis Tunjangan</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=jenis_tunjangan&act=tambah" class="form uniformForm validateForm">
        <div class="field-group">
            <label for="required">Jenis Tunjangan:</label>
            <div class="field">
                <input type="text" name="nama_jenis_tunjangan" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->

        <div class="actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->

    </form>
</div> <!-- .widget-content -->



