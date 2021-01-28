<?php
$aksi = "modul/mod_jabatan/aksi_jabatan.php";

$id_jabatan = $_GET['id'];
$query = mysql_query("SELECT * FROM jabatan WHERE id_jabatan = $id_jabatan");
$data = mysql_fetch_array($query);
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Ubah Jabatan</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="../<?php echo $aksi; ?>?modul=jabatan&act=ubah" class="form uniformForm validateForm">
        <input type="hidden" value="<?php echo $data['id_jabatan']; ?>" name="id" id="id"/>
        <div class="field-group">
            <label for="required">Nama Jabatan:</label>
            <div class="field">
                <input type="text" value="<?php echo $data['nama_jabatan']; ?>" name="nama_jabatan" id="nama_jabatan" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->
        <div class="field-group">
            <label for="required">Nama gapok:</label>
            <div class="field">
                <input type="text" value="<?php echo $data['gapok']; ?>" name="gapok" id="gapok" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->

        <div class="actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->

    </form>
</div> <!-- .widget-content -->



