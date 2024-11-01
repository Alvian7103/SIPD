<?php

session_start();
unset($_SESSION['NIK_balita']);
unset($_SESSION['password']);
unset($_SESSION['nama_ibu']);

session_destroy();
echo "<script>alert('Anda Keluar Dari Sistem');document.location='index.php'</script>";
