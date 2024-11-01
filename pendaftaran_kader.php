<?php
// mengaktifkan session pada php
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['username'])) {
  header("location:login.php?pesan=belum_login");
}

// menyimpan session ke dalam variabel
$id_pengguna = $_SESSION['id_pengguna'];
$nama_pengguna = $_SESSION['nama_pengguna'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Data Pendaftaran</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
          <li><a class="dropdown-item" href="ubah_pass_kader.php">Ubah Password</a></li>
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
            <a class="nav-link" href="halaman_kader.php">
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
                <a class="nav-link" href=balita_kader.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-children"></i></div>Data Balita
                </a>
                <a class="nav-link" href=ibu_kader.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-person-breastfeeding"></i></div>Data Ibu
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
                <a class="nav-link" href=pendaftaran_kader.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>Data Registrasi
                </a>
                <a class="nav-link" href=penimbangan_pengukuran_kader.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-weight-scale"></i> </div>Data Penimbangan & Pengukuran
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
                <a class="nav-link" href=laporan_balita_kader.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-children"></i></i></div>Data Balita
                </a>
                <a class="nav-link" href=laporan_ibu_kader.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-person-breastfeeding"></i></div>Data Ibu
                </a>
                <a class="nav-link" href=laporan_registrasi_kader.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>Data Registrasi
                </a>
                <a class="nav-link" href=laporan_penimbangan_pengukuran_kader.php>
                  <div class="sb-nav-link-icon"><i class="fa-solid fa-weight-scale"></i></div>Data Penimbangan & Pengukuran
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
        <div class="container-fluid px-12">
          <h1 class="mt-4">Data Registrasi</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Registrasi Posyandu Anggrek 1 Desa Tambak</li>
          </ol>
          <div class="card mt-3">
            <div class="card-header bg-primary text-light">
              <i class="fas fa-table me-1"></i>
              Data Registrasi
            </div>
            <div class="card-header">
              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal">
                + Tambah Data Registrasi
              </button>
            </div>
            <!-- The Modal Tambah-->
            <div class="modal fade" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Registrasi</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <form method="post">
                    <div class="modal-body">
                      <div hidden="form-group">
                        <label for="id_pengguna">Kader</label>
                        <input type="text" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>" placeholder="ID Pengguna" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="tgl_reg">Tanggal Registrasi </label>
                        <input type="Date" min="<?php echo date('Y-m-d'); ?>" name="tgl_reg" placeholder="Tanggal Registrasi" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="NIK_balita">Balita</label>
                        <select name="NIK_balita" class="form-control" required>
                          <option hidden>Pilih Balita</option>
                          <?php
                          include "koneksi.php";
                          $query = mysqli_query($koneksi, "SELECT * FROM balita ORDER BY tgl_lahir_balita DESC") or die(mysqli_error($koneksi));
                          while ($data = mysqli_fetch_array($query)) {
                            echo "<option value=$data[NIK_balita]> $data[NIK_balita]-$data[nama_balita] </option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="col-md-12 mx-auto">
                <form method="POST">
                  <div class="input-group mb-3">
                    <input type="text" name="cari" value="<?php if (isset($_POST['cari'])) {
                                                            echo $_POST['cari'];
                                                          } ?>" class="form-control" placeholder="Masukan No Registrasi atau Nama Balita">
                    <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                  </div>
                </form>
                <center>
                  <form method="POST">
                    <table>
                      <tr>
                        <td>Tampilkan Data Dari Tanggal </td>
                        <td> <input type="date" max="<?php echo date('Y-m-d'); ?>" name="tgl_awal" class="form-control" value="" required></td>
                        <tr />
                        <td> Sampai Tanggal </td>
                        <td> <input type="date" max="<?php echo date('Y-m-d'); ?>" name="tgl_akhir" class="form-control" value="" required> </td>
                        <td> <input type="submit" class="btn btn-primary" name="filter" value="Filter"></td>
                      </tr>
                    </table>
                  </form>
                  <br>
                  <?php
                  include 'koneksi.php';
                  if (isset($_POST['tgl_awal'])) {
                    $tgl_awal = $_POST['tgl_awal'];
                    $tgl_akhir = $_POST['tgl_akhir'];
                    echo " Menampilkan Data Dari Tanggal " . $tgl_awal . " Sampai Tanggal " . $tgl_akhir;
                  }
                  ?>
                </center>

                <div class="table-responsive">
                  <table class="table table-bordered table-striped text-center ">
                    <!-- /.card-header -->
                    <div class="card-body">

                      <tr>
                        <th>No</th>
                        <th>Tanggal Registrasi</th>
                        <th>Balita</th>
                        <th>Usia</th>
                        <th>Ibu</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Kader/Bidan</th>
                        <th>Edit</th>
                      </tr>
                      <?php
                      include 'koneksi.php';
                      $no = 1;

                      if (isset($_POST['cari'])) {

                        $key = $_POST['cari'];
                        $query = "SELECT * FROM registrasi LEFT JOIN balita ON registrasi.NIK_balita = balita.NIK_balita JOIN ibu ON balita.NIK_ibu = ibu.NIK_Ibu JOIN pengguna ON registrasi.id_pengguna = pengguna.id_pengguna WHERE no_reg like '%$key%' or nama_balita like '%$key%' order by 
                      no_reg desc  ";
                      } elseif (isset($_POST['tgl_awal'])) {
                        $tgl_awal = $_POST['tgl_awal'];
                        $tgl_akhir = $_POST['tgl_akhir'];
                        $query = "SELECT * FROM registrasi LEFT JOIN balita ON registrasi.NIK_balita = balita.NIK_balita JOIN ibu ON balita.NIK_ibu = ibu.NIK_Ibu JOIN pengguna ON registrasi.id_pengguna = pengguna.id_pengguna WHERE tgl_reg BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' order by no_reg ASC";
                      } else {
                        $query = "SELECT * FROM registrasi LEFT JOIN balita ON registrasi.NIK_balita = balita.NIK_balita JOIN ibu ON balita.NIK_ibu = ibu.NIK_Ibu JOIN pengguna ON registrasi.id_pengguna = pengguna.id_pengguna order by no_reg desc";
                      }

                      $tampil = mysqli_query($koneksi, $query);
                      while ($data = mysqli_fetch_array($tampil)) :
                      ?>
                        <tr>
                          <td><?= $no++ ?></td>

                          <td><?php if ($data['tgl_reg'] == "0000-00-00") {
                                echo "-";
                              } else {
                                echo tgl_indo($data['tgl_reg']);
                              } ?></td>
                          <td><?= $data['nama_balita'] ?></td>
                          <td><?php if ($data['tgl_lahir_balita'] == "0000-00-00") {
                                echo "-";
                              } else {
                                echo usia($data['tgl_lahir_balita']);
                              } ?></td>
                          <td><?= $data['nama_ibu'] ?></td>
                          <td>0<?= $data['no_telp_ibu'] ?></td>
                          <td><?= $data['alamat_ibu'] ?></td>
                          <td><?= $data['nama_pengguna'] ?></td>
                          <td>
                            <button class="btn btn-warning" type="submit" name="ubah" data-bs-toggle="modal" data-bs-target="#myModalUbah<?= $no ?>"><i class=" fas fa-pencil-alt"></i> Ubah</button>
                          </td>
                        </tr>
                        <!-- The Modal Ubah -->
                        <div class="modal fade" id="myModalUbah<?= $no ?>">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="staticBackdropLabel">Ubah Data Registrasi</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>
                              <form method="post">
                                <div class="modal-body">
                                  <div class="form-group">
                                    <label for="no_reg">No Registrasi</label>
                                    <input type="number" name="no_reg" value="<?= $data['no_reg'] ?>" placeholder="No Registrasi" class="form-control" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="tgl_reg">Tanggal Registrasi </label>
                                    <input type="Date" min="<?php echo date('Y-m-d'); ?>" name="tgl_reg" value="<?= $data['tgl_reg'] ?>" placeholder="Tanggal Registrasi" class="form-control" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="NIK_balita">Balita</label>
                                    <select name="NIK_balita" class="form-control" required>
                                      <option hidden="<?= $data['NIK_balita'] ?>"><?= $data['nama_balita'] ?> </option>
                                      <?php
                                      $query = mysqli_query($koneksi, "SELECT * FROM balita order by tgl_lahir_balita DESC") or die(mysqli_error($koneksi));
                                      while ($data = mysqli_fetch_array($query)) {
                                        echo "<option value=$data[NIK_balita]> $data[NIK_balita]-$data[nama_balita] </option>";
                                      }
                                      ?>
                                    </select>
                                  </div>
                                  <div hidden="form-group">
                                    <label for="id_pengguna">Kader</label>
                                    <input type="text" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>" placeholder="ID Pengguna" class="form-control" readonly>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" name="ubah">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
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
  $no_reg = $_POST['no_reg'];
  $tgl_reg = $_POST['tgl_reg'];
  $NIK_balita = $_POST['NIK_balita'];
  $id_pengguna = $_POST['id_pengguna'];

  $cek_data = mysqli_query($koneksi, "SELECT * FROM registrasi WHERE NIK_balita='$NIK_balita' AND tgl_reg='$tgl_reg'");
  $cek = mysqli_num_rows($cek_data);

  if ($cek > 0) {
    echo "<script>alert('Data Registrasi Sudah Ada, Silahkan Cek Kembali')</script>";
    echo "<script>window.location.href='pendaftaran_kader.php'</script>";
  } else {
    $query = "INSERT INTO registrasi (no_reg, tgl_reg, NIK_balita, id_pengguna) VALUES('$no_reg','$tgl_reg','$NIK_balita','$id_pengguna')";
    $sql = mysqli_query($koneksi, $query);
    if ($sql) {
      echo "<script>alert('Data Berhasil Disimpan')</script>";
      echo "<script>window.location.href='pendaftaran_kader.php'</script>";
    } else {
      echo "<script>alert('Data Gagal Disimpan')</script>";
      echo "<script>window.location.href='pendaftaran_kader.php'</script>";
    }
  }
}
?>


<!-- Edit-->
<?php
include 'koneksi.php';
if (isset($_POST['ubah'])) {

  $ubah = mysqli_query($koneksi, "UPDATE registrasi SET tgl_reg = '$_POST[tgl_reg]',NIK_balita = '$_POST[NIK_balita]', id_pengguna = '$_POST[id_pengguna]' WHERE no_reg = '$_POST[no_reg]'");
  if ($ubah) {
    echo "<script>alert('Data Berhasil Diubah')</script>";
    echo "<script>window.location.href='pendaftaran_kader.php'</script>";
  } else {
    echo "<script>alert('Data Gagal Diubah')</script>";
    echo "<script>window.location.href='pendaftaran_kader.php'</script>";
  }
}
?>




<!-- Format Tanggal Indonesia -->
<?php
function tgl_indo($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('-', $tanggal);
  // variabel pecahkan 0 = Tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<!--Usia-->
<?php
function usia($tgl_lahir)
{
  $lahir = new DateTime($tgl_lahir);
  $hari_ini = new DateTime();

  $diff = $hari_ini->diff($lahir);

  echo $diff->y . " Tahun";
  if ($diff->m > 0) {
    echo " " . $diff->m . " Bulan";
  }
}
?>