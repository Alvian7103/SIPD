<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$NIK_ibu = $_POST['NIK_ibu'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM ibu WHERE NIK_ibu='$NIK_ibu' AND password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($login);


    if ($data['NIK_ibu']) {
        // buat session login dan username
        $_SESSION['NIK_ibu'] = $NIK_ibu;
        $_SESSION['nama_ibu'] = $data['nama_ibu'];
        // alihkan ke halaman dashboard bidan
        header("location:halaman_ibu.php");
    } else {
        // alihkan ke halaman login kembali
        header("location:login_ibu.php?pesan=gagal");
    }
} else {
    header("location:login_ibu.php?pesan=gagal");
}
