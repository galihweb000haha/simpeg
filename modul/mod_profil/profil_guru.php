<?php
$aksi="modul/mod_profil/aksi_profil.php";

$query = mysql_query("select * from guru where nip=$_SESSION[id_pengguna]");
$data = mysql_fetch_array($query);
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Ubah Profil</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="<?php echo $aksi;?>?modul=profil&act=update" class="form uniformForm validateForm">

        <div class="field-group">
            <label for="required">NIP :</label>
            <div class="field">
                <input type="text" value="<?php echo $data['nip']; ?>" name="nip" id="nip" size="20" class="validate[required]" disabled/>
            </div>
        </div> <!-- .field-group -->

        <div class="field-group">
            <label for="required">Nama :</label>
            <div class="field">
                <input type="text" value="<?php echo $data['nama_guru']; ?>" name="nama_guru" id="nama_guru" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->

        <div class="field-group">
            <label for="required">Tempat Lahir :</label>
            <div class="field">
                <input type="text" value="<?php echo $data['tempat_lahir_guru']; ?>"  name="tempat_lahir_guru" id="tempat_lahir_guru" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->

        <div class="field-group inlineField">
            <label for="datepicker">Tanggal Lahir:</label>

            <div class="field">
                <input type="text" value="<?php echo format_sqltoindo($data['tgl_lahir_guru']); ?>"  name="tgl_lahir_guru" id="default_datepicker"  class="validate[required]"/>
            </div> <!-- .field -->
        </div> <!-- .field-group -->

        <div class="field-group">
            <label>Agama:</label>

            <div class="field">
                    <select name="agama_guru" id="agama_guru" class="validate[required]">
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
                <textarea  name="alamat_guru" id="alamat_guru" rows="5" cols="50" class="validate[required]"><?php echo $data['alamat_guru']; ?> </textarea>
            </div>
        </div>

        <div class="field-group">
            <label for="required">Kota :</label>
            <div class="field">
                <input type="text" value="<?php echo $data['kota_guru']; ?>"   name="kota_guru" id="kota_guru" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->

        <div class="field-group">
            <label for="email">Email:</label>
            <div class="field">
                <input type="text" value="<?php echo $data['email_guru']; ?>"    name="email_guru" id="email_guru" size="32" class="validate[required,custom[email]" />
            </div>
        </div> <!-- .field-group -->

        <div class="field-group">
            <label for="required">Telepon Guru :</label>
            <div class="field">
                <input type="text" value="<?php echo $data['telepon_guru']; ?>"    name="telepon_guru" id="telepon_guru" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->

        <div class="actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->

    </form>
</div> <!-- .widget-content -->


