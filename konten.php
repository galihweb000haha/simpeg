<?php

if ($_SESSION == NULL) {
    echo "<script>alert('Anda belum login, silahkan login untuk mengakses halaman administrator !.'); window.location = 'login.php'</script>";
} elseif ($_SESSION['hak_akses'] == 'admin') {
    //NOTIFIKASI PESAN ERROR BERDASARKAN GET URL pesan
    include"fungsi/fungsi_pesan.php";
    //AKHIR NOTIFIKASI

    if ($_GET['modul'] == 'home') {
        include "modul/mod_home/home_admin.php";
    } elseif ($_GET['modul'] == 'profil') {
        include "modul/mod_profil/profil_admin.php";
    }

    //MODUL KARYAWAN
    elseif ($_GET['modul'] == 'karyawan') {
        include "modul/mod_karyawan/karyawan.php";
    } elseif ($_GET['modul'] == 'tambah_karyawan') {
        include "modul/mod_karyawan/tambah_karyawan.php";
    } elseif ($_GET['modul'] == 'ubah_karyawan') {
        include "modul/mod_karyawan/ubah_karyawan.php";
    } elseif ($_GET['modul'] == 'hapus_karyawan') {
        include "modul/mod_karyawan/hapus_karyawan.php";
    }

    //MODUL JABTAN
    elseif ($_GET['modul'] == 'jabatan') {
        include "modul/mod_jabatan/jabatan.php";
    } elseif ($_GET['modul'] == 'tambah_jabatan') {
        include "modul/mod_jabatan/tambah_jabatan.php";
    } elseif ($_GET['modul'] == 'ubah_jabatan') {
        include "modul/mod_jabatan/ubah_jabatan.php";
    } elseif ($_GET['modul'] == 'hapus_jabatan') {
        include "modul/mod_jabatan/hapus_jabatan.php";
    }

    //MODUL JENIS TUNJANGAN JABTAN
    elseif ($_GET['modul'] == 'jenis_tunjangan') {
        include "modul/mod_jenis_tunjangan/jenis_tunjangan.php";
    } elseif ($_GET['modul'] == 'tambah_jenis_tunjangan') {
        include "modul/mod_jenis_tunjangan/tambah_jenis_tunjangan.php";
    } elseif ($_GET['modul'] == 'ubah_jenis_tunjangan') {
        include "modul/mod_jenis_tunjangan/ubah_jenis_tunjangan.php";
    } elseif ($_GET['modul'] == 'hapus_jenis_tunjangan') {
        include "modul/mod_jenis_tunjangan/hapus_jenis_tunjangan.php";
    }

    //MODUL TUNJANGAN JABTAN
    elseif ($_GET['modul'] == 'tunjangan_jabatan') {
        include "modul/mod_tunjangan_jabatan/tunjangan_jabatan.php";
    } elseif ($_GET['modul'] == 'tambah_tunjangan_jabatan') {
        include "modul/mod_tunjangan_jabatan/tambah_tunjangan_jabatan.php";
    } elseif ($_GET['modul'] == 'ubah_tunjangan_jabatan') {
        include "modul/mod_tunjangan_jabatan/ubah_tunjangan_jabatan.php";
    } elseif ($_GET['modul'] == 'hapus_tunjangan_jabatan') {
        include "modul/mod_tunjangan_jabatan/hapus_tunjangan_jabatan.php";
    }

    //MODUL ABSENSI
    elseif ($_GET['modul'] == 'absensi') {
        include "modul/mod_absensi/absensi.php";
    } elseif ($_GET['modul'] == 'detail_absensi') {
        include "modul/mod_absensi/detail_absensi.php";
    } elseif ($_GET['modul'] == 'form_rekap_absensi') {
        include "modul/mod_absensi/form_rekap_absensi.php";
    } elseif ($_GET['modul'] == 'tambah_absensi') {
        include "modul/mod_absensi/tambah_absensi.php";
    } elseif ($_GET['modul'] == 'ubah_absensi') {
        include "modul/mod_absensi/ubah_absensi.php";
    } elseif ($_GET['modul'] == 'hapus_absensi') {
        include "modul/mod_absensi/hapus_absensi.php";
    } elseif ($_GET['modul'] == 'laporan_absensi') {
        include "modul/mod_absensi/form_laporan_absensi.php";
    }

    //MODUL GAJI
    elseif ($_GET['modul'] == 'struk_gaji') {
        include "modul/mod_gaji/struk_gaji.php";
    } elseif ($_GET['modul'] == 'laporan_gaji') {
        include "modul/mod_gaji/form_laporan_gaji.php";
    } elseif ($_GET['modul'] == 'cetak_struk_gaji') {
        include "modul/mod_gaji/cetak_struk_gaji.php";
    }


    //MODUL PASSWORD
    elseif ($_GET['modul'] == 'profil') {
        include "modul/mod_profil/profil_admin.php";
    }

    //MODUL UBAH FOTO
    elseif ($_GET['modul'] == 'foto') {
        include "modul/mod_profil/foto_admin.php";
    }
} elseif ($_SESSION['hak_akses'] != 'admin') {
    echo"";
}
?>
