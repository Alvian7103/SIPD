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
  <title>Data Penimbangan & Pengukuran</title>
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <style>
    .scroll {
      height: 260px;
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
          <h1 class="mt-4">Data Penimbangan dan Pengukuran</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Penimbangan Berat Badan & Pengukuran Tinggi Badan Balita Posyandu Anggrek 1 Desa Tambak</li>
          </ol>
          <div class="card mt-3">
            <div class="card-header bg-primary text-light">
              <i class="fas fa-table me-1"></i>
              Data Penimbangan & Pengukuran
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="modal-title">Tambah Data Penimbangan & Pengukuran</h4>
                      <form method="post">
                        <div class="modal-body ">
                          <div hidden="form-group">
                            <label for="id_pengguna">Kader</label>
                            <input type="text" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>" placeholder="ID Pengguna" class="form-control" readonly>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-4">
                              <label for="id_balita">Balita</label>
                              <select name="id_balita" class="form-control" required>
                                <option hidden>Pilih Balita</option>
                                <?php
                                include "koneksi.php";
                                $query = mysqli_query($koneksi, "SELECT * FROM balita order by id_balita DESC") or die(mysqli_error($koneksi));
                                while ($data = mysqli_fetch_array($query)) {
                                  echo "<option value=$data[id_balita]> $data[id_balita]-$data[nama_balita] </option>";
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group col-md-2">
                              <label for="tgl_timbang">Tanggal Pelayanan</label>
                              <input type="Date" max="<?php echo date('Y-m-d'); ?>" name="tgl_timbang" placeholder="Tanggal Penimbangan & Pengukuran" class="form-control" required>
                            </div>
                            <div class="form-group col-md-2">
                              <label for="BB">Berat Badan ( Kg )</label>
                              <input type="text" name="BB" placeholder="Berat Badan" class="form-control" required>
                            </div>
                            <div class="form-group col-md-2">
                              <label for="TB">Tinggi Badan ( Cm )</label>
                              <input type="text" name="TB" placeholder="Tinggi Badan" class="form-control" required>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-5">
                              <button type="submit" class="btn btn-primary w-100" name="simpantimbang">Simpan</button>
                            </div>
                            <div class="col-md-auto"></div>
                            <div class="col-md-5">
                              <a href="penimbangan_pengukuran_bidan.php" type="button" class="btn btn-danger w-100">Batal</a>
                            </div>
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
                                                              } ?>" class="form-control" placeholder="Masukan ID/Nama Balita">
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

                    <div class="scroll table-responsive">
                      <table class="table table-bordered table-striped text-center ">
                        <!-- /.card-header -->
                        <div class="card-body">
                          <tr>
                            <th>Tanggal Pelayanan</th>
                            <th>ID Balita</th>
                            <th>Balita</th>
                            <th>Usia</th>
                            <th>BB</th>
                            <th>TB</th>
                            <th>Kader/Bidan</th>
                            <th>Edit</th>
                            <th>Hapus</th>
                          </tr>
                          <?php
                          include 'koneksi.php';
                          $no = 1;

                          if (isset($_POST['cari'])) {

                            $key = $_POST['cari'];
                            $query = "SELECT * FROM penimbangan_pengukuran 
                        LEFT JOIN pengguna ON penimbangan_pengukuran.id_pengguna = pengguna.id_pengguna 
                        JOIN balita ON penimbangan_pengukuran.id_balita = balita.id_balita 
                        WHERE balita.id_balita LIKE '%$key%' OR balita.nama_balita LIKE '%$key%' 
                        ORDER BY penimbangan_pengukuran.no_timbang DESC";
                          } elseif (isset($_POST['tgl_awal'])) {
                            $tgl_awal = $_POST['tgl_awal'];
                            $tgl_akhir = $_POST['tgl_akhir'];
                            $query = "SELECT * FROM penimbangan_pengukuran LEFT JOIN pengguna ON penimbangan_pengukuran.id_pengguna = pengguna.id_pengguna JOIN balita ON penimbangan_pengukuran.id_balita = balita.id_balita  WHERE tgl_timbang BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' order by no_timbang ASC";
                          } else {
                            $query = "SELECT * FROM penimbangan_pengukuran LEFT JOIN pengguna ON penimbangan_pengukuran.id_pengguna = pengguna.id_pengguna JOIN balita ON penimbangan_pengukuran.id_balita = balita.id_balita  order by no_timbang desc";
                          }

                          $tampil = mysqli_query($koneksi, $query);
                          while ($data = mysqli_fetch_array($tampil)) :
                          ?>
                            <tr>
                              <td hidden><?= $no++ ?></td>
                              <td><?php if ($data['tgl_timbang'] == "0000-00-00") {
                                    echo "-";
                                  } else {
                                    echo tgl_indo($data['tgl_timbang']);
                                  } ?></td>
                              <td><?= $data['id_balita'] ?></td>
                              <td><?= $data['nama_balita'] ?></td>
                              <td><?php if ($data['tgl_lahir_balita'] == "0000-00-00") {
                                    echo "-";
                                  } else {
                                    echo usia($data['tgl_lahir_balita']);
                                  } ?></td>
                              <td><?= $data['BB'] ?> Kg</td>
                              <td><?= $data['TB'] ?> Cm</td>
                              <td><?= $data['nama_pengguna'] ?></td>
                              <td>
                                <a href="ubah_penimbangan_pengukuran_bidan.php?no_timbang=<?= $data['no_timbang'] ?>" type="button" class="btn btn-warning" data-toggle="modal"><i class="fas fa-pencil-alt"></i> Ubah</a>
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
                                        <input type="hidden" name="no_timbang" value="<?= $data['no_timbang'] ?>">
                                        <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ? <br>
                                          <span class="text-danger"><?php if ($data['tgl_timbang'] == "0000-00-00") {
                                                                      echo "-";
                                                                    } else {
                                                                      echo tgl_indo($data['tgl_timbang']);
                                                                    } ?></td>- <?= $data['nama_balita'] ?></span>
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
if (isset($_POST['simpantimbang'])) {
  $no_timbang = $_POST['no_timbang'];
  $tgl_timbang = $_POST['tgl_timbang'];
  $id_balita = $_POST['id_balita'];
  $id_pengguna = $_POST['id_pengguna'];
  $BB = $_POST['BB'];
  $TB = $_POST['TB'];


  $cek_data = mysqli_query($koneksi, "SELECT * FROM penimbangan_pengukuran WHERE tgl_timbang='$tgl_timbang' and id_balita='$id_balita'");
  $cek = mysqli_num_rows($cek_data);

  if ($cek > 0) {
    echo "<script>alert('Data Penimbangan & Pengukuran Sudah Ada, Silahkan Cek Kembali')</script>";
    echo "<script>window.location.href='penimbangan_pengukuran_bidan.php'</script>";
  } else {
    $query = "INSERT INTO penimbangan_pengukuran (no_timbang, tgl_timbang, id_balita, id_pengguna, BB, TB) VALUES('$no_timbang','$tgl_timbang', '$id_balita','$id_pengguna','$BB','$TB')";
    $sql = mysqli_query($koneksi, $query);
    if ($sql) {
      echo "<script>alert('Data Berhasil Disimpan')</script>";
      echo "<script>window.location.href='penimbangan_pengukuran_bidan.php'</script>";
    } else {
      echo "<script>alert('Data Gagal Disimpan')</script>";
      echo "<script>window.location.href='penimbangan_pengukuran_bidan.php'</script>";
    }
  }
}
?>

<!-- Hapus -->
<?php
include 'koneksi.php';
if (isset($_POST['hapus'])) {

  $hapus = mysqli_query($koneksi, "DELETE FROM penimbangan_pengukuran WHERE no_timbang = '$_POST[no_timbang]'");
  if ($hapus) {
    echo "<script>alert('Data Berhasil Dihapus')</script>";
    echo "<script>window.location.href='penimbangan_pengukuran_bidan.php'</script>";
  } else {
    echo "<script>alert('Data Gagal Dihapus')</script>";
    echo "<script>window.location.href='penimbangan_pengukuran_bidan.php'</script>";
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