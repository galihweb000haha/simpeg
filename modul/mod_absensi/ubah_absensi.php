<?php
$aksi = "modul/mod_absensi/aksi_absensi.php";

$query = mysql_query("select * from absensi a JOIN karyawan k ON k.nip = a.nip JOIN jabatan j ON j.id_jabatan = k.id_jabatan WHERE id_absensi = $_GET[id]")or die(mysql_error());
$hasil = mysql_num_rows($query);
$data = mysql_fetch_array($query);

if($data['kehadiran'] == 'Hadir'){
    $kehadiran0 = '';
    $kehadiran1 = 'checked';
    $kehadiran2 = '';
    $kehadiran3 = '';
    $kehadiran4 = '';
}elseif($data['kehadiran'] == 'Sakit'){
    $kehadiran0 = '';
    $kehadiran1 = '';
    $kehadiran2 = 'checked';
    $kehadiran3 = '';
    $kehadiran4 = '';
}elseif($data['kehadiran'] == 'Ijin'){
    $kehadiran0 = '';
    $kehadiran1 = '';
    $kehadiran2 = '';
    $kehadiran3 = 'checked';
    $kehadiran4 = '';
}elseif($data['kehadiran'] == 'Cuti'){
    $kehadiran0 = '';
    $kehadiran1 = '';
    $kehadiran2 = '';
    $kehadiran3 = '';
    $kehadiran4 = 'checked';
}else{
    $kehadiran0 = 'checked';
    $kehadiran1 = '';
    $kehadiran2 = '';
    $kehadiran3 = '';
    $kehadiran4 = '';
}
?>
<link rel="stylesheet" type="text/css" href="plugins/timepicker/timepicker.css" media="screen" />
<script type="text/javascript" src="plugins/timepicker/timepicker-min.js"></script>
<div class="grid-24">
    <form  method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=absensi&act=ubah" class="validateForm">
        <div class="widget widget-table">
            <div class="widget-header">
                <span class="icon-list"></span>
                <h3 class="icon chart">Ubah Absensi : <?php echo $data['nama_karyawan'].' / Tanggal : '.format_sqltoindo($data['tgl_absensi']);?></h3>
            </div>

            <div class="actions" align="right">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
            </div> <!-- .actions -->
            <input type="hidden" name="id_absensi" value="<?php echo $_GET['id']; ?>"/>
            <input type="hidden" name="nip" value="<?php echo $data['nip']; ?>"/>
            <div class="widget-content">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="ui-state-default" rowspan="1" colspan="1" style="width: 20%;">
                                Kehadiran
                            </th>
                            <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
                                Jam Masuk
                            </th>
                            <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
                                Jam Keluar
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                            <tr class="gradeA odd">
                                <td>
                                    <div class="field-group inlineField">
                                        <div class="field">
                                            <label><input type="radio" name="kehadiran" value="Alpha" class="validate[required]" <?php echo $kehadiran0;?>/>Alpha</label>
                                            <label><input type="radio" name="kehadiran" value="Hadir" class="validate[required]" <?php echo $kehadiran1;?>/>Hadir</label>
                                            <label><input type="radio" name="kehadiran" value="Sakit" class="validate[required]" <?php echo $kehadiran2;?>/>Sakit</label>
                                            <label><input type="radio" name="kehadiran" value="Ijin" class="validate[required]" <?php echo $kehadiran3;?>/>Ijin</label>
                                            <label><input type="radio" name="kehadiran" value="Cuti" class="validate[required]" <?php echo $kehadiran4;?>/>Cuti</label>
                                        </div> <!-- .field -->
                                    </div> <!-- .field-group --></td>
                                <td>
                                    <div class="field-group inlineField">
                                        <div class="field">
                                            <input type="text" name="waktu_masuk" id="timepicker_masuk" value="<?php echo $data['waktu_masuk'];?>" class="validate[required]">
                                        </div> <!-- .field -->
                                    </div> <!-- .field-group -->
                                </td>
                                <td>
                                    <div class="field-group inlineField">
                                        <div class="field">
                                            <input type="text" name="waktu_keluar" id="timepicker_keluar" value="<?php echo $data['waktu_keluar'];?>" class="validate[required]"/>
                                        </div> <!-- .field -->
                                    </div> <!-- .field-group -->
                                </td>
                            </tr>
                        <script type='text/javascript'>
                            $(function(){
                                $('#timepicker_masuk').timepicker ({
                                    showPeriod: true
                                    , showNowButton: true
                                    , showCloseButton: true
                                });
    								
    								
                                $('#timepicker_keluar').timepicker ({
                                    showPeriod: true
                                    , showNowButton: true
                                    , showCloseButton: true
                                });
                            });
                        </script>
                    </tbody>
                </table>


            </div>
        </div> <!-- .widget-content -->
    </form>
</div>
