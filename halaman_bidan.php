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
  <title>Dashboard</title>
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
        <div class="text-center">
          <h1 class="display-4">Hello, <b> <?= $_SESSION['nama_pengguna'] ?></b></h1>
          <h2 class="lead"> Selamat Datang di Halaman Utama Sistem Informasi Pencatatan Data Balita, anda berhasil Login sebagai
            <b><?= $_SESSION['level'] ?></b>
          </h2>
          <hr class="my-4">
        </div>

        <div class="container-fluid px-6">
          <h1 class="mt-4">SISTEM INFORMASI PENCATATAN DATA BALITA POSYANDU ANGGREK 1 DESA TAMBAK</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
          <div class="card mt-4">
            <div class="card-header bg-primary text-light">
              <i class="fas fa-book-open"></i>
              Data Posyandu
            </div>
            <br>
            <div class="card-body">
              <div class="col-md-12 mx-auto">
                <div class="container-fluid px-6 text-center">
                  <h3 class="mt-2"> MASTER DATA POSYANDU ANGGREK 1 DESA TAMBAK</h3>
                </div>
                <div class="row">
                  <div class="col-xl-6 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                      <div class="card-body">Balita</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="balita_bidan.php">Lihat Detail</a>
                        <div class="small text-white">
                          <i class="fas fa-angle-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-6 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                      <div class="card-body">Ibu</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="ibu_bidan.php">Lihat Detail</a>
                        <div class=" small text-white">
                          <i class="fas fa-angle-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xl-4 col-md-4">
                    <div class="card bg-success text-white mb-4">
                      <div class="card-body">Kader</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="kader_bidan.php">Lihat Detail</a>
                        <div class="small text-white">
                          <i class="fas fa-angle-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-md-4">
                    <div class="card bg-warning text-white mb-4">
                      <div class="card-body">Jenis Imunisasi</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="jenis_imunisasi_bidan.php">Lihat Detail</a>
                        <div class="small text-white">
                          <i class="fas fa-angle-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-md-4">
                    <div class="card bg-secondary text-white mb-4">
                      <div class="card-body">Pengguna</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="user_bidan.php">Lihat Detail</a>
                        <div class="small text-white">
                          <i class="fas fa-angle-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="container-fluid px-6 text-center">
                  <h3 class="mt-2">DATA PELAYANAN POSYANDU ANGGREK 1 DESA TAMBAK</h3>
                </div>
                <div class="row">
                  <div class="col-xl-4 col-md-4">
                    <div class="card bg-primary text-white mb-4">
                      <div class="card-body">Penimbangan dan Pengukuran</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="penimbangan_pengukuran_bidan.php">Lihat Detail</a>
                        <div class="small text-white">
                          <i class="fas fa-angle-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-md-4">
                    <div class="card bg-danger text-white mb-4">
                      <div class="card-body">Pemeriksaan</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="pemeriksaan_bidan.php">Lihat Detail</a>
                        <div class="small text-white">
                          <i class="fas fa-angle-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-md-4">
                    <div class="card bg-info text-white mb-4">
                      <div class="card-body">Imunisasi</div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="imunisasi_bidan.php">Lihat Detail</a>
                        <div class="small text-white">
                          <i class="fas fa-angle-right"></i>
                        </div>
                      </div>
                    </div>
                  </div>
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