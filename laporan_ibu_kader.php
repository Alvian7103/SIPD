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
    <title>Laporan Data Ibu</title>
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

                                <a class="nav-link" href=penimbangan_pengukuran_kader.php>
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-weight-scale"></i></div>Data Penimbangan & Pengukuran
                                </a>
                                <a class="nav-link" href=pemeriksaan_kader.php>
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-stethoscope"></i></div>Data Pemeriksaaan
                                </a>
                                <a class="nav-link" href=imunisasi_kader.php>
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
                                <a class="nav-link" href=laporan_balita_kader.php>
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-children"></i></div>Data Balita
                                </a>
                                <a class="nav-link" href=laporan_ibu_kader.php>
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-person-breastfeeding"></i></div>Data Ibu
                                </a>
                                <a class="nav-link" href=laporan_registrasi_kader.php>
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-address-card"></i></div>Data Kehadiran
                                </a>
                                <a class="nav-link" href=laporan_penimbangan_pengukuran_kader.php>
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-weight-scale"></i></div>Data Penimbangan & Pengukuran
                                </a>
                                <a class="nav-link" href=laporan_pemeriksaan_kader.php>
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-stethoscope"></i></div>Data Pemeriksaaan
                                </a>
                                <a class="nav-link" href=laporan_imunisasi_kader.php>
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-syringe"></i></div>Data Imunisasi
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
                    <h1 class="mt-4">Laporan Data Ibu</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Data Ibu Posyandu Anggrek 1 Desa Tambak</li>
                    </ol>

                    <div class="card mt-3">
                        <div class="card-header bg-primary text-light">
                            <i class="fas fa-table me-1"></i>
                            Data Ibu
                        </div>
                        <div class="card-header">
                            <a class="btn btn-success" href=cetak_ibu.php>
                                Cetak</a>

                        </div>
                        <div class="card-body">
                            <div class="col-md-12 mx-auto">
                                <form method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" name="cari" value="<?php if (isset($_POST['cari'])) {
                                                                                    echo $_POST['cari'];
                                                                                } ?>" class="form-control" placeholder="Masukan NIK Ibu atau Nama Ibu">
                                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped text-center ">
                                        <!-- /.card-header -->
                                        <div class="card-body">

                                            <tr>
                                                <th>NIK Ibu</th>
                                                <th>Nama Ibu</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Usia</th>
                                                <th>Agama</th>
                                                <th>Golongan Darah</th>
                                                <th>Pendidikan</th>
                                                <th>Pekerjaan</th>
                                                <th>Alamat</th>
                                                <th>No Telepon</th>
                                                <th>NIK Suami</th>
                                                <th>Nama Suami</th>
                                                <th>Kader/Bidan</th>
                                            </tr>
                                            <?php
                                            include 'koneksi.php';
                                            $no = 1;

                                            if (isset($_POST['cari'])) {

                                                $key = $_POST['cari'];
                                                $query = "SELECT * FROM ibu LEFT JOIN pengguna ON ibu.id_pengguna = pengguna.id_pengguna WHERE NIK_ibu like '%$key%' or nama_ibu like '%$key%' order by nama_ibu asc  ";
                                            } else {
                                                $query = "SELECT * FROM ibu LEFT JOIN pengguna ON ibu.id_pengguna = pengguna.id_pengguna  order by nama_ibu asc";
                                            }

                                            $tampil = mysqli_query($koneksi, $query);
                                            while ($data = mysqli_fetch_array($tampil)) :
                                            ?>
                                                <tr>
                                                    <td><?= $data['NIK_ibu'] ?></td>
                                                    <td><?= $data['nama_ibu'] ?></td>
                                                    <td><?= $data['tempat_lahir_ibu'] ?></td>
                                                    <td><?php if ($data['tgl_lahir_ibu'] == "0000-00-00") {
                                                            echo "-";
                                                        } else {
                                                            echo tgl_indo($data['tgl_lahir_ibu']);
                                                        } ?></td>
                                                    <td><?php if ($data['tgl_lahir_ibu'] == "0000-00-00") {
                                                            echo "-";
                                                        } else {
                                                            echo usia($data['tgl_lahir_ibu']);
                                                        } ?></td>
                                                    <td><?= $data['agama_ibu'] ?></td>
                                                    <td><?= $data['gol_darah_ibu'] ?></td>
                                                    <td><?= $data['pendidikan_ibu'] ?></td>
                                                    <td><?= $data['pekerjaan_ibu'] ?></td>
                                                    <td><?= $data['alamat_ibu'] ?></td>
                                                    <td>0<?= $data['no_telp_ibu'] ?></td>
                                                    <td><?= $data['NIK_suami'] ?></td>
                                                    <td><?= $data['nama_suami'] ?></td>
                                                    <td><?= $data['nama_pengguna'] ?></td>
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
}
?>