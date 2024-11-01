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
    <title>Data Imunisasi</title>
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
                    <h1 class="mt-4"> Data Imunisasi</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"> Data Imunisasi Posyandu Anggrek 1 Desa Tambak</li>
                    </ol>
                    <div class="card mt-3">
                        <div class="card-header bg-primary text-light">
                            <i class="fas fa-table me-1"></i>
                            Data Imunisasi
                        </div>
                        <?php
                        include 'koneksi.php';
                        $no_imunisasi = $_GET['no_imunisasi'];
                        $query = "SELECT * FROM imunisasi LEFT JOIN jenis_imunisasi ON imunisasi.kd_imunisasi = jenis_imunisasi.kd_imunisasi  JOIN pengguna ON imunisasi.id_pengguna = pengguna.id_pengguna JOIN balita ON imunisasi.id_balita = balita.id_balita  WHERE imunisasi.no_imunisasi = '$no_imunisasi'";
                        $tampil = mysqli_query($koneksi, $query);
                        while ($data = mysqli_fetch_array($tampil)) {
                        ?>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="modal-title" id="staticBackdropLabel">Ubah Data Imunisasi <?= $data['nama_balita'] ?></h4>
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div hidden="form-group">
                                                                <label for="id_pengguna">Kader</label>
                                                                <input type="text" maxlength="16" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>" placeholder="ID Pengguna" class="form-control" readonly>
                                                            </div>
                                                            <div hidden="form-group col-md-6">
                                                                <label for="no_imunisasi">No Imunisasi</label>
                                                                <input type="number" name="no_imunisasi" value="<?= $data['no_imunisasi'] ?>" placeholder="No Imunisasi" class="form-control" readonly>
                                                            </div>
                                                            <div hidden="form-group col-md-6">
                                                                <label for="id_balita">ID Balita</label>
                                                                <input type="text" name="id_balita" value="<?= $data['id_balita'] ?>" placeholder="ID Balita " class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="tgl_imunisasi">Tanggal Imunisasi</label>
                                                                <input type="date" max="<?= date('Y-m-d'); ?>" name="tgl_imunisasi" value="<?= $data['tgl_imunisasi'] ?>" placeholder="Tanggal Imunisasi" class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="ket_imunisasi">Keterangan</label>
                                                                <textarea class="form-control" name="ket_imunisasi" rows="3"><?= $data['ket_imunisasi'] ?></textarea>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="kd_imunisasi">Jenis Imunisasi</label>
                                                                <select name="kd_imunisasi" class="form-control" required>
                                                                    <option hidden value="<?= $data['kd_imunisasi'] ?>"><?= $data['nama_imunisasi'] ?></option>
                                                                    <?php
                                                                    $query = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi") or die(mysqli_error($koneksi));
                                                                    while ($row = mysqli_fetch_array($query)) {
                                                                        echo "<option value='{$row['kd_imunisasi']}'> {$row['kd_imunisasi']}-{$row['nama_imunisasi']} </option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <button type="submit" class="btn btn-primary w-100" name="ubah">Ubah</button>
                                                            </div>
                                                            <div class="col-md-auto"></div>
                                                            <div class="col-md-5">
                                                                <a href="imunisasi_bidan.php" type="button" class="btn btn-danger w-100">Batal</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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
                                                <th>Tanggal Imunisasi</th>
                                                <th>ID Balita</th>
                                                <th>Balita</th>
                                                <th>Usia</th>
                                                <th>Jenis Imunisasi</th>
                                                <th>Keterangan</th>
                                                <th>Kader/Bidan</th>
                                                <th>Edit</th>
                                                <th>Hapus</th>
                                            </tr>
                                            <?php
                                            include 'koneksi.php';
                                            $no = 1;

                                            if (isset($_POST['cari'])) {

                                                $key = $_POST['cari'];
                                                $query = "SELECT * FROM imunisasi LEFT JOIN jenis_imunisasi ON imunisasi.kd_imunisasi = jenis_imunisasi.kd_imunisasi  JOIN pengguna ON imunisasi.id_pengguna = pengguna.id_pengguna JOIN balita ON imunisasi.id_balita = balita.id_balita  WHERE balita.id_balita LIKE '%$key%' OR balita.nama_balita LIKE '%$key%'  order by 
                      no_imunisasi desc  ";
                                            } elseif (isset($_POST['tgl_awal'])) {
                                                $tgl_awal = $_POST['tgl_awal'];
                                                $tgl_akhir = $_POST['tgl_akhir'];
                                                $query = "SELECT * FROM imunisasi LEFT JOIN jenis_imunisasi ON imunisasi.kd_imunisasi = jenis_imunisasi.kd_imunisasi JOIN pengguna ON imunisasi.id_pengguna = pengguna.id_pengguna  JOIN balita ON imunisasi.id_balita = balita.id_balita   WHERE tgl_imunisasi BETWEEN '" . $tgl_awal . "' AND '" . $tgl_akhir . "' order by no_imunisasi ASC";
                                            } else {
                                                $query = "SELECT * FROM imunisasi LEFT JOIN jenis_imunisasi ON imunisasi.kd_imunisasi = jenis_imunisasi.kd_imunisasi JOIN pengguna ON imunisasi.id_pengguna = pengguna.id_pengguna  JOIN balita ON imunisasi.id_balita = balita.id_balita   order by no_imunisasi desc";
                                            }

                                            $tampil = mysqli_query($koneksi, $query);
                                            while ($data = mysqli_fetch_array($tampil)) :
                                            ?>
                                                <tr>

                                                    <td><?php if ($data['tgl_imunisasi'] == "0000-00-00") {
                                                            echo "-";
                                                        } else {
                                                            echo tgl_indo($data['tgl_imunisasi']);
                                                        } ?></td>
                                                    <td><?= $data['id_balita'] ?></td>
                                                    <td><?= $data['nama_balita'] ?></td>
                                                    <td><?php if ($data['tgl_lahir_balita'] == "0000-00-00") {
                                                            echo "-";
                                                        } else {
                                                            echo usia($data['tgl_lahir_balita']);
                                                        } ?></td>
                                                    <td><?= $data['nama_imunisasi'] ?></td>
                                                    <td><?= $data['ket_imunisasi'] ?></td>
                                                    <td><?= $data['nama_pengguna'] ?></td>
                                                    <td>
                                                        <a href="ubah_imunisasi_bidan.php?no_imunisasi=<?= $data['no_imunisasi'] ?>" type="button" class="btn btn-warning" data-toggle="modal"><i class="fas fa-pencil-alt"></i> Ubah</a>
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
                                                                        <input type="hidden" name="no_imunisasi" value="<?= $data['no_imunisasi'] ?>">
                                                                        <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ? <br>
                                                                            <span class="text-danger"><?= $data['tgl_imunisasi'] ?> - <?= $data['nama_balita'] ?> - <?= $data['nama_imunisasi'] ?></span>
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


<!-- Edit-->
<?php
include 'koneksi.php';

if (isset($_POST['ubah'])) {
    // Mengambil data dari form dan mengamankannya
    $tgl_imunisasi = $_POST['tgl_imunisasi'];
    $id_balita = $_POST['id_balita'];
    $kd_imunisasi = $_POST['kd_imunisasi'];
    $ket_imunisasi = $_POST['ket_imunisasi'];
    $id_pengguna = $_POST['id_pengguna'];
    $no_imunisasi = $_POST['no_imunisasi'];

    // Prepare the SQL statement
    $stmt = $koneksi->prepare("UPDATE imunisasi SET 
    tgl_imunisasi = ?, 
    id_balita = ?, 
    kd_imunisasi = ?, 
    ket_imunisasi = ?, 
    id_pengguna = ? 
    WHERE no_imunisasi = ?");

    // Bind the parameters
    $stmt->bind_param(
        "sssssi", // s = string, i = integer
        $tgl_imunisasi,
        $id_balita,
        $kd_imunisasi,
        $ket_imunisasi,
        $id_pengguna,
        $no_imunisasi
    );

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Data Berhasil Diubah');</script>";
        echo "<script>window.location.href='imunisasi_bidan.php';</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah');</script>";
        echo "<script>window.location.href='imunisasi_bidan.php';</script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$koneksi->close();
?>



<!-- Hapus -->
<?php
include 'koneksi.php';
if (isset($_POST['hapus'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM imunisasi WHERE no_imunisasi = '$_POST[no_imunisasi]'");
    if ($hapus) {
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<script>window.location.href='imunisasi_bidan.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus')</script>";
        echo "<script>window.location.href='imunisasi_bidan.php'</script>";
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