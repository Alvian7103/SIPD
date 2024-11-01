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
    <title>Data Ibu</title>
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
                    <h1 class="mt-4">Master Data Ibu</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Data Ibu Posyandu Anggrek 1 Desa Tambak</li>
                    </ol>

                    <div class="card mt-6">
                        <div class="card-header bg-primary text-light">
                            <i class="fas fa-table me-1"></i>
                            Data Ibu
                        </div>
                        <?php
                        include 'koneksi.php';
                        $NIK_ibu = $_GET['NIK_ibu'];
                        $query = "SELECT * FROM ibu LEFT JOIN pengguna ON ibu.id_pengguna = pengguna.id_pengguna WHERE ibu.NIK_ibu = '$NIK_ibu'";
                        $tampil = mysqli_query($koneksi, $query);
                        while ($data = mysqli_fetch_array($tampil)) {
                        ?>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="modal-title">Ubah Data <?= $data['nama_ibu'] ?></h4>
                                                <form method="post" action="ubah_ibu_bidan.php">
                                                    <div class="row">
                                                        <div class="form-group col-md-2">
                                                            <label for="NIK_ibu">NIK Ibu</label>
                                                            <input type="text" maxlength="16" name="NIK_ibu" value="<?= $data['NIK_ibu'] ?>" placeholder="NIK Ibu" class="form-control" readonly>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label for="nama_ibu">Nama Ibu</label>
                                                            <input type="text" name="nama_ibu" value="<?= $data['nama_ibu'] ?>" placeholder="Nama Ibu" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-2">
                                                            <label for="tempat_lahir_ibu">Tempat Lahir </label>
                                                            <input type="text" name="tempat_lahir_ibu" value="<?= $data['tempat_lahir_ibu'] ?>" placeholder="Tempat Lahir " class="form-control" required>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="tgl_lahir_ibu">Tanggal Lahir </label>
                                                            <input type="Date" max="<?php echo date('Y-m-d'); ?>" name="tgl_lahir_ibu" value="<?= $data['tgl_lahir_ibu'] ?>" placeholder="Tanggal Lahir" class="form-control" required>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="agama_ibu">Agama Ibu</label>
                                                            <select name="agama_ibu" class="form-control" required>
                                                                <option hidden="<?= $data['agama_ibu'] ?>"><?= $data['agama_ibu'] ?></option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Kristen">Kristen</option>
                                                                <option value="Katolik">Katolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Buddha">Buddha</option>
                                                                <option value="Konghucu">Konghucu</option>
                                                                <option value="Lainnya">Lainnya</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-1">
                                                            <label for="gol_darah_ibu">Gol Darah</label>
                                                            <select name="gol_darah_ibu" class="form-control" required>
                                                                <option hidden="<?= $data['gol_darah_ibu'] ?>"><?= $data['gol_darah_ibu'] ?></option>
                                                                <option value="-">-</option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="AB">AB</option>
                                                                <option value="O">O</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-2">
                                                            <label for="pendidikan_ibu">Pendidikan Terakhir</label>
                                                            <select name="pendidikan_ibu" class="form-control" required>
                                                                <option hidden="<?= $data['pendidikan_ibu'] ?>"><?= $data['pendidikan_ibu'] ?></option>
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
                                                            <label for="pekerjaan_ibu">Pekerjaan</label>
                                                            <input type="text" name="pekerjaan_ibu" value="<?= $data['pekerjaan_ibu'] ?>" placeholder="Pekerjaan" class="form-control" required>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="no_telp_ibu">No Telepon</label>
                                                            <input type="text" maxlength="15" name="no_telp_ibu" value="<?= $data['no_telp_ibu'] ?>" placeholder="No Telepon" class="form-control" required>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="password">Password</label>
                                                            <input type="text" name="password" value="<?= $data['password'] ?>" placeholder="Password" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6 ">
                                                        <label for="alamat_ibu">Alamat</label>
                                                        <textarea class="form-control" name="alamat_ibu" rows="3" required> <?= $data['alamat_ibu'] ?> </textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-2">
                                                            <label for="NIK_suami">NIK Suami</label>
                                                            <input type="text" maxlength="16" name="NIK_suami" value="<?= $data['NIK_suami'] ?>" placeholder="NIK Suami" class="form-control" required>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label for="nama_suami">Nama Suami</label>
                                                            <input type="text" name="nama_suami" value="<?= $data['nama_suami'] ?>" placeholder="Nama Suami" class="form-control" required>
                                                        </div>
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
                                                            <a href="ibu_bidan.php" type="button" class="btn btn-danger w-100">Batal</a>
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
                                                                                } ?>" class="form-control" placeholder="Masukan NIK Ibu atau Nama Ibu">
                                        <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                                <div class="scroll table-responsive">
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
                                                <th>Password</th>
                                                <th>Edit</th>
                                                <th>Hapus</th>
                                            </tr>
                                            <?php
                                            include 'koneksi.php';
                                            $no = 1;

                                            if (isset($_POST['cari'])) {

                                                $key = $_POST['cari'];
                                                $query = "SELECT * FROM ibu LEFT JOIN pengguna ON ibu.id_pengguna = pengguna.id_pengguna WHERE NIK_ibu like '%$key%' or nama_ibu like '%$key%' order by tgl_lahir_ibu DESC  ";
                                            } else {
                                                $query = "SELECT * FROM ibu LEFT JOIN pengguna ON ibu.id_pengguna = pengguna.id_pengguna  order by tgl_lahir_ibu DESC";
                                            }

                                            $tampil = mysqli_query($koneksi, $query);
                                            while ($data = mysqli_fetch_array($tampil)) :
                                            ?>
                                                <tr>
                                                    <td hidden><?= $no++ ?></td>
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
                                                    <td><?= $data['password'] ?></td>
                                                    <td>
                                                        <a href="ubah_ibu_bidan.php?NIK_ibu=<?= $data['NIK_ibu'] ?>" type="button" class="btn btn-warning" data-toggle="modal"><i class="fas fa-pencil-alt"></i> Ubah</a>
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
                                                                        <input type="hidden" name="NIK_ibu" value="<?= $data['NIK_ibu'] ?>">
                                                                        <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ? <br>
                                                                            <span class="text-danger"><?= $data['NIK_ibu'] ?> - <?= $data['nama_ibu'] ?></span>
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
    $NIK_ibu = $_POST['NIK_ibu'];
    $nama_ibu = $_POST['nama_ibu'];
    $tempat_lahir_ibu = $_POST['tempat_lahir_ibu'];
    $tgl_lahir_ibu = $_POST['tgl_lahir_ibu'];
    $agama_ibu = $_POST['agama_ibu'];
    $gol_darah_ibu = $_POST['gol_darah_ibu'];
    $pendidikan_ibu = $_POST['pendidikan_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $alamat_ibu = $_POST['alamat_ibu'];
    $no_telp_ibu = $_POST['no_telp_ibu'];
    $NIK_suami = $_POST['NIK_suami'];
    $nama_suami = $_POST['nama_suami'];
    $password = $_POST['password'];
    $id_pengguna = $_POST['id_pengguna'];
    $password = $_POST['password'];

    $cek_data = mysqli_query($koneksi, "SELECT * FROM ibu WHERE NIK_ibu='$NIK_ibu'");
    $cek = mysqli_num_rows($cek_data);

    if ($cek > 0) {
        echo "<script>alert('Data Ibu Sudah Ada, Silahkan Cek Kembali')</script>";
        echo "<script>window.location.href='ibu_bidan.php'</script>";
    } else {
        $query = "INSERT INTO ibu (NIK_ibu, nama_ibu, tempat_lahir_ibu, tgl_lahir_ibu, agama_ibu, gol_darah_ibu, pendidikan_ibu, pekerjaan_ibu, alamat_ibu, no_telp_ibu, NIK_suami, nama_suami ,password, id_pengguna) VALUES('$NIK_ibu','$nama_ibu','$tempat_lahir_ibu','$tgl_lahir_ibu','$agama_ibu','$gol_darah_ibu','$pendidikan_ibu','$pekerjaan_ibu','$alamat_ibu','$no_telp_ibu','$NIK_suami','$nama_suami','$password','$id_pengguna')";
        $sql = mysqli_query($koneksi, $query);
        if ($sql) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script>window.location.href='ibu_bidan.php'</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan')</script>";
            echo "<script>window.location.href='ibu_bidan.php'</script>";
        }
    }
}
?>


