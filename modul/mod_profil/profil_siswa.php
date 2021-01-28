<?php
$aksi = "modul/mod_profil/aksi_profil.php";

$query_siswa = mysql_query("select * from siswa where nis=$_SESSION[id_pengguna]");
$data_siswa = mysql_fetch_array($query_siswa);
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Ubah Profil</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=profil&act=update" class="form uniformForm validateForm">

        <div class="field-group">
            <label for="required">NIS :</label>
            <div class="field">
                <input type="text" value="<?php echo $data_siswa['nis']; ?>" name="nis" id="nis" size="20" class="validate[required]" disabled/>
            </div>
        </div> <!-- .field-group -->

        <div class="field-group">
            <label for="required">Nama :</label>
            <div class="field">
                <input type="text" value="<?php echo $data_siswa['nama_siswa']; ?>" name="nama_siswa" id="nama_siswa" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->

        <div class="field-group">
            <label for="required">Tempat Lahir :</label>
            <div class="field">
                <input type="text" value="<?php echo $data_siswa['tempat_lahir_siswa']; ?>"  name="tempat_lahir_siswa" id="tempat_lahir_siswa" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->

        <div class="field-group inlineField">
            <label for="datepicker">Tanggal Lahir:</label>

            <div class="field">
                <input type="text" value="<?php echo format_sqltoindo($data_siswa['tanggal_lahir_siswa']); ?>"  name="tanggal_lahir_siswa" id="datepicker"  class="validate[required]"/>
            </div> <!-- .field -->
        </div> <!-- .field-group -->

        <div class="field-group">
            <label>Agama:</label>

            <div class="field">
                <select name="agama_siswa" id="agama_siswa">
                    <option value="Islam">Islam</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Budha">Budha</option>
                    <option value="Hindu">Hindu</option>
                </select>
            </div>
        </div>

        <div class="field-group">
            <label for="message">Alamat:</label>
            <div class="field">
                <textarea  name="alamat_siswa" id="alamat_siswa" rows="5" cols="50" class="validate[required]"><?php echo $data_siswa['alamat_siswa']; ?> </textarea>
            </div>
        </div>

        <div class="field-group">
            <label for="required">Kota :</label>
            <div class="field">
                <input type="text" value="<?php echo $data_siswa['kota_siswa']; ?>"   name="kota_siswa" id="kota_siswa" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->

        <div class="field-group">
            <label for="email">Email:</label>
            <div class="field">
                <input type="text" value="<?php echo $data_siswa['email_siswa']; ?>"    name="email_siswa" id="email_siswa" size="32" class="validate[required,custom[email]" />
            </div>
        </div> <!-- .field-group -->

        <div class="field-group">
            <label for="required">Telepon Siswa :</label>
            <div class="field">
                <input type="text" value="<?php echo $data_siswa['telepon_siswa']; ?>"    name="telepon_siswa" id="telepon_siswa" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->

        <div class="actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->

    </form>
</div> <!-- .widget-content -->


