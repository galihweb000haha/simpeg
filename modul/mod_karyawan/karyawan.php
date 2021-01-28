<?php
$aksi = "modul/mod_karyawan/aksi_karyawan.php";

$query = mysql_query("select * from karyawan k JOIN jabatan j ON j.id_jabatan = k.id_jabatan");
$hasil = mysql_num_rows($query);
?>
<div class="grid-24">
    <p><a href="index.php?modul=tambah_karyawan"><button class="btn btn-success"><span class="icon-plus"></span>Tambah Karyawan</button></a></p>

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
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 20%;">
                            Nama Karyawan
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
                            JK
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
                            <td><?php echo $data['jk']; ?></td>
                            <td><?php echo $data['nama_jabatan']; ?></td>
                            <td>
                                <button id="mdl_karyawan" class="btn btn-black btn-small" value="<?php echo $data['nip'];?>">Detail</button>
                                <a href="index.php?modul=ubah_karyawan&&id=<?php echo $data['nip']; ?>"><button class="btn btn-warning btn-small">Ubah</button></a>
                                <a href="<?php echo $aksi . '?modul=karyawan&&act=hapus&&id=' . $data['nip']; ?>"  onclick="return confirm('Apakah Anda yakin akan menhapus data?')"><button class="btn btn-error btn-small ">Hapus</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>
