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
    <title>Data Kader</title>
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
                    <h1 class="mt-4">Master Data Kader</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Data Kader Posyandu Anggrek 1 Desa Tambak</li>
                    </ol>
                    <div class="card mt-3">
                        <div class="card-header bg-primary text-light">
                            <i class="fas fa-table me-1"></i>
                            Data Kader
                        </div>
                        <?php
                        include 'koneksi.php';
                        $NIK_kader = $_GET['NIK_kader'];
                        $query = "SELECT * FROM kader LEFT JOIN pengguna ON kader.id_pengguna = pengguna.id_pengguna WHERE kader.NIK_kader= '$NIK_kader'";
                        $tampil = mysqli_query($koneksi, $query);
                        while ($data = mysqli_fetch_array($tampil)) {
                        ?>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="modal-title">Ubah Data <?= $data['nama_kader'] ?></h4>
                                                <form method="post">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-md-2">
                                                                <label for="NIK_kader">NIK Kader</label>
                                                                <input type="number" name="NIK_kader" value="<?= $data['NIK_kader'] ?>" placeholder="NIK Kader" class="form-control" readonly>
                                                            </div>
                                                            <div class="form-group col-md-5">
                                                                <label for="nama_kader">Nama Kader</label>
                                                                <input type="text" name="nama_kader" value="<?= $data['nama_kader'] ?>" placeholder="Nama Kader" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-2">
                                                                <label for="tempat_lahir_kader">Tempat Lahir </label>
                                                                <input type="text" name="tempat_lahir_kader" value="<?= $data['tempat_lahir_kader'] ?>" placeholder="Tempat Lahir " class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="tgl_lahir_kader">Tanggal Lahir </label>
                                                                <input type="Date" name="tgl_lahir_kader" value="<?= $data['tgl_lahir_kader'] ?>" placeholder="Tanggal Lahir" class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="agama_kader">Agama Kader</label>
                                                                <select name="agama_kader" class="form-control" required>
                                                                    <option hidden="<?= $data['agama_kader'] ?>"><?= $data['agama_kader'] ?></option>
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
                                                        <div class="row">
                                                            <div class="form-group col-md-2">
                                                                <label for="gol_darah_kader">Jenis Golongan Darah</label>
                                                                <select name="gol_darah_kader" class="form-control" required>
                                                                    <option hidden="<?= $data['gol_darah_kader'] ?>"><?= $data['gol_darah_kader'] ?></option>
                                                                    <option value="-">-</option>
                                                                    <option value="A">A</option>
                                                                    <option value="B">B</option>
                                                                    <option value="AB">AB</option>
                                                                    <option value="O">O</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="pendidikan_kader">Pendidikan Terakhir</label>
                                                                <select name="pendidikan_kader" class="form-control" required>
                                                                    <option hidden="<?= $data['pendidikan_kader'] ?>"><?= $data['pendidikan_kader'] ?></option>
                                                                    <option value="">Pilih Pendidikan Terakhir</option>
                                                                    <option value="-">-</option>
                                                                    <option value="SD">SD</option>
                                                                    <option value="SMP">SMP</option>
                                                                    <option value="SMA">SMA</option>
                                                                    <option value="DIPLOMA">DIPLOMA</option>
                                                                    <option value="STRATA 1">STRATA 1</option>
                                                                    <option value="STRATA 2">STRATA 2</option>
                                                                    <option value="STRATA 3">STRATA 3</option>
                                                                    <option value="Lainnya">Lainnya</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-2">
                                                                <label for="pekerjaan_kader">Pekerjaan</label>
                                                                <input type="text" name="pekerjaan_kader" value="<?= $data['pekerjaan_kader'] ?>" placeholder="Pekerjaan" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="alamat_kader">Alamat</label>
                                                            <textarea class="form-control" name="alamat_kader" rows="3" required> <?= $data['alamat_kader'] ?> </textarea>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-2">
                                                                <label for="no_telp_kader">No Telepon</label>
                                                                <input type="number" name="no_telp_kader" value="<?= $data['no_telp_kader'] ?>" placeholder="No Telepon" class="form-control" required>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="id_pengguna">ID Pengguna (* Pilih Sesuai Nama Kader)</label>
                                                                <select name="id_pengguna" class="form-control" required>
                                                                    <option value="<?= $data['id_pengguna'] ?>"><?= $data['id_pengguna'] ?></option>
                                                                    <?php
                                                                    include "koneksi.php";
                                                                    $query = mysqli_query($koneksi, "SELECT * FROM pengguna") or die(mysqli_error($koneksi));
                                                                    while ($data = mysqli_fetch_array($query)) {
                                                                        echo "<option value=$data[id_pengguna]> $data[id_pengguna]-$data[nama_pengguna] </option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <button type="submit" class="btn btn-primary w-100" name="ubah">Ubah</button>
                                                        </div>
                                                        <div class="col-md-auto"></div>
                                                        <div class="col-md-5">
                                                            <a href="kader_bidan.php" type="button" class="btn btn-danger w-100">Batal</a>
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
                                                                                } ?>" class="form-control" placeholder="Masukan NIK Kader atau Nama Kader ">
                                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                                <div class="scroll table-responsive">
                                    <table class="table table-bordered table-striped text-center ">
                                        <!-- /.card-header -->
                                        <div class="card-body">

                                            <tr>
                                                <th>ID</th>
                                                <th>NIK Kader</th>
                                                <th>Nama Kader</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Usia</th>
                                                <th>Agama</th>
                                                <th>Golongan Darah</th>
                                                <th>Pendidikan</th>
                                                <th>Pekerjaan</th>
                                                <th>Alamat</th>
                                                <th>No Telepon</th>
                                                <th>Edit</th>
                                                <th>Hapus</th>
                                            </tr>
                                            <?php
                                            include 'koneksi.php';
                                            $no = 1;

                                            if (isset($_POST['cari'])) {

                                                $key = $_POST['cari'];
                                                $query = "SELECT * FROM kader LEFT JOIN pengguna ON kader.id_pengguna = pengguna.id_pengguna WHERE NIK_kader like '%$key%' or nama_kader like '%$key%' or alamat_kader like '%$key%' order by 
                      nama_kader asc  ";
                                            } else {
                                                $query = "SELECT * FROM kader LEFT JOIN pengguna ON kader.id_pengguna = pengguna.id_pengguna order by nama_kader asc";
                                            }

                                            $tampil = mysqli_query($koneksi, $query);
                                            while ($data = mysqli_fetch_array($tampil)) :
                                            ?>
                                                <tr>
                                                    <td hidden><?= $no++ ?></td>
                                                    <td><?= $data['id_pengguna'] ?></td>
                                                    <td><?= $data['NIK_kader'] ?></td>
                                                    <td><?= $data['nama_kader'] ?></td>
                                                    <td><?= $data['tempat_lahir_kader'] ?></td>
                                                    <td><?php if ($data['tgl_lahir_kader'] == "0000-00-00") {
                                                            echo "-";
                                                        } else {
                                                            echo tgl_indo($data['tgl_lahir_kader']);
                                                        } ?></td>
                                                    <td><?php if ($data['tgl_lahir_kader'] == "0000-00-00") {
                                                            echo "-";
                                                        } else {
                                                            echo usia($data['tgl_lahir_kader']);
                                                        } ?></td>
                                                    <td><?= $data['agama_kader'] ?></td>
                                                    <td><?= $data['gol_darah_kader'] ?></td>
                                                    <td><?= $data['pendidikan_kader'] ?></td>
                                                    <td><?= $data['pekerjaan_kader'] ?></td>
                                                    <td><?= $data['alamat_kader'] ?></td>
                                                    <td>0<?= $data['no_telp_kader'] ?></td>


                                                    <td>
                                                        <a href="ubah_kader_bidan.php?NIK_kader=<?= $data['NIK_kader'] ?>" type="button" class="btn btn-warning" data-toggle="modal"><i class="fas fa-pencil-alt"></i> Ubah</a>
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
                                                                        <input type="hidden" name="NIK_kader" value="<?= $data['NIK_kader'] ?>">
                                                                        <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ? <br>
                                                                            <span class="text-danger"><?= $data['NIK_kader'] ?> - <?= $data['nama_kader'] ?></span>
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
    $NIK_kader = $_POST['NIK_kader'];
    $nama_kader = $_POST['nama_kader'];
    $tempat_lahir_kader = $_POST['tempat_lahir_kader'];
    $tgl_lahir_kader = $_POST['tgl_lahir_kader'];
    $agama_kader = $_POST['agama_kader'];
    $gol_darah_kader = $_POST['gol_darah_kader'];
    $pendidikan_kader = $_POST['pendidikan_kader'];
    $pekerjaan_kader = $_POST['pekerjaan_kader'];
    $alamat_kader = $_POST['alamat_kader'];
    $no_telp_kader = $_POST['no_telp_kader'];
    $id_pengguna = $_POST['id_pengguna'];


    $cek_data = mysqli_query($koneksi, "SELECT * FROM kader WHERE NIK_kader='$NIK_kader'");
    $cek = mysqli_num_rows($cek_data);

    if ($cek > 0) {
        echo "<script>alert('Data Kader Sudah Ada, Silahkan Cek Kembali')</script>";
        echo "<script>window.location.href='kader_bidan.php'</script>";
    } else {
        $query = "INSERT INTO kader (NIK_kader, nama_kader, tempat_lahir_kader, tgl_lahir_kader, agama_kader, gol_darah_kader, pendidikan_kader, pekerjaan_kader, alamat_kader, no_telp_kader, id_pengguna) VALUES('$NIK_kader','$nama_kader','$tempat_lahir_kader','$tgl_lahir_kader','$agama_kader','$gol_darah_kader','$pendidikan_kader','$pekerjaan_kader','$alamat_kader','$no_telp_kader','$id_pengguna')";
        $sql = mysqli_query($koneksi, $query);
        if ($sql) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script>window.location.href='kader_bidan.php'</script>";
        } else {
            echo "<script>alert('ID Telah Digunakan')</script>";
            echo "<script>window.location.href='kader_bidan.php'</script>";
        }
    }
}
?>


