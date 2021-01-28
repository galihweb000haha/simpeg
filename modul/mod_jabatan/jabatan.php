<?php
$aksi = "modul/mod_jabatan/aksi_jabatan.php";

$query = mysql_query("select * from jabatan");
$hasil = mysql_num_rows($query);
?>
<div class="grid-24">
    <p><a href="index.php?modul=tambah_jabatan"><button class="btn btn-success"><span class="icon-plus"></span>Tambah Jabatan</button></a></p>

    <div class="widget widget-table">

        <div class="widget-header">
            <span class="icon-list"></span>
            <h3 class="icon chart">Data Jabatan</h3>
        </div>

        <div class="widget-content">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
                            No.
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
                            ID Jabatan
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 35%;">
                            Nama Jabatan
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 30%;">
                            Gaji Pokok
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
                            <td><?php echo $data['id_jabatan']; ?></td>
                            <td><?php echo $data['nama_jabatan']; ?></td>
                            <td><?php echo indo_number($data['gapok']); ?></td>
                            <td>
                                <a href="index.php?modul=ubah_jabatan&&id=<?php echo $data['id_jabatan']; ?>"><button class="btn btn-warning btn-small">Ubah</button></a>
                                <a href="<?php echo $aksi . '?modul=jabatan&&act=hapus&&id=' . $data['id_jabatan']; ?>"  onclick="return confirm('Apakah Anda yakin akan menhapus data?')"><button class="btn btn-error btn-small ">Hapus</button></a>
                            </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>