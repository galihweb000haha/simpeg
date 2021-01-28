
<?php
include "../../fungsi/koneksi.php";
include"../../fungsi/fungsi_tanggal.php";
$query = mysql_query("select * from karyawan
                      JOIN jabatan ON jabatan.id_jabatan = karyawan.id_jabatan
                      WHERE nip=$_GET[nip]") or die(mysql_error());
$data = mysql_fetch_array($query);
?>
<div class="data_detail">
    <div class="foto">
        <img src="<?php echo $data['foto']; ?>" title="User" alt="">
    </div> <!-- .user-card-avatar -->

    <div class="rincian">
        <table>
            <tr>
                <td>
                    Nama 
                </td>
                <td>
                    : <?php echo $data['nama_karyawan']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    NIP
                </td>
                <td>
                    : <?php echo $data['nip']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Jabatan
                </td>
                <td>
                    : <?php echo $data['nama_jabatan']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    JK
                </td>
                <td>
                    : <?php echo $data['jk']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    TTL
                </td>
                <td>
                    : <?php echo $data['tempat_lahir'] . ', ' . format_sqltoindo($data['tgl_lahir']); ?>
                </td>
            </tr>
            <tr>
                <td>
                    Agama
                </td>
                <td>
                    : <?php echo $data['agama']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Alamat
                </td>
                <td>
                    : <?php echo $data['alamat_karyawan']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    : <?php echo $data['email']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Telepon
                </td>
                <td>
                    : <?php echo $data['telp']; ?>
                </td>
            </tr>
        </table>
        </p>
    </div> <!-- .user-card-content -->

</div> <!-- .user-card -->