<!-- Edit-->
<?php
include 'koneksi.php';
if (isset($_POST['ubah'])) {

    $ubah = mysqli_query($koneksi, "UPDATE kader SET  nama_kader = '$_POST[nama_kader]', tempat_lahir_kader = '$_POST[tempat_lahir_kader]', tgl_lahir_kader = '$_POST[tgl_lahir_kader]', agama_kader = '$_POST[agama_kader]', gol_darah_kader = '$_POST[gol_darah_kader]', pendidikan_kader = '$_POST[pendidikan_kader]', pekerjaan_kader = '$_POST[pekerjaan_kader]', alamat_kader = '$_POST[alamat_kader]', no_telp_kader = '$_POST[no_telp_kader]', id_pengguna = '$_POST[id_pengguna]' WHERE NIK_kader = '$_POST[NIK_kader]'");
    if ($ubah) {
        echo "<script>alert('Data Berhasil Diubah')</script>";
        echo "<script>window.location.href='kader_bidan.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah')</script>";
        echo "<script>window.location.href='kader_bidan.php'</script>";
    }
}
?>


<!-- Hapus -->
<?php
include 'koneksi.php';
if (isset($_POST['hapus'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM kader WHERE NIK_kader = '$_POST[NIK_kader]'");
    if ($hapus) {
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<script>window.location.href='kader_bidan.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus')</script>";
        echo "<script>window.location.href='kader_bidan.php'</script>";
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
}
?>