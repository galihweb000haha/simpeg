<?php
$aksi = "modul/mod_karyawan/aksi_karyawan.php";

$query = mysql_query("select * from karyawan");
$hasil = mysql_num_rows($query);
?>
<div class="grid-24">
    <p><a href="index.php?modul=tambah_absensi"><button class="btn btn-success"><span class="icon-plus"></span>Tambah Absensi</button></a></p>

    <div class="widget widget-table">
        <div class="widget-header">
            <span class="icon-list"></span>
            <h3 class="icon chart">Data Karyawan</h3>
        </div>
        <div class="widget-content">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 7%;">
                            No.
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
                            NIP
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 23%;">
                            Nama Karyawan
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
                            <td><?php echo $data['nip']; ?></td>
                            <td><?php echo $data['nama_karyawan']; ?></td>
                            <td>
                                <a href="index.php?modul=detail_absensi&&id=<?php echo $data['nip']; ?>"><button class="btn btn-green btn-small">Lihat Absensi</button></a>
                                <a href="index.php?modul=form_rekap_absensi&&id=<?php echo $data['nip']; ?>"><button class="btn btn-orange btn-small">Rekap Absensi</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>
