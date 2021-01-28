<?php
$aksi = "modul/mod_profil/aksi_profil.php";
?>
<link rel="stylesheet" href="stylesheets/sample_pages/pp.css" type="text/css" />
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Ubah Foto</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=foto&act=update" class="form uniformForm validateForm">
        <div class="field-group">
            <label for="required">Foto Sekarang :</label>
            <div class="field">
                <div class="pp">
                    <img alt="" src="<?php echo $data_sidebar['foto_siswa']; ?>">
                </div>
            </div>
        </div> <!-- .field-group -->

        <div class="field-group">
            <label for="required">Pilih Foto Baru:</label>
            <div class="field">
                <div class="uploader hover" id="uniform-myfile">
                    <input type="file" name="foto" id="foto" size="19" style="opacity: 0;" class="validate[required]">
                </div>
            </div>
        </div> <!-- .field-group -->

        <div class="actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->

    </form>
</div> <!-- .widget-content -->


