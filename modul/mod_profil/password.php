<?php
$aksi="modul/mod_profil/aksi_profil.php";
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Ubah Password</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="<?php echo $aksi;?>?modul=password&act=update" class="form uniformForm validateForm">

        <div class="field-group">
            <label for="required">Password Lama :</label>
            <div class="field">
                <input type="password" name="password_lama" id="password_lama" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->


        <div class="field-group">
            <label for="required">Password Baru :</label>
            <div class="field">
                <input type="password" name="password_baru" id="password_baru" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->


        <div class="field-group">
            <label for="required">Konfirmasi password baru :</label>
            <div class="field">
                <input type="password" name="konf_password" id="konf_password" size="20" class="validate[required, equals[password_baru]]" />
            </div>
        </div> <!-- .field-group -->

        <div class="actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->

    </form>
</div> <!-- .widget-content -->


