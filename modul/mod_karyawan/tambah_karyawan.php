<?php
$aksi = "modul/mod_karyawan/aksi_karyawan.php";
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Tambah Karyawan</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=karyawan&act=tambah" class="form uniformForm validateForm">
        <div class="grid-8">
            <div class="widget">
                <div class="widget-header">
                </div>

                <div class="widget-content">
                    <div class="field-group">
                        <label for="required">NIP :</label>
                        <div class="field">
                            <input type="text" name="nip" id="nip" size="20" class="validate[required],custom[onlyNumberSp], custom[onlyNumberSp]"/>
                        </div>
                    </div> <!-- .field-group -->

                    <div class="field-group">
                        <label>Jabatan :</label>

                        <div class="field">
                            <select name="id_jabatan" id="id_jabatan" class="validate[required]">
                                <?php
                                $tampil = mysql_query("SELECT * FROM jabatan ORDER BY nama_jabatan");
                                if ($r['nip'] == 0) {
                                    echo "<option value='' selected>- Pilih Jabatan -</option>";
                                }

                                while ($w = mysql_fetch_array($tampil)) {
                                    echo "<option value=$w[id_jabatan]> $w[nama_jabatan]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="field-group">
                        <label for="required">Nama :</label>
                        <div class="field">
                            <input type="text" name="nama_karyawan" id="nama_karyawan" size="20" class="validate[required]" />
                        </div>
                    </div> <!-- .field-group -->

                    <div class="field-group">
                        <label>JK:</label>
                        <div class="field">
                            <select name="jk" id="jk" class="validate[required]">
                                <option value="" selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="field-group">
                        <label for="required">Tempat Lahir :</label>
                        <div class="field">
                            <input type="text" name="tempat_lahir" id="tempat_lahir" size="20" class="validate[required]" />
                        </div>
                    </div> <!-- .field-group -->

                    <div class="field-group inlineField">
                        <label for="datepicker">Tanggal Lahir:</label>

                        <div class="field">
                            <input type="text" name="tgl_lahir" id="datepicker" class="validate[required]"/>
                        </div> <!-- .field -->
                    </div> <!-- .field-group -->
                    <div class="field-group">
                        <label>Agama:</label>
                        <div class="field">
                            <select name="agama" id="agama" class="validate[required]">
                                <option value="" selected>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="grid-16">
            <div class="widget">

                <div class="widget-header">
                </div>

                <div class="widget-content">

                    <div class="field-group">
                        <label for="message">Alamat:</label>
                        <div class="field">
                            <textarea  name="alamat_karyawan" id="alamat_karyawan" rows="5" cols="50" class="validate[required]"></textarea>
                        </div>
                    </div>

                    <div class="field-group">
                        <label for="required">Telepon :</label>
                        <div class="field">
                            <input type="text" name="telp" id="telp" size="20" class="validate[required],custom[phone],custom[number]" />
                        </div>
                    </div> <!-- .field-group -->

                    <div class="field-group">
                        <label for="email">Email:</label>
                        <div class="field">
                            <input type="text" name="email" id="email" size="32" class="validate[required],custom[email]" />
                        </div>
                    </div> <!-- .field-group -->

                    <div class="field-group inlineField">
                        <label for="myfile">Foto:</label>

                        <div class="field">
                            <div class="uploader hover" id="uniform-myfile">
                                <input type="file" name="foto" id="myfile" size="19" style="opacity: 0;"/>
                            </div>
                            <label class="cardtype">* Format yang diperbolehkan *.png, *.gif, *.jpg, *.bmp</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="actions">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->

    </form>
</div> <!-- .widget-content -->


