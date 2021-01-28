<?php
include "fungsi/koneksi.php";
if (isset($_POST["kirim"])) {
    $email = $_POST['email'];
    $level = $_POST['level'];

    $error = array();
    if (empty($level)) {
        $error['level'] = 'Silahkan pilih jenis akun Anda';
    }

    if (empty($email)) {
        $error['email'] = 'Silahkan masukan dulu email Anda';
    } else {
        if ($level == "guru") {
            $query = "SELECT * FROM guru WHERE email_guru='$email'";
            $result = mysql_query($query);
            $count = mysql_num_rows($result);
            $data = mysql_fetch_array($result);

            if ($count == 0) {
                $error['email'] = 'Email yang Anda masukan tidak terdaftar';
            } else {

                function createRandomPassword() {
                    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
                    srand((double) microtime () * 1000000);
                    $i = 0;
                    $pass = '';
                    while ($i <= 7) {
                        $num = rand () % 33;
                        $tmp = substr($chars, $num, 1);
                        $pass = $pass . $tmp;
                        $i++;
                    }
                    return $pass;
                }

                // Usage
                $password_random = createRandomPassword ();

                $nip = $data['nip'];
                $password = $password_random;
                $nama = $data['nama'];
                ;
                $email = $data['email'];


                $judul = "Reset Password E-Learning SMAN 7 Tasikmalaya";

                $h = "Password Anda telah berhasil direset. \n";
                $isi .="Berikut ini adalah informasi data akun Anda : \n";
                $isi .="NIP : $nip \n";
                $isi .="Password : $password \n";
                $isi .="Nama : $nama \n";
                $isi .="Email : $email \n";
                $isi .="Jenis Akun : $level \n\n";
                $isi .="Ttd \n\n";
                $isi .="Administrator E-Learning SMA Negeri 7 Tasikmalaya \n";
                $mail = mail($email, $judul, $isi, $h);

                if ($mail) {
                    $query = "UPDATE guru SET password=md5('$password') WHERE username='$nip'";
                    $result = mysql_query($query);

                    echo
                    "
							<script language='javascript'>
								alert('Password Anda berhasil di reset, Silahkan cek Email Anda');
								window.location='http://elearning.sman7tasik.sch.id/';
							</script>
						";
                }
            }
        } else if ($level == "siswa") {
            $query = "SELECT * FROM siswa WHERE email_siswa='$email'";
            $result = mysql_query($query)or die(mysql_error());
            $count = mysql_num_rows($result);
            $data = mysql_fetch_array($result);

            if ($count == 0) {
                $error['email'] = 'Email yang Anda masukan tidak terdaftar';
            } else {

                function createRandomPassword() {
                    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
                    srand((double) microtime () * 1000000);
                    $i = 0;
                    $pass = '';
                    while ($i <= 7) {
                        $num = rand () % 33;
                        $tmp = substr($chars, $num, 1);
                        $pass = $pass . $tmp;
                        $i++;
                    }
                    return $pass;
                }

                // Usage
                $password_random = createRandomPassword ();

                $nis = $data['nis'];
                $password = $password_random;
                $nama = $data['nama_siswa'];
                $email = $data['email_siswa'];

                $judul = "Reset Password E-Learning SMAN 7 Tasikmalaya";

                $h = "Password Anda telah berhasil direset. \n";
                $isi .="Berikut ini adalah informasi data akun Anda : \n";
                $isi .="NIS : $nis \n";
                $isi .="Password : $password \n";
                $isi .="Nama : $nama \n";
                $isi .="Email : $email \n";
                $isi .="Jenis Akun : $level \n\n";
                $isi .="Ttd \n\n";
                $isi .="Administrator E-Learning SMA Negeri 7 Tasikmalaya \n";
                $mail = mail($email, $judul, $isi, $h);

                if ($mail) {
                    $query = "UPDATE siswa SET password=md5('$password') WHERE username='$nis'";
                    $result = mysql_query($query);

                    echo
                    "
							<script language='javascript'>
								alert('Password Anda berhasil di reset, Silahkan cek Email Anda');
								window.location='http://elearning.sman7tasik.sch.id/';
							</script>
						";
                }
            }
        }
    }
}
?>
<head>

    <title>Lupa Password</title>

    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />

    <link rel="stylesheet" href="stylesheets/reset.css" type="text/css" media="screen" title="no title" />
    <link rel="stylesheet" href="stylesheets/buttons.css" type="text/css" media="screen" title="no title" />
    <link rel="stylesheet" href="stylesheets/login.css" type="text/css" media="screen" title="no title" />
</head>

<body>

    <div id="login">
        <div style="color:white;" align="center"><h2>E-LEARNING SMA N 7 TASIKMALAYA <br/>LUPA PASSWORD</h2></div>
        <div id="login_panel">
            <form action="" method="post" accept-charset="utf-8">
                <div class="login_fields">
                    <div class="field">
                        <label for="email">Masukkan Email Anda</label>
                        <input type="text" name="email" value="" id="email" tabindex="1" placeholder="email@contoh.com" />
                        <span style="font-size: 10px;font-style:italic">* Email yang dipergunakan yaitu email anda yang terdaftar di E-Learning</span>
                        <div style='color:red;font-size:11px;' id='result-availability'>
<?php echo isset($error['email']) ? $error['email'] : ''; ?>
                        </div>
                    </div>
                </div> <!-- .login_fields -->

                <div style="margin-left:15px;">
                    <label style="font-weight:bold;">Jenis Akun :</label><br>
                    <input type='radio' name='level' value='siswa'/><span style="font-size: 14px;">Siswa</span>
                    <input type='radio' name='level' value='guru'/><span style="font-size: 14px;">Guru</span>
                    <div style='color:red;font-size:11px;' id='result-availability'>
<?php echo isset($error['level']) ? $error['level'] : ''; ?>
                    </div>
                </div>

                <div class="login_actions">
                    <input type='submit' class="btn btn-green" name='kirim' value='Kirim'/>
                </div>
            </form>
        </div> <!-- #login_panel -->
    </div> <!-- #login -->

    <script src="javascripts/all.js"></script>


</body>
</html>