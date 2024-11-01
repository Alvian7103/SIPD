<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
  echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='login.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Data pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <style>
    .scroll {
      height: 250px;
      overflow: scroll;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
      <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3">SIPDB</a>
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-gear"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="ubah_pass_bidan.php">Ubah Password</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <a class="nav-link" href="halaman_bidan.php">
              <div class="sb-nav-link-icon">
                <i class="fa-solid fa-house"></i>
              </div>
              Dashboard
            </a>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseMasterData" aria-expanded="false" aria-controls="collapseMasterData">
              <div class="sb-nav-link-icon">
                <i class="fas fa-book-open"></i>
              </div>
              Master Data
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div class="collapse" id="pagesCollapseMasterData" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href=balita_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-children"></i></div>Data Balita
                </a>
                </a>
                <a class="nav-link" href=ibu_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-person-breastfeeding"></i></div>Data Ibu
                </a>
                <a class="nav-link" href=kader_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>Data Kader
                </a>
                <a class="nav-link" href=jenis_imunisasi_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-vial"></i></div>Data Jenis Imunisasi
                </a>
                <a class="nav-link" href=user_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>Data Pengguna
                </a>
              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapsePelayanan" aria-expanded="false" aria-controls="collapsePelayanan">
              <div class="sb-nav-link-icon">
                <i class="fa-solid fa-scale-balanced"></i>
              </div>
              Pelayanan
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div class="collapse" id="pagesCollapsePelayanan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
              <nav class="sb-sidenav-menu-nested nav">

                <a class="nav-link" href=penimbangan_pengukuran_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-weight-scale"></i></div>Data Penimbangan & Pengukuran
                </a>
                <a class="nav-link" href=pemeriksaan_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-stethoscope"></i></div>Data Pemeriksaaan
                </a>
                <a class="nav-link" href=imunisasi_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-syringe"></i></div>Data Imunisasi
                </a>
              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseLaporan" aria-expanded="false" aria-controls="collapseLaporan">
              <div class="sb-nav-link-icon">
                <i class="fa-solid fa-file"></i>
              </div>
              Laporan
              <div class="sb-sidenav-collapse-arrow">
                <i class="fas fa-angle-down"></i>
              </div>
            </a>
            <div class="collapse" id="pagesCollapseLaporan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href=laporan_balita_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-children"></i></div>Data Balita
                </a>
                <a class="nav-link" href=laporan_ibu_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-person-breastfeeding"></i></div>Data Ibu
                </a>
                <a class="nav-link" href=laporan_kader_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>Data Kader
                </a>
                <a class="nav-link" href=laporan_jenis_imunisasi_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-vial"></i></div>Data Jenis Imunisasi
                </a>
                <a class="nav-link" href=laporan_registrasi_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>Data Kehadiran
                </a>
                <a class="nav-link" href=laporan_penimbangan_pengukuran_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-weight-scale"></i></div>Data Penimbangan & Pengukuran
                </a>
                <a class="nav-link" href=laporan_pemeriksaan_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-stethoscope"></i></div>Data Pemeriksaaan
                </a>
                <a class="nav-link" href=laporan_imunisasi_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-syringe"></i></div>Data Imunisasi
                </a>
                <a class="nav-link" href=laporan_pengguna_bidan.php>
                  <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i>
                  </div>Data Pengguna
                </a>
              </nav>
            </div>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Masuk Sebagai: <b><?= $_SESSION['level'] ?></b></div>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-6">
          <h1 class="mt-4">Master Data Pengguna</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Pengguna Sistem Informasi Pencatatan Posyandu Anggrek 1 Desa Tambak</li>
          </ol>
          <div class="card mt-3">
            <div class="card-header bg-primary text-light">
              <i class="fas fa-table me-1"></i>
              Data Pengguna
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="modal-title">Tambah Data Pengguna</h4>
                      <form method="post">
                        <div class="modal-body">
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label for="nama_pengguna">Nama Pengguna</label>
                              <input type="text" name="nama_pengguna" placeholder="Nama Pengguna" class="form-control" required>
                            </div>
                            <div class="form-group col-md-4">
                              <label for="username">Username</label>
                              <input type="text" name="username" placeholder="Username" class="form-control" required>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label for="password">Password</label>
                              <input type="text" name="password" placeholder="Password" class="form-control" required>
                            </div>
                            <div class="form-group col-md-2">
                              <label for="level">Level Pengguna</label>
                              <select name="level" class="form-control" required>
                                <option hidden="">Pilih Level Pengguna</option>
                                <option value="Bidan">Bidan</option>
                                <option value="Kader">Kader</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-5">
                            <button type="submit" class="btn btn-primary w-100" name="simpan">Simpan</button>
                          </div>
                          <div class="col-md-auto"></div>
                          <div class="col-md-5">
                            <a href="user_bidan.php" type="button" class="btn btn-danger w-100">Batal</a>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="col-md-12 mx-auto">
                <form method="POST">
                  <div class="input-group mb-3">
                    <input type="text" name="cari" value="<?php if (isset($_POST['cari'])) {
                                                            echo $_POST['cari'];
                                                          } ?>" class="form-control" placeholder="Masukan ID Pengguna atau Nama Pengguna">
                    <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </div>
                </form>

                <div class="scroll table-responsive">
                  <table class="table table-bordered table-striped text-center ">
                    <!-- /.card-header -->
                    <div class="card-body">

                      <tr>
                        <th>ID Pengguna</th>
                        <th>Nama Pengguna</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Edit</th>
                        <th>Hapus</th>
                      </tr>
                      <?php
                      include 'koneksi.php';
                      $no = 1;

                      if (isset($_POST['cari'])) {

                        $key = $_POST['cari'];
                        $query = "SELECT * FROM pengguna WHERE id_pengguna like '%$key%' or nama_pengguna like '%$key%' or username like '%$key%' or password like '%$key%' or level like '%$key%' order by 
                        nama_pengguna asc  ";
                      } else {
                        $query = "SELECT * FROM pengguna order by nama_pengguna asc";
                      }

                      $tampil = mysqli_query($koneksi, $query);
                      while ($data = mysqli_fetch_array($tampil)) :
                      ?>
                        <tr>
                          <td hidden><?= $no++ ?></td>
                          <td><?= $data['id_pengguna'] ?></td>
                          <td><?= $data['nama_pengguna'] ?></td>
                          <td><?= $data['username'] ?></td>
                          <td><?= $data['password'] ?></td>
                          <td><?= $data['level'] ?></td>
                          <td>
                            <a href="ubah_pengguna_bidan.php?id_pengguna=<?= $data['id_pengguna'] ?>" type="button" class="btn btn-warning" data-toggle="modal"><i class="fas fa-pencil-alt"></i> Ubah</a>
                          <td>
                            <button class="btn btn-danger" type="submit" name="hapus" data-bs-toggle="modal" data-bs-target="#myModalHapus<?= $no ?>"><i class=" fas fa-trash"></i> Hapus</button>
                          </td>
                          <!-- The Modal Hapus -->
                          <div class="modal fade" id="myModalHapus<?= $no ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h4>
                                </div>
                                <form method="post">
                                  <div class="modal-body">
                                    <input type="hidden" name="id_pengguna" value="<?= $data['id_pengguna'] ?>">
                                    <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ? <br>
                                      <span class="text-danger"><?= $data['username'] ?> - <?= $data['password'] ?></span>
                                    </h5>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary" name="hapus">Hapus</button>
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </tr>

                      <?php endwhile; ?>
                    </div>
                  </table>
                </div>
              </div>
            </div>
            <div class="card-header bg-primary text-light"></div>
          </div>
        </div>
      </main>
      <footer class="py-4 bg-light mt-auto"></footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>

