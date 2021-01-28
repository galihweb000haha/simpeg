<?php
$aksi = "modul/mod_jabatan/aksi_jabatan.php";

$id_jenis_tunjangan = $_GET['id'];
$query = mysql_query("SELECT * FROM jenis_tunjangan WHERE id_jenis_tunjangan = $id_jenis_tunjangan");
$data = mysql_fetch_array($query);
?>
<div class="widget-header">
    <span class="icon-user"></span>
    <h3>Ubah Jenis Tunjangan</h3>
</div> <!-- .widget-header -->

<div class="widget-content">
    <form  method=POST enctype='multipart/form-data' action="../<?php echo $aksi; ?>?modul=jenis_tunjangan&act=ubah" class="form uniformForm validateForm">
        <input type="hidden" value="<?php echo $data['id_jenis_tunjangan']; ?>" name="id" id="id"/>
        <div class="field-group">
            <label for="required">Nama Jenis Tunjangan:</label>
            <div class="field">
                <input type="text" value="<?php echo $data['nama_jenis_tunjangan']; ?>" name="nama_jenis_tunjangan" id="nama_jabatan" size="20" class="validate[required]" />
            </div>
        </div> <!-- .field-group -->

        <div class="actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
        </div> <!-- .actions -->

    </form>
</div> <!-- .widget-content -->



