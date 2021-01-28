<?php
$aksi = "modul/mod_tunjangan_jabatan/aksi_tunjangan_jabatan.php";

$query = mysql_query("select * from tunjangan_jabatan tj 
JOIN jenis_tunjangan jt ON jt.id_jenis_tunjangan = tj.id_jenis_tunjangan
JOIN karyawan k ON k.nip = tj.nip
JOIN jabatan j ON k.id_jabatan = j.id_jabatan");
$hasil = mysql_num_rows($query);
?>
<div class="grid-24">
    <p><a href="index.php?modul=tambah_tunjangan_jabatan"><button class="btn btn-success"><span class="icon-plus"></span>Tambah Tunjangan Jabatan</button></a></p>
    <div class="widget widget-table">
        <div class="widget-header">
            <span class="icon-list"></span>
            <h3 class="icon chart">Data Tunjangan Jabatan</h3>
        </div>
        <div class="widget-content">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 7%;">
                            No.
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 25%;">
                            Nama Karyawan
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 15%;">
                            Jabatan
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 15%;">
                            Jenis Tunjangan
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 15%;">
                            Besar Tunjangan
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 20%;">
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
                            <td><?php echo $data['nama_karyawan']; ?></td>
                            <td><?php echo $data['nama_jabatan']; ?></td>
                            <td><?php echo $data['nama_jenis_tunjangan']; ?></td>
                            <td><?php echo indo_number($data['besar_tunjangan']); ?></td>
                            <td>
                                <a href="index.php?modul=ubah_tunjangan_jabatan&&id=<?php echo $data['id_tunjangan_jabatan']; ?>"><button class="btn btn-warning btn-small">Ubah</button></a>
                                <a href="<?php echo $aksi . '?modul=tunjangan_jabatan&&act=hapus&&id=' . $data['id_tunjangan_jabatan']; ?>"  onclick="return confirm('Apakah Anda yakin akan menhapus data?')"><button class="btn btn-error btn-small ">Hapus</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->

</div>