</html>


<!--SIMPAN-->
<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
  $id_pengguna = $_POST['id_pengguna'];
  $nama_pengguna = $_POST['nama_pengguna'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $level = $_POST['level'];

  $cek_data = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE username='$username'");
  $cek = mysqli_num_rows($cek_data);

  if ($cek > 0) {
    echo "<script>alert('Username Sudah Ada, Silahkan Gunakan Username Lainnya')</script>";
    echo "<script>window.location.href='user_bidan.php'</script>";
  } else {
    $query = "INSERT INTO pengguna (id_pengguna, nama_pengguna, username, password, level) VALUES('$id_pengguna','$nama_pengguna','$username','$password','$level')";
    $sql = mysqli_query($koneksi, $query);
    if ($sql) {
      echo "<script>alert('Data Berhasil Disimpan')</script>";
      echo "<script>window.location.href='user_bidan.php'</script>";
    } else {
      echo "<script>alert('Data Gagal Disimpan')</script>";
      echo "<script>window.location.href='user_bidan.php'</script>";
    }
  }
}
?>


<!-- Edit-->
<?php
include 'koneksi.php';
if (isset($_POST['ubah'])) {

  $ubah = mysqli_query($koneksi, "UPDATE pengguna SET nama_pengguna = '$_POST[nama_pengguna]',username = '$_POST[username]', password = '$_POST[password]', level = '$_POST[level]' WHERE id_pengguna = '$_POST[id_pengguna]'");
  if ($ubah) {
    echo "<script>alert('Data Berhasil Diubah')</script>";
    echo "<script>window.location.href='user_bidan.php'</script>";
  } else {
    echo "<script>alert('Data Gagal Diubah')</script>";
    echo "<script>window.location.href='user_bidan.php'</script>";
  }
}
?>


<!-- Hapus -->
<?php
include 'koneksi.php';
if (isset($_POST['hapus'])) {

  $hapus = mysqli_query($koneksi, "DELETE FROM pengguna WHERE id_pengguna = '$_POST[id_pengguna]'");
  if ($hapus) {
    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location.href='user_bidan.php'</script>";
  } else {
    echo "<script>alert('Data Gagal Dihapus')</script>";
    echo "<script>window.location.href='user_bidan.php'</script>";
  }
}
?>