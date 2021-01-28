<?php
$aksi="modul/mod_jabatan/aksi_jabatan.php";
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Tambah Jabatan</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="<?php echo $aksi;?>?modul=jabatan&act=tambah" class="form uniformForm validateForm">

        <div class="field-group">
            <label for="required">Nama Jabatan:</label>
            <div class="field">
                <input type="text" name="nama_jabatan" id="nama_jabatan" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->
        <div class="field-group">
            <label for="required">Gaji Pokok:</label>
            <div class="field">
                <input type="text" name="gapok" id="gapok" size="20" class="validate[required]  formatCurrency" />
            </div>
        </div> <!-- .field-group -->

        <div class="actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->

    </form>
</div> <!-- .widget-content -->



