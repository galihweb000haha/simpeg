<?php
$aksi = "../modul/mod_mengajar/aksi_mengajar.php";

$query = mysql_query("SELECT * FROM ajar_detail ad
                               JOIN mengajar m ON m.id_mengajar = ad.id_mengajar
                               JOIN mata_pelajaran mp ON mp.id_mp = m.id_mp
                               JOIN guru g ON g.nip = m.nip
                               JOIN kelas k ON k.id_kelas = ad.id_kelas
                               WHERE ad.id_semester = $id_semester");
$hasil = mysql_num_rows($query);
?>
<div class="grid-24">
    <?php
    if ($selisihnya == '-' || $selisihnya == '0') {
        echo '';
    } else {
    ?>
        <p><a href="index.php?modul=tambah_mengajar"><button class="btn btn-success"><span class="icon-plus"></span>Tambah Mengajar</button></a></p>
    <?php } ?>
    <div class="widget widget-table">

        <div class="widget-header">
            <span class="icon-list"></span>
            <h3 class="icon chart">Data Mengajar</h3>
        </div>

        <div class="widget-content">
            <table class="table table-bordered table-striped data-table">
                <thead>
                    <tr>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 10%;">
                            No.
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 30%;">
                            Nama Guru
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 20%;">
                            Mata Pelajaran
                        </th>
                        <th class="ui-state-default" rowspan="1" colspan="1" style="width: 20%;">
                            Kelas
                        </th>
                            <?php
    if ($selisihnya == '-' || $selisihnya == '0') {
        echo '';
    } else {
    ?>
                            <th class="ui-state-default" rowspan="1" colspan="1" style="width: 15%;">
                                Aksi
                            </th>
                            <?php }?>
                </thead>

                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysql_fetch_array($query)) {
                    ?>
                        <tr class="gradeA odd">
                            <td class=" sorting_1"><?php echo $i++; ?></td>
                            <td><?php echo $data['nama_guru']; ?></td>
                            <td><?php echo $data['nama_mp']; ?></td>
                            <td><?php echo $data['nama_kelas']; ?></td>
                            <?php
                            if ($selisihnya == '-' || $selisihnya == '0') {
                                echo '';
                            } else {
                            ?>
                            <td>
                                <a href="index.php?modul=ubah_mengajar&&id=<?php echo $data['id_mengajar']; ?>&&id_ajar=<?php echo $data['id_ajar_detail']; ?>"><button class="btn btn-warning btn-small">Ubah</button></a>
                                <a href="<?php echo $aksi . '?modul=mengajar&&act=hapus&&id=' . $data['id_mengajar']; ?>"  onclick="return confirm('Apakah Anda yakin akan menhapus data?')"><button class="btn btn-error btn-small ">Hapus</button></a>
                            </td>
                                <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div> <!-- .widget-content -->
</div>