<?php
$aksi = "modul/mod_karyawan/aksi_karyawan.php";

$nip = $_GET['id'];
$query = mysql_query("SELECT * FROM karyawan WHERE nip = $nip");
$data = mysql_fetch_array($query);

if($data['jk'] == 'Laki-laki'){
    $jk0 = '';
    $jk1 = 'selected';
    $jk2 = '';
}else if($data['jk'] == 'Perempuan'){
    $jk0 = '';
    $jk1 = '';
    $jk2 = 'selected';
}else{
    $jk0 = 'selected';
    $jk1 = '';
    $jk2 = '';
}

if($data['agama'] == 'Islam'){
    $agama0 = '';
    $agama1 = 'selected';
    $agama2 = '';
    $agama3 = '';
    $agama4 = '';
    $agama5 = '';
}elseif($data['agama'] == 'Protestan'){
    $agama0 = '';
    $agama1 = '';
    $agama2 = 'selected';
    $agama3 = '';
    $agama4 = '';
    $agama5 = '';
}elseif($data['agama'] == 'Katolik'){
    $agama0 = '';
    $agama1 = '';
    $agama2 = '';
    $agama3 = 'selected';
    $agama4 = '';
    $agama5 = '';
}elseif($data['agama'] == 'Budha'){
    $agama0 = '';
    $agama1 = '';
    $agama2 = '';
    $agama3 = '';
    $agama4 = 'selected';
    $agama5 = '';
}elseif($data['agama'] == 'Hindu'){
    $agama0 = '';
    $agama1 = '';
    $agama2 = '';
    $agama3 = '';
    $agama4 = '';
    $agama5 = 'selected';
}else{
    $agama0 = 'selected';
    $agama1 = '';
    $agama2 = '';
    $agama3 = '';
    $agama4 = '';
    $agama5 = '';
}
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Ubah Karyawan</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=karyawan&act=ubah" class="form uniformForm validateForm">
        <div class="grid-8">
            <div class="widget">
                <div class="widget-header">
                </div>

                <div class="widget-content">
                    <div class="field-group">
                        <label for="required">NIP :</label>
                        <div class="field">
                            <input type="text" name="nip" id="nip"  value="<?php echo $data['nip']; ?>"  size="20" class="validate[required],custom[onlyNumberSp]"/>
                            <input type="hidden" name="niph" id="niph"  value="<?php echo $data['nip']; ?>"  size="20" class="validate[required],custom[onlyNumberSp]"/>
                        </div>
                    </div> <!-- .field-group -->

                    <div class="field-group">
                        <label>Jabatan :</label>

                        <div class="field">
                            <select name="id_jabatan" id="id_jabatan" class="validate[required]">
                                <?php
                                $tampil = mysql_query("SELECT * FROM jabatan ORDER BY nama_jabatan");
                                if ($data['nip'] == 0) {
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
                            <input type="text" name="nama_karyawan" id="nama_karyawan"  value="<?php echo $data['nama_karyawan']; ?>"  size="20" class="validate[required]" />
                        </div>
                    </div> <!-- .field-group -->

                    <div class="field-group">
                        <label>JK:</label>
                        <div class="field">
                            <select name="jk" id="jk" class="validate[required]">
                                <option value="" <?php echo $jk0;?>>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?php echo $jk1;?>>Laki-laki</option>
                                <option value="Perempuan" <?php echo $jk2;?>>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="field-group">
                        <label for="required">Tempat Lahir :</label>
                        <div class="field">
                            <input type="text" name="tempat_lahir" id="tempat_lahir"  value="<?php echo $data['tempat_lahir']; ?>"  size="20" class="validate[required]" />
                        </div>
                    </div> <!-- .field-group -->

                    <div class="field-group inlineField">
                        <label for="datepicker">Tanggal Lahir:</label>

                        <div class="field">
                            <input type="text" name="tgl_lahir" id="datepicker"  value="<?php echo format_sqltoindo($data['tgl_lahir']); ?>"  class="validate[required]"/>
                        </div> <!-- .field -->
                    </div> <!-- .field-group -->
                    <div class="field-group">
                        <label>Agama:</label>
                        <div class="field">
                            <select name="agama" id="agama" class="validate[required]">
                                <option value="" <?php echo $agama0;?>>Pilih Agama</option>
                                <option value="Islam" <?php echo $agama1;?>>Islam</option>
                                <option value="Protestan" <?php echo $agama2;?>>Protestan</option>
                                <option value="Katolik" <?php echo $agama3;?>>Katolik</option>
                                <option value="Budha" <?php echo $agama4;?>>Budha</option>
                                <option value="Hindu" <?php echo $agama5;?>>Hindu</option>
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
                            <textarea  name="alamat_karyawan" id="alamat_karyawan" rows="5" cols="50" class="validate[required]"> <?php echo $data['alamat_karyawan']; ?>  </textarea>
                        </div>
                    </div>

                    <div class="field-group">
                        <label for="required">Telepon :</label>
                        <div class="field">
                            <input type="text" name="telp" id="telp"  value="<?php echo $data['telp']; ?>"  size="20" class="validate[required]" />
                        </div>
                    </div> <!-- .field-group -->

                    <div class="field-group">
                        <label for="email">Email:</label>
                        <div class="field">
                            <input type="text" name="email" id="email"  value="<?php echo $data['email']; ?>"  size="32" class="validate[required],custom[email]" />
                        </div>
                    </div> <!-- .field-group -->

                    <div class="field-group">
                        <label for="email">Password:</label>
                        <div class="field">
                            <input type="password" name="password" id="password" size="32" class="" />
                        </div>
                    </div> <!-- .field-group -->

                    <div class="field-group">
                        <label for="email">Konfirmasi Password:</label>
                        <div class="field">
                            <input type="password" name="konf_password" id="konf_password" size="32" class="" />
                        </div>
                    </div> <!-- .field-group -->
                </div>

            </div>
        </div>
        <div class="actions">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->

    </form>
</div> <!-- .widget-content -->


