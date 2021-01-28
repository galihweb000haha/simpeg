<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar, silahkan login kembali untuk dapat mengakses menu utama'); window.location = 'index.php'</script>";
?>