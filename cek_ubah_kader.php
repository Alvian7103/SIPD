<?php

//panggil koneksi database
include "koneksi.php";

//enkripsi inputan password lama
$password_lama = ($_POST['pass_lama']);

//panggil username
$username = $_POST['username'];

//uji jika password lama sesuai
$tampil = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE 
                                username = '$username' and password = '$password_lama'");
$data = mysqli_fetch_array($tampil);
//jika data ditemukan, maka password sesuai
if ($data) {
  //uji jika password baru dan konfirmasi password sama
  $password_baru = $_POST['pass_baru'];
  $konfirmasi_password = $_POST['konfirmasi_pass'];

  if ($password_baru == $konfirmasi_password) {
    //proses ganti password
    //enkripsi password baru
    $pass_ok = ($konfirmasi_password);
    $ubah = mysqli_query($koneksi, "UPDATE pengguna set password = '$pass_ok'  
                                        WHERE id_pengguna = '$data[id_pengguna]' ");
    if ($ubah) {
      echo "<script>alert('Password anda berhasil diubah, silahkan login ulang');document.location='logout.php'</script>";
    }
  } else {
    echo "<script>alert('Password Baru & Konfirmasi password yang anda inputkan tidak sama!');document.location='ubah_pass_bidan.php'</script>";
  }
} else {
  echo "<script>alert('Maaf, Password lama anda tidak sesuai/tidak terdaftar!');document.location='ubah_pass_bidan.php'</script>";
}
