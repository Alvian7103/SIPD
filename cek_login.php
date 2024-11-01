<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='$username' AND password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai Bidan
	if ($data['level'] == "Bidan") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Bidan";
		$_SESSION['id_pengguna'] = $data['id_pengguna'];
		$_SESSION['nama_pengguna'] = $data['nama_pengguna']; // set nama_pengguna session
		// alihkan ke halaman dashboard bidan
		header("location:halaman_bidan.php");
		// cek jika user login sebagai Kader
	} else if ($data['level'] == "Kader") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "Kader";
		$_SESSION['id_pengguna'] = $data['id_pengguna'];
		$_SESSION['nama_pengguna'] = $data['nama_pengguna']; // set nama_pengguna session
		// alihkan ke halaman dashboard kader
		header("location:halaman_kader.php");
	} else {
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}
} else {
	header("location:login.php?pesan=gagal");
}
