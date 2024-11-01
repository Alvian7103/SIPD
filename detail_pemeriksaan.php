<?php
// mengaktifkan session pada php
session_start();

// cek apakah user sudah login
if (!isset($_SESSION['NIK_ibu'])) {
    header("<script>alert('Masukan NIK dan Password Anda')</script>")("<script>window.location.href='login.php'</script>");
}

// menyimpan session ke dalam variabel
$nama_ibu = $_SESSION['nama_ibu'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Detail Pemeriksaan</title>
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
                        <li><a class="dropdown-item" href="ubah_pass_ibu.php">Ubah Password</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a class="dropdown-item" href="logout_ibu.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="halaman_ibu.php">
                                <div class="sb-nav-link-icon">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                                Dashboard
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Masuk Sebagai: <b>Ibu</b></div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-6">
                        <h1 class="mt-4"> Data Riwayat Pelayanan Posyandu</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Data Riwayat Pelayanan Posyandu Anggrek 1 Desa Tambak</li>
                        </ol>
                        <div class="card mt-3">
                            <div class="card-header bg-primary text-light">
                                <i class="fas fa-table me-1"></i>
                                Riwayat Data Pelayanan Posyandu
                            </div>
                            <?php
                            include 'koneksi.php';
                            $id_balita = $_GET['id_balita'];
                            $query = "SELECT balita.id_balita, balita.NIK_balita, balita.nama_balita, balita.tgl_lahir_balita, balita.jenis_kelamin, balita.tempat_lahir_balita, ibu.* FROM balita INNER JOIN ibu ON balita.NIK_ibu = ibu.NIK_ibu 
          WHERE balita.id_balita = '$id_balita'";
                            $tampil = mysqli_query($koneksi, $query);
                            while ($data = mysqli_fetch_array($tampil)) {
                            ?>

                                <div class="row">
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="text-left mt-3">
                                            <div class="table-responsive">
                                                <table id="demo-foo-filtering" data-page-size="7" border-colo="transparent">
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>ID Balita</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['id_balita']; ?> </span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>NIK Balita</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['NIK_balita']; ?> </span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>Nama Balita</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['nama_balita']; ?> </span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>NIK Ibu</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['NIK_ibu']; ?> </span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>Nama Ibu</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['nama_ibu']; ?> </span> </td>
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
                                                        <td class="text-muted mb-2 font-13"><strong>TTL</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['tempat_lahir_balita']; ?>, <?php if ($data['tgl_lahir_balita'] == "0000-00-00") {
                                                                                                                            echo "-";
                                                                                                                        } else {
                                                                                                                            echo tgl_indo($data['tgl_lahir_balita']);
                                                                                                                        } ?></span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted mb-2 font-13"><strong>Jenis Kelamin</strong> </td>
                                                        <td> <span class="ml-2">: <?= $data['jenis_kelamin']; ?> </span> </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>


                            <div class="row" position="fixed">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="card-box">
                                        <ul class="nav nav-pills navtab-bg nav-justified">
                                            <li class="nav-item" style="padding-bottom:10px;">
                                                <a href="detail_balita.php?id_balita=<?= $id_balita ?>" data-toggle="tab" aria-expanded="true" class="nav-link ">
                                                    Penimbangan dan Pengukuran
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="detail_grafik.php?id_balita=<?= $id_balita ?>" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                                    Grafik
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="detail_pemeriksaan.php?id_balita=<?= $id_balita ?>" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Pemeriksaan
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="detail_imunisasi.php?id_balita=<?= $id_balita ?>" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                                    Imunisasi
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content">
                                        <div class="table-responsive">
                                            <table class="table table-bordered toggle-circle" data-paging="true" data-page-size="7">
                                                <thead>
                                                    <tr>
                                                        <th>Tanggal Pelayanan</th>
                                                        <th>Hasil</th>
                                                        <th>Vitamin A</th>
                                                        <th>Obat Cacing</th>
                                                        <th>Pemeriksaan Lanjutan</th>
                                                        <th>Kader/Bidan</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                $query = "SELECT pemeriksaan.tgl_periksa, balita.nama_balita, balita.tgl_lahir_balita, pemeriksaan.hasil, pemeriksaan.vitA, pemeriksaan.obat_cacing, pemeriksaan.pemeriksaan_lanjutan, pengguna.nama_pengguna
                              FROM pemeriksaan 
                            LEFT JOIN balita ON pemeriksaan.id_balita = balita.id_balita JOIN pengguna ON pemeriksaan.id_pengguna = pengguna.id_pengguna
                              WHERE pemeriksaan.id_balita = '$id_balita' 
                              ORDER BY tgl_periksa DESC";

                                                $tampil = mysqli_query($koneksi, $query);
                                                if ($tampil) {
                                                    while ($data = mysqli_fetch_array($tampil)) {
                                                ?>
                                                        <tbody>
                                                            <tr>
                                                                <td><?php if ($data['tgl_periksa'] == "0000-00-00") {
                                                                        echo "-";
                                                                    } else {
                                                                        echo tgl_indo($data['tgl_periksa']);
                                                                    } ?></td>
                                                                <td><?= $data['hasil'] ?></td>
                                                                <td><?= $data['vitA'] ?></td>
                                                                <td><?= $data['obat_cacing'] ?></td>
                                                                <td><?= $data['pemeriksaan_lanjutan'] ?></td>
                                                                <td><?= $data['nama_pengguna'] ?></td>
                                                            </tr>
                                                        </tbody>
                                                <?php
                                                    }
                                                } else {
                                                    echo "Error: " . mysqli_error($koneksi);
                                                }
                                                ?>
                                                <tfoot>
                                                    <tr class="active">
                                                        <td colspan="7">
                                                            <div class="text-right">
                                                                <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tfoot>
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
    </div>
    <footer class="py-4 bg-light mt-auto"></footer>

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