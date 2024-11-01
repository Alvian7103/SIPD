<!DOCTYPE html>
<html lang="en">
<?php include "koneksi.php" ?>


<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include('assets/inc/nav.php'); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">

                                <h4 class="page-title" style="color:transparent; font-size:15px; ">Data Balita</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title"></h4>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-12 text-sm-center form-inline">
                                            <div class="form-group mr-2" style="display:none">
                                                <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                    <option value="">Show all</option>
                                                    <option value="Discharged">Discharged</option>
                                                    <option value="OutPatients">OutPatients</option>
                                                    <option value="InPatients">InPatients</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                                <div style="color:transparent">xxx</div>
                                                <a href="#ModalTambah-balita" class="ladda-button btn btn-info btn-sm" data-toggle="modal" data-target="#ModalTambah-balita"><i class="fas fa-plus "></i> Tambah</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Tambah Balita -->
                                <div class="modal" id="ModalTambah-balita">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content" style="background-color:#F2F2F2;">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Tambah Data Balita</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="card">
                                                            <div class="card-body">

                                                                <form method="post">
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Masukkan Data Balita</label>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">NIK</label>
                                                                        <input type="text" required="required" name="nik" class="form-control" placeholder="Masukkan NIK Balita">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Nama Balita</label>
                                                                        <input type="text" required="required" name="nama_by" class="form-control" placeholder="Masukkan Nama Balita">
                                                                    </div>
                                                                    <div class="form-row">
                                                                        <div class="form-group col-md-4">
                                                                            <label class="col-form-label">Tempat Lahir</label>
                                                                            <input type="text" required="required" name="tempat_lhr_by" class="form-control" placeholder="Masukkan Nama Balita">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label class="col-form-label">Tanggal Lahir</label>
                                                                            <input type="date" max="<?php echo date('Y-m-d'); ?>" required="required" name="tgl_lhr_by" class="form-control" placeholder="Masukkan Nama Balita">
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="inputCity" class="col-form-label">Jenis Kelamin</label>
                                                                            <select required="required" type="text" name="jenis_kel_by" class="form-control" id="jenis_kel_by">
                                                                                <option hidden>Pilih Jenis Kelamin</option>
                                                                                <option>Laki-laki</option>
                                                                                <option>Perempuan</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <br>

                                                                    <div class="modal-footer d-flex justify-content-start">
                                                                        <button type="submit" name="tambah_balita" class="ladda-button btn btn-primary" data-style="expand-right">Simpan</button>
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                                    </div>

                                                                    <br>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="card">
                                                            <div class="card-body">



                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="inputEmail4" class="col-form-label">Masukkan Data Orang Tua</label>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="inputEmail4" class="col-form-label">NIK Ibu</label>
                                                                        <input type="text" required="required" name="nik_ibu" class="form-control" id="nik_ibu" placeholder="Masukkan NIK Ibu">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="inputEmail4" class="col-form-label">Nama Ibu</label>
                                                                        <input type="text" required="required" name="nama_ibu" class="form-control" id="nama_ibu" placeholder="Masukkan nama ibu">
                                                                    </div>

                                                                </div>



                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="inputEmail4" class="col-form-label">Nama Ayah</label>
                                                                        <input type="text" required="required" name="nama_ayah" class="form-control" id="nama_ayah" placeholder="Masukkan nama ayah">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="inputAddress" class="col-form-label">Alamat</label>
                                                                        <textarea required="required" type="text" class="form-control" name="alamat_ortu" id="alamat_ortu" placeholder="Masukkan Alamat"> </textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label for="inputAddress" class="col-form-label">Nomor Telepon</label>
                                                                        <input required="required" type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan nomor telepon">
                                                                    </div>
                                                                </div>
                                                                <br>



                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <!-- end modal -->




                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th data-toggle="true">NIK</th>
                                                <th data-hide="phone">Nama Balita</th>
                                                <th data-hide="phone">Tempat Lahir</th>
                                                <th data-hide="phone">Tgl Lahir</th>
                                                <th data-hide="phone">Jenis Kelamin</th>
                                                <th data-hide="phone">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        /*
                                                *get details of allpatients
                                                *
                                            */
                                        $ret = "SELECT * FROM tb_bayi";
                                        //sql code to get to ten docs  randomly
                                        $stmt = $mysqli->prepare($ret);
                                        $stmt->execute(); //ok
                                        $res = $stmt->get_result();
                                        $cnt = 1;
                                        while ($row = $res->fetch_object()) {
                                        ?>

                                            <tbody>
                                                <tr>
                                                    <td><?php echo $cnt; ?></td>
                                                    <td><?php echo $row->nik; ?> </td>
                                                    <td><?php echo $row->nama_by; ?></td>
                                                    <td><?php echo $row->tempat_lhr_by; ?></td>
                                                    <td><?php echo $row->tgl_lhr_by; ?></td>
                                                    <td><?php echo $row->jenis_kel_by; ?></td>


                                                    <td><a href="#ModalEdit-balita" type="button" class="badge badge-warning" data-toggle="modal" data-target="#ModalEdit-balita<?php echo $row->nik; ?>"><i class="fas fa-clipboard-check "></i> Edit</a>

                                                        <!-- Modal Edit Balita -->
                                                        <div class="modal" id="ModalEdit-balita<?php echo $row->nik; ?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Data Balita</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->

                                                                    <div class="modal-body">
                                                                        <form method="post">
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">NIK</label>
                                                                                <input type="text" required="required" name="nik" value="<?php echo $row->nik; ?>" class="form-control" placeholder="Masukkan NIK Balita">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">Nama Balita</label>
                                                                                <input type="text" required="required" name="nama_by" value="<?php echo $row->nama_by; ?>" class="form-control" placeholder="Masukkan Nama Balita">
                                                                            </div>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-md-4">
                                                                                    <label class="col-form-label">Tempat Lahir</label>
                                                                                    <input type="text" required="required" name="tempat_lhr_by" value="<?php echo $row->tempat_lhr_by; ?>" class="form-control" placeholder="Masukkan Nama Balita">
                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                    <label class="col-form-label">Tanggal Lahir</label>
                                                                                    <input type="date" max="<?php echo date('Y-m-d'); ?>" required="required" name="tgl_lhr_by" value="<?php echo $row->tgl_lhr_by; ?>" class="form-control" placeholder="Masukkan Nama Balita">
                                                                                </div>
                                                                                <div class="form-group col-md-4">
                                                                                    <label for="inputCity" class="col-form-label">Jenis Kelamin</label>
                                                                                    <select required="required" type="text" name="jenis_kel_by" class="form-control" id="jenis_kel_by">
                                                                                        <option hidden><?php echo $row->jenis_kel_by; ?></option>
                                                                                        <option>Laki-laki</option>
                                                                                        <option>Perempuan</option>
                                                                                    </select>
                                                                                </div>

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="col-form-label">NIK Ibu</label>
                                                                                <input type="text" required="required" name="nik_ibu" value="<?php echo $row->nik_ibu; ?>" class="form-control" placeholder="Masukkan Nama Balita">
                                                                            </div>



                                                                            <br>

                                                                            <div class="modal-footer">
                                                                                <button type="submit" name="update_balita" class="ladda-button btn btn-primary" data-style="expand-right">Simpan</button>
                                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end modal -->




                                                        <?php if ($level_ad == "Bidan") : ?>
                                                            <a href="master_balita.php?hapus_balita=<?php echo $row->nik; ?>" class="badge badge-danger"><i class="fas fa-trash-alt "></i> Hapus</a>
                                                        <?php else : ?>
                                                            <!-- Tindakan jika $level_ad tidak sama dengan "Bidan" -->
                                                        <?php endif; ?>

                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php $cnt = $cnt + 1;
                                        } ?>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="8">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> <!-- end .table-responsive-->
                            </div> <!-- end card-box -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include('assets/inc/footer.php'); ?>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>

    <!-- Init js -->
    <script src="assets/js/pages/foo-tables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>