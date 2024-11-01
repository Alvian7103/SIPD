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
    <title>Data Jenis Imunisasi</title>
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
                    <h1 class="mt-4">Master Data Jenis Imunisasi</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Data Jenis Imunisasi Posyandu Anggrek 1 Desa Tambak</li>
                    </ol>
                    <div class="card mt-3">
                        <div class="card-header bg-primary text-light">
                            <i class="fas fa-table me-1"></i>
                            Data Jenis Imunisasi
                        </div>
                        <?php
                        include 'koneksi.php';
                        $kd_imunisasi = $_GET['kd_imunisasi'];
                        $query = "SELECT * FROM jenis_imunisasi WHERE jenis_imunisasi.kd_imunisasi = '$kd_imunisasi'";
                        $tampil = mysqli_query($koneksi, $query);
                        while ($data = mysqli_fetch_array($tampil)) {
                        ?>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="modal-title">Ubah Data <?= $data['nama_imunisasi'] ?></h4>
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div hidden="form-group">
                                                                <label for="kd_imunisasi">Kode Imunisasi</label>
                                                                <br>
                                                                <input type="text" class="col-md-1" name="kd_imunisasi" value="<?= $data['kd_imunisasi'] ?>" placeholder="Kode Imunisasi" class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="nama_imunisasi">Nama Imunisasi </label>
                                                                <input type="text" name="nama_imunisasi" value="<?= $data['nama_imunisasi'] ?>" placeholder="Nama Imunisasi" class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="ket_jenis_imunisasi">Keterangan </label>
                                                                <textarea class="form-control" name="ket_jenis_imunisasi" rows="3" required> <?= $data['ket_jenis_imunisasi'] ?> </textarea>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <button type="submit" class="btn btn-primary w-100" name="ubah">Ubah</button>
                                                            </div>
                                                            <div class="col-md-auto"></div>
                                                            <div class="col-md-5">
                                                                <a href="jenis_imunisasi_bidan.php" type="button" class="btn btn-danger w-100">Batal</a>
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
                                        <input type="text" name="tcari" value="<?= @$_POST['tcari'] ?>" class="form-control" placeholder="Masukan Kode Imunisasi atau Nama Imunisasi ">
                                        <button class="btn btn-success" name="bcari" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>

                                <div class="scroll table-responsive">
                                    <table class="table table-bordered table-striped text-center ">
                                        <!-- /.card-header -->
                                        <div class="card-body">

                                            <tr>
                                                <th>Kode Imunisasi</th>
                                                <th>Nama Imunisasi</th>
                                                <th>Keterangan Jenis Imunisasi</th>
                                                <th>Edit</th>
                                                <th>Hapus</th>
                                            </tr>
                                            <?php
                                            include 'koneksi.php';
                                            $no = 1;

                                            if (isset($_POST['bcari'])) {

                                                $key = $_POST['tcari'];
                                                $q = "SELECT * FROM jenis_imunisasi WHERE kd_imunisasi like '%$key%' or nama_imunisasi like '%$key%' or ket_jenis_imunisasi like '%$key%' order by 
                      kd_imunisasi asc  ";
                                            } else {
                                                $q = "SELECT * FROM jenis_imunisasi order by kd_imunisasi asc";
                                            }

                                            $tampil = mysqli_query($koneksi, $q);
                                            while ($data = mysqli_fetch_array($tampil)) :
                                            ?>
                                                <tr>
                                                    <td hidden><?= $no++ ?></td>
                                                    <td><?= $data['kd_imunisasi'] ?></td>
                                                    <td><?= $data['nama_imunisasi'] ?></td>
                                                    <td><?= $data['ket_jenis_imunisasi'] ?></td>
                                                    <td>
                                                        <a href="ubah_jenis_imunisasi_bidan.php?kd_imunisasi=<?= $data['kd_imunisasi'] ?>" type="button" class="btn btn-warning" data-toggle="modal"><i class="fas fa-pencil-alt"></i> Ubah</a>
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
                                                                        <input type="hidden" name="kd_imunisasi" value="<?= $data['kd_imunisasi'] ?>">
                                                                        <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ? <br>
                                                                            <span class="text-danger"><?= $data['kd_imunisasi'] ?> - <?= $data['nama_imunisasi'] ?></span>
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
                                                <!-- The Modal Ubah -->
                                                <div class="modal fade" id="myModalUbah<?= $no ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="staticBackdropLabel">Ubah Data Jenis Imunisasi</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <form method="post">
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="kd_imunisasi">Kode Imunisasi</label>
                                                                        <br>
                                                                        <input type="text" class="col-md-1" name="kd_imunisasi" value="<?= $data['kd_imunisasi'] ?>" placeholder="Kode Imunisasi" class="form-control" readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nama_imunisasi">Nama Imunisasi </label>
                                                                        <input type="text" name="nama_imunisasi" value="<?= $data['nama_imunisasi'] ?>" placeholder="Nama Imunisasi" class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="ket_jenis_imunisasi">Keterangan </label>
                                                                        <textarea class="form-control" name="ket_jenis_imunisasi" rows="3" required> <?= $data['ket_jenis_imunisasi'] ?> </textarea>
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
    $kd_imunisasi = $_POST['kd_imunisasi'];
    $nama_imunisasi = $_POST['nama_imunisasi'];
    $ket_jenis_imunisasi = $_POST['ket_jenis_imunisasi'];

    $cek_data = mysqli_query($koneksi, "SELECT * FROM jenis_imunisasi WHERE nama_imunisasi='$nama_imunisasi'");
    $cek = mysqli_num_rows($cek_data);

    if ($cek > 0) {
        echo "<script>alert('Data Jenis Imunisasi Sudah Ada, Silahkan Cek Kembali')</script>";
        echo "<script>window.location.href='jenis_imunisasi_bidan.php'</script>";
    } else {
        $query = "INSERT INTO jenis_imunisasi (kd_imunisasi, nama_imunisasi, ket_jenis_imunisasi) VALUES('$kd_imunisasi','$nama_imunisasi','$ket_jenis_imunisasi')";
        $sql = mysqli_query($koneksi, $query);
        if ($sql) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script>window.location.href='jenis_imunisasi_bidan.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan')</script>";
            echo "<script>window.location.href='jenis_imunisasi_bidan.php'</script>";
        }
    }
}
?>


<!-- Edit-->
<?php
include 'koneksi.php';
if (isset($_POST['ubah'])) {

    $ubah = mysqli_query($koneksi, "UPDATE jenis_imunisasi SET nama_imunisasi = '$_POST[nama_imunisasi]',ket_jenis_imunisasi = '$_POST[ket_jenis_imunisasi]' WHERE kd_imunisasi = '$_POST[kd_imunisasi]'");
    if ($ubah) {
        echo "<script>alert('Data Berhasil Diubah')</script>";
        echo "<script>window.location.href='jenis_imunisasi_bidan.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah')</script>";
        echo "<script>window.location.href='jenis_imunisasi_bidan.php'</script>";
    }
}
?>


<!-- Hapus -->
<?php
include 'koneksi.php';
if (isset($_POST['hapus'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM jenis_imunisasi WHERE kd_imunisasi = '$_POST[kd_imunisasi]'");
    if ($hapus) {
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<script>window.location.href='jenis_imunisasi_bidan.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus')</script>";
        echo "<script>window.location.href='jenis_imunisasi_bidan.php'</script>";
    }
}
?>