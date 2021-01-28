<?php
$aksi = "modul/mod_karyawan/aksi_karyawan.php";

$query = mysql_query("select * from karyawan k JOIN jabatan j ON j.id_jabatan = k.id_jabatan");
$hasil = mysql_num_rows($query);
?>
<div class="grid-24">
    <div class="widget widget-table">
<form  method="POST" enctype='multipart/form-data' action="modul/mod_gaji/cetak_struk_gaji.php" class="form uniformForm validateForm">
        <div class="widget-header">
            <span class="icon-list"></span>
            <h3 class="icon chart">Data Karyawan</h3>
        </div>
		<div class="actions" align="right">
            <label style="font-weight:bold;font-size:14px">Bulan : </label><input type="text" name="bulan" id="bulan" value="<?php echo date('m/Y');?>" style="background-color:orange" class="validate[required]">
        </div> <!-- .actions -->
        <div class="widget-content">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 7%;">
                            No.
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
                            NIP
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 20%;">
                            Nama Karyawan
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 20%;">
                            Jabatan
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 15%;">
                            Aksi
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysql_fetch_array($query)) {
                    ?>
                        <tr class="gradeA odd">
                            <td class=" sorting_1"><?php echo $i++; ?></td>
                            <td><?php echo $data['nip']; ?></td>
                            <td><?php echo $data['nama_karyawan']; ?></td>
                            <td><?php echo $data['nama_jabatan']; ?></td>
                            <td>
                                <button type="submit" class="btn btn-green btn-small" name="cetak" value="<?php echo $data['nip']; ?>">Cetak Struk Gaji</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->
</form>
</div>
<script>
	$(function () {
		$( "#bulan" ).datepicker({
			dateFormat : 'mm/yy'
		});
	});
</script>
