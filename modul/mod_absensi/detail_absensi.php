<?php
$aksi = "modul/mod_absensi/aksi_absensi.php";
$nip = $_GET['id'];
$query = mysql_query("select * from absensi a 
                        JOIN karyawan k ON k.nip = a.nip 
                        JOIN jabatan j ON j.id_jabatan = k.id_jabatan
                        WHERE k.nip = '$nip' 								
                        ORDER BY tgl_absensi DESC");
$hasil = mysql_num_rows($query);

$queryk = mysql_query("SELECT * FROM karyawan WHERE nip = '$nip'");
$datak = mysql_fetch_array($queryk);
?>
<div class="grid-24">
    <div class="widget widget-table">
        <div class="widget-header">
            <span class="icon-list"></span>
            <h3 class="icon chart">Data Absensi : <?php echo $datak['nip'].' - '.$datak['nama_karyawan'];?></h3>
        </div>
        <div class="widget-content">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 7%;">
                            No.
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
                            Tanggal
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
                            Kehadiran
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
                            Jam Masuk
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
                            Jam Keluar
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
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
                            <td><?php echo format_date($data['tgl_absensi']); ?></td>
                            <td><?php echo $data['kehadiran']; ?></td>
                            <td><?php echo $data['waktu_masuk']; ?></td>
                            <td><?php echo $data['waktu_keluar']; ?></td>
                            <td>
                                <a href="<?php echo 'index.php?modul=ubah_absensi&&id=' . $data['id_absensi']; ?>"><button class="btn btn-warning btn-small ">Ubah</button></a>
                                <a href="<?php echo $aksi . '?modul=absensi&&act=hapus&&id=' . $data['id_absensi'].'&&nip='.$nip; ?>"  onclick="return confirm('Apakah Anda yakin akan menghapus data?')"><button class="btn btn-error btn-small ">Hapus</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>
