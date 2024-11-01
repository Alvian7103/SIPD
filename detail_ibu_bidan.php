<?php
// mengaktifkan session pada php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Detail Balita</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body class="sb-nav-fixed">
    <div id="wrapper">
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
                        <h1 class="mt-4"> Data Ibu dan Balita</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Data Ibu dan Balita Posyandu Anggrek 1 Desa Tambak</li>
                        </ol>
                        <div class="card mt-3">
                            <div class="card-header bg-primary text-light">
                                <i class="fas fa-table me-1"></i>
                                Data Ibu
                            </div>
                            <?php
                            include 'koneksi.php';

                            // Sanitize the input to prevent SQL Injection
                            $NIK_ibu = mysqli_real_escape_string($koneksi, $_GET['NIK_ibu']);

                            // Correct the query and remove the unnecessary "*"
                            $query = "SELECT ibu.NIK_ibu, ibu.nama_ibu, ibu.tempat_lahir_ibu, ibu.tgl_lahir_ibu, ibu.alamat_ibu, ibu.no_telp_ibu, ibu.agama_ibu, ibu.nama_suami FROM ibu INNER JOIN balita ON ibu.NIK_ibu = balita.NIK_ibu WHERE ibu.NIK_ibu = '$NIK_ibu'";

                            $tampil = mysqli_query($koneksi, $query);

                            // Loop through the result set
                            while ($data = mysqli_fetch_assoc($tampil)) {
                            ?>

                                <div class="row">
                                    <div class="col-lg-4 col-xl-4">


                                        <div class="text-left mt-3">

                                            <div class="table-responsive">
                                                <table id="demo-foo-filtering" data-page-size="7" border-colo="transparent">
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>NIK ibu</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['NIK_ibu']; ?> </span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>Nama Ibu</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['nama_ibu']; ?> </span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>TTL</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['tempat_lahir_ibu']; ?>, <?php if ($data['tgl_lahir_ibu'] == "0000-00-00") {
                                                                                                                            echo "-";
                                                                                                                        } else {
                                                                                                                            echo tgl_indo($data['tgl_lahir_ibu']);
                                                                                                                        } ?></span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>No Telpon </strong> </td>
                                                        <td> <span class="ml-2">: 0<?= $data['no_telp_ibu']; ?> </span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>Alamat</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['alamat_ibu']; ?> </span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>No Telp</strong> </td>
                                                        <td> <span class="ml-2">: 0<?= $data['no_telp_ibu']; ?> </span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>Agama</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['agama_ibu']; ?> </span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>Nama Suami</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['nama_suami']; ?> </span> </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>
                                <br>

                                </div>
                                <div class="row" position="fixed">
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="card-box">
                                            <ul class="nav nav-pills navtab-bg nav-justified">
                                                <li class="nav-item" style="padding-bottom:10px;">
                                                    <a href="detail_ibu_bidan.php?id_balita=<?= $id_balita ?>" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                        Data Balita
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="tab-content">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped text-center">
                                                    <tr>
                                                        <th>ID Balita</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Tempat Lahir</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Usia</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Lihat</th>

                                                    </tr>
                                                    <?php
                                                    include 'koneksi.php';
                                                    $NIK_ibu = mysqli_real_escape_string($koneksi, $_GET['NIK_ibu']);
                                                    $no = 1;
                                                    $query = "SELECT * FROM balita WHERE NIK_ibu = '$NIK_ibu' ORDER BY tgl_lahir_balita DESC";

                                                    // Execute query and fetch results
                                                    $tampil = mysqli_query($koneksi, $query);
                                                    while ($data = mysqli_fetch_array($tampil)) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $data['id_balita'] ?></td>
                                                            <td><?= $data['NIK_balita'] ?></td>
                                                            <td><?= $data['nama_balita'] ?></td>
                                                            <td><?= $data['tempat_lahir_balita'] ?></td>
                                                            <td><?php if ($data['tgl_lahir_balita'] == "0000-00-00") {
                                                                    echo "-";
                                                                } else {
                                                                    echo tgl_indo($data['tgl_lahir_balita']);
                                                                } ?></td>
                                                            <td><?php if ($data['tgl_lahir_balita'] == "0000-00-00") {
                                                                    echo "-";
                                                                } else {
                                                                    echo usia($data['tgl_lahir_balita']);
                                                                } ?></td>
                                                            <td><?= $data['jenis_kelamin'] ?></td>
                                                            <td><a href="detail_balita_bidan.php?id_balita=<?= $data['id_balita'] ?>" class="btn btn-primary"><i class="fa-solid fa-eye"></i> Lihat</a> </td>
                                                        </tr>
                                                    <?php endwhile; ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="card-header bg-primary text-light"></div>
        <footer class="py-4 bg-light mt-auto"></footer>
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
    if ($diff->m > 0) {
        echo " " . $diff->m . " Bulan";
    }
}
?>