<!-- Edit-->
<?php
include 'koneksi.php';
if (isset($_POST['ubah'])) {

    $ubah = mysqli_query($koneksi, "UPDATE ibu SET nama_ibu = '$_POST[nama_ibu]',tempat_lahir_ibu = '$_POST[tempat_lahir_ibu]', tgl_lahir_ibu = '$_POST[tgl_lahir_ibu]', agama_ibu = '$_POST[agama_ibu]', gol_darah_ibu = '$_POST[gol_darah_ibu]', pendidikan_ibu = '$_POST[pendidikan_ibu]', pekerjaan_ibu = '$_POST[pekerjaan_ibu]', alamat_ibu = '$_POST[alamat_ibu]', no_telp_ibu = '$_POST[no_telp_ibu]', NIK_suami = '$_POST[NIK_suami]',nama_suami = '$_POST[nama_suami]', id_pengguna = '$_POST[id_pengguna]', password = '$_POST[password]' WHERE NIK_ibu = '$_POST[NIK_ibu]'");
    if ($ubah) {
        echo "<script>alert('Data Berhasil Diubah')</script>";
        echo "<script>window.location.href='ibu_bidan.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Diubah')</script>";
        echo "<script>window.location.href='ibu_bidan.php'</script>";
    }
}
?>


<!-- Hapus -->
<?php
include 'koneksi.php';
if (isset($_POST['hapus'])) {

    $hapus = mysqli_query($koneksi, "DELETE FROM ibu WHERE NIK_ibu = '$_POST[NIK_ibu]'");
    if ($hapus) {
        echo "<script>alert('Data Berhasil Dihapus')</script>";
        echo "<script>window.location.href='ibu_bidan.php'</script>";
    } else {
        echo "<script>alert('Data Gagal Dihapus')</script>";
        echo "<script>window.location.href='ibu_bidan.php'</script>";
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