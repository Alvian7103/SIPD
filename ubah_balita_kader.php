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
    <title>Data Balita</title>
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
                <div class="container-fluid px-6">
                    <h1 class="mt-4">Master Data Balita</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Data Balita Posyandu Anggrek 1 Desa Tambak</li>
                    </ol>

                    <div class="card mt-3">
                        <div class="card-header bg-primary text-light">
                            <i class="fas fa-table me-1"></i>
                            Data Balita
                        </div>
                        <?php
                        include 'koneksi.php';
                        $id_balita = $_GET['id_balita'];
                        $query = "SELECT * FROM balita LEFT JOIN ibu ON balita.NIK_ibu = ibu.NIK_ibu  JOIN pengguna ON balita.id_pengguna = pengguna.id_pengguna WHERE balita.id_balita = '$id_balita'";
                        $tampil = mysqli_query($koneksi, $query);
                        while ($data = mysqli_fetch_array($tampil)) {
                        ?>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="modal-title">Ubah Data <?= $data['nama_balita'] ?></h4>
                                                <form method="post" action="ubah_balita_kader.php">
                                                    <div class="modal-body">
                                                        <div hidden="form-group col-md-1">
                                                            <label for="id_balita">ID Balita</label>
                                                            <input type="text" maxlength="8" name="id_balita" value="<?= $data['id_balita'] ?>" placeholder="ID Balita" class="form-control" readonly>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-2">
                                                                <label for="NIK_balita">NIK Balita</label>
                                                                <input type="text" maxlength="16" name="NIK_balita" value="<?= $data['NIK_balita'] ?>" placeholder="NIK Balita" class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group col-md-5">
                                                                <label for="nama_balita">Nama Balita</label>
                                                                <input type="text" name="nama_balita" value="<?= $data['nama_balita'] ?>" placeholder="Nama Balita" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-2">
                                                                <label for="tempat_lahir_balita">Tempat Lahir </label>
                                                                <input type="text" name="tempat_lahir_balita" value="<?= $data['tempat_lahir_balita'] ?>" placeholder="Tempat Lahir " class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="tgl_lahir_balita">Tanggal Lahir </label>
                                                                <input type="Date" max="<?php echo date('Y-m-d'); ?>" name="tgl_lahir_balita" value="<?= $data['tgl_lahir_balita'] ?>" placeholder="Tanggal Lahir" class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="Jenis_kelamin">Jenis Kelamin</label>
                                                                <select name="jenis_kelamin" class="form-control" required>
                                                                    <option hidden="<?= $data['jenis_kelamin'] ?>"><?= $data['jenis_kelamin'] ?></option>
                                                                    <option value="Laki-laki">Laki-laki</option>
                                                                    <option value="Perempuan">Perempuan</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="agama_balita">Agama Balita</label>
                                                                <select name="agama_balita" class="form-control" required>
                                                                    <option hidden="<?= $data['agama_balita'] ?>"><?= $data['agama_balita'] ?></option>
                                                                    <option value="Islam">Islam</option>
                                                                    <option value="Kristen">Kristen</option>
                                                                    <option value="Katolik">Katolik</option>
                                                                    <option value="Hindu">Hindu</option>
                                                                    <option value="Buddha">Buddha</option>
                                                                    <option value="Konghucu">Konghucu</option>
                                                                    <option value="Lainnya">Lainnya</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label for="NIK_ibu">Ibu</label>
                                                            <select name="NIK_ibu" id="NIK_ibu" class="form-control" required>
                                                                <option hidden value="<?= htmlspecialchars($data['NIK_ibu'], ENT_QUOTES, 'UTF-8') ?>">
                                                                    <?= htmlspecialchars($data['nama_ibu'], ENT_QUOTES, 'UTF-8') ?>
                                                                </option>
                                                                <?php
                                                                $query = mysqli_query($koneksi, "SELECT * FROM ibu ORDER BY nama_ibu ASC") or die(mysqli_error($koneksi));
                                                                while ($row = mysqli_fetch_array($query)) {
                                                                    echo "<option value=\"" . htmlspecialchars($row['NIK_ibu'], ENT_QUOTES, 'UTF-8') . "\">" . htmlspecialchars($row['NIK_ibu'], ENT_QUOTES, 'UTF-8') . "-" . htmlspecialchars($row['nama_ibu'], ENT_QUOTES, 'UTF-8') . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div hidden="form-group">
                                                            <label for="id_pengguna">Kader</label>
                                                            <input type="text" maxlength="16" name="id_pengguna" value="<?= $_SESSION['id_pengguna'] ?>" placeholder="ID Pengguna" class="form-control" readonly>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <button type="submit" class="btn btn-primary w-100" name="ubah">Ubah</button>
                                                            </div>
                                                            <div class="col-md-auto"></div>
                                                            <div class="col-md-5">
                                                                <a href="balita_kader.php" type="button" class="btn btn-danger w-100">Batal</a>
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
                                                                                } ?>" class="form-control" placeholder="Masukan ID/NIK/atau Nama Balita">
                                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                                <div class="scroll table-responsive">
                                    <table class="table table-bordered table-striped text-center" width=100% display=block>
                                        <tr>

                                            <th>ID</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Usia</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Alamat</th>
                                            <th>Ibu</th>
                                            <th>Kader/Bidan</th>
                                            <th>Edit</th>

                                        </tr>
                                        <?php
                                        include 'koneksi.php';
                                        $no = 1;

                                        // SQL query based on search input
                                        if (isset($_POST['cari'])) {
                                            $key = $_POST['cari'];
                                            $query = "SELECT * FROM balita LEFT JOIN ibu ON balita.NIK_ibu = ibu.NIK_ibu  JOIN pengguna ON balita.id_pengguna = pengguna.id_pengguna WHERE id_balita like '%$key%' or NIK_balita like '%$key%' or nama_balita like '%$key%' order by tgl_lahir_balita Desc  ";
                                        } else {
                                            $query = "SELECT * FROM balita LEFT JOIN ibu ON balita.NIK_ibu = ibu.NIK_ibu  JOIN pengguna ON balita.id_pengguna = pengguna.id_pengguna  order by tgl_lahir_balita desc";
                                        }

                                        // Execute query and fetch results
                                        $tampil = mysqli_query($koneksi, $query);
                                        while ($data = mysqli_fetch_array($tampil)) :
                                        ?>
                                            <tr>
                                                <td hidden><?= $no++ ?></td>
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
                                                <td><?= $data['agama_balita'] ?></td>
                                                <td><?= $data['alamat_ibu'] ?></td>
                                                <td><?= $data['nama_ibu'] ?></td>
                                                <td><?= $data['nama_pengguna'] ?></td>
                                                <td>
                                                    <a href="ubah_balita_kader.php?id_balita=<?= $data['id_balita'] ?>" type="button" class="btn btn-warning" data-toggle="modal"><i class="fas fa-pencil-alt"></i> Ubah</a>
                                                </td>


                                            </tr>
                                        <?php endwhile; ?>
                                    </table>
                                </div>
                            </div>
                            <div class="card-header bg-primary text-light"></div>
                        </div>
                    </div>
                </div>
            </main>
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

    $ubah = mysqli_query($koneksi, "UPDATE balita SET NIK_balita = '$_POST[NIK_balita]', nama_balita = '$_POST[nama_balita]', tempat_lahir_balita = '$_POST[tempat_lahir_balita]', tgl_lahir_balita = '$_POST[tgl_lahir_balita]', jenis_kelamin = '$_POST[jenis_kelamin]', agama_balita = '$_POST[agama_balita]', NIK_ibu = '$_POST[NIK_ibu]', id_pengguna = '$_POST[id_pengguna]' WHERE id_balita = '$_POST[id_balita]'");
    if ($ubah) {
        echo "<script>alert('Data Berhasil Diubah')</script>";
        echo "<script>window.location.href='balita_kader.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah')</script>";
        echo "<script>window.location.href='balita_kader.php'</script>";
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
        echo " " .   $diff->m . " Bulan";
    }
}
?>