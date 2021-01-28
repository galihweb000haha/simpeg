<?php
$aksi = "modul/mod_absensi/aksi_absensi.php";

$query = mysql_query("select * from karyawan k JOIN jabatan j ON j.id_jabatan = k.id_jabatan");
$hasil = mysql_num_rows($query);
?>
<link rel="stylesheet" type="text/css" href="plugins/timepicker/timepicker.css" media="screen" />
<script type="text/javascript" src="plugins/timepicker/timepicker-min.js"></script>
<div class="grid-24">
    <form  method=POST enctype='multipart/form-data' action="<?php echo $aksi; ?>?modul=absensi&act=tambah" class="validateForm">
        <div class="widget widget-table">
            <div class="widget-header">
                <span class="icon-list"></span>
                <h3 class="icon chart">Tambah Absensi</h3>
            </div>

            <div class="actions" align="right">
                <label style="font-weight:bold;font-size:14px">Tanggal Absensi : </label><input type="text" name="tgl_absensi" id="datepicker" value="<?php echo date('d/m/Y'); ?>" style="background-color:orange" class="validate[required]">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" onclick="self.history.back()" class="btn btn-error">Batal</button>
            </div> <!-- .actions -->
            <input type="hidden" name="jumlah_data" value="<?php echo $hasil; ?>"/>
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
                            <th class="ui-state-default" rowspan="1" colspan="1" style="width: 15%;">
                                Nama Karyawan
                            </th>
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
                        <?php
                        $i = 1;
                        while ($data = mysql_fetch_array($query)) {
                            ?>
                            <tr class="gradeA odd">
                                <td class=" sorting_1"><?php echo $i++; ?></td>
                                <td><?php echo $data['nip']; ?><input type="hidden" name="nip<?php echo $i - 1; ?>" value="<?php echo $data['nip']; ?>"/></td>
                                <td><?php echo $data['nama_karyawan']; ?></td>
                                <td>
                                    <div class="field-group inlineField">
                                        <div class="field">
                                            <label><input type="radio" name="kehadiran<?php echo $i - 1; ?>" value="Alpha" class="validate[required]"/>Alpha</label>
                                            <label><input type="radio" name="kehadiran<?php echo $i - 1; ?>" value="Hadir" class="validate[required]"/>Hadir</label>
                                            <label><input type="radio" name="kehadiran<?php echo $i - 1; ?>" value="Sakit" class="validate[required]"/>Sakit</label>
                                            <label><input type="radio" name="kehadiran<?php echo $i - 1; ?>" value="Ijin" class="validate[required]"/>Ijin</label>
                                            <label><input type="radio" name="kehadiran<?php echo $i - 1; ?>" value="Cuti" class="validate[required]"/>Cuti</label>
                                        </div> <!-- .field -->
                                    </div> <!-- .field-group --></td>
                                <td>
                                    <div class="field-group inlineField">
                                        <div class="field">
                                            <input type="text" name="waktu_masuk<?php echo $i - 1; ?>" id="timepicker_masuk<?php echo $i - 1; ?>" value="08:00" class="validate[required]">
                                        </div> <!-- .field -->
                                    </div> <!-- .field-group -->
                                </td>
                                <td>
                                    <div class="field-group inlineField">
                                        <div class="field">
                                            <input type="text" name="waktu_keluar<?php echo $i - 1; ?>" id="timepicker_keluar<?php echo $i - 1; ?>" value="16:00" class="validate[required]"/>
                                        </div> <!-- .field -->
                                    </div> <!-- .field-group -->
                                </td>
                            </tr>
                        <script type='text/javascript'>
                            $(function(){
                                $('#timepicker_masuk<?php echo $i - 1; ?>').timepicker ({
                                    showPeriod: true
                                    , showNowButton: true
                                    , showCloseButton: true
                                });
    								
    								
                                $('#timepicker_keluar<?php echo $i - 1; ?>').timepicker ({
                                    showPeriod: true
                                    , showNowButton: true
                                    , showCloseButton: true
                                });
                            });
                        </script>
                    <?php } ?>
                    </tbody>
                </table>


            </div>
        </div> <!-- .widget-content -->
    </form>
</div>
