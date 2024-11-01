<div class="row" position="fixed">
    <div class="col-lg-10 col-xl-10">
        <div class="card-box">
            <ul class="nav nav-pills navtab-bg nav-justified">
                <li class="nav-item" style="padding-bottom:10px;">
                    <a href="#aboutme" data-toggle="tab" aria-expanded="true" class="nav-link active">
                        Imunisasi
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#timeline" data-toggle="tab" aria-expanded="true" class="nav-link ">
                        Riwayat
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#settings" data-toggle="tab" aria-expanded="true" class="nav-link">
                        Grafik
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#periksa" data-toggle="tab" aria-expanded="true" class="nav-link">
                        Pemeriksaan
                    </a>
                </li>
            </ul>
            <!--Medical History-->
            <div class="tab-content">
                <div class="tab-pane show active" id="aboutme">
                    <div class="table-responsive">
                        <table class="table table-bordered toggle-circle" data-paging="true" data-page-size="7">
                            <thead>
                                <tr>
                                    <th> Nama Imunisasi</th>
                                    <th data-hide="phone">Petugas</th>
                                    <th data-hide="phone">Tanggal Pemberian</th>
                                </tr>
                            </thead>
                            <?php
                            $pres_pat_number = $_GET['nik'];
                            $ret = "SELECT tb_imunisasi.*, tb_jenis_imun.nama_imun, tb_user.nama_ad FROM tb_imunisasi INNER JOIN tb_jenis_imun ON tb_imunisasi.id_jenis_imun=tb_jenis_imun.id_jenis_imun INNER JOIN tb_user ON tb_imunisasi.ad_id=tb_user.ad_id WHERE nik ='$nik'";
                            $stmt = $mysqli->prepare($ret);
                            // $stmt->bind_param('i',$pres_pat_number );
                            $stmt->execute(); //ok
                            $res = $stmt->get_result();
                            //$cnt=1;

                            while ($row = $res->fetch_object()) {
                                $mysqlDateTime = $row->tgl_imunisasi; //trim timestamp to date

                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row->nama_imun; ?></td>
                                        <td><?php echo $row->nama_ad; ?></td>
                                        <td><?php echo $row->tgl_imunisasi; ?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="active">
                                        <td colspan="7">
                                            <div class="text-right">
                                                <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            <?php } ?>

                        </table>
                    </div>




                </div> <!-- end tab-pane -->
                <!-- end Prescription section content -->

                <div class="tab-pane show " id="timeline">
                    <div class="table-responsive">
                        <table class="table table-bordered toggle-circle" data-paging="true" data-page-size="7">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Umur</th>
                                    <th data-hide="phone">Tinggi Badan</th>
                                    <th data-hide="phone">Berat Badan</th>
                                    <th data-hide="phone">Lingkar Kepala</th>
                                    <th data-hide="phone">Lingkar Lengan</th>
                                    <th data-hide="phone">Tanggal Periksa</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <?php
                            $vit_pat_number = $_GET['nik'];
                            $ret = "SELECT tb_periksa.*, tb_bayi.jenis_kel_by FROM tb_bayi INNER JOIN tb_periksa ON tb_periksa.nik=tb_bayi.nik WHERE tb_periksa.nik ='$nik'";

                            $stmt = $mysqli->prepare($ret);
                            // $stmt->bind_param('i',$vit_pat_number );
                            $stmt->execute(); //ok
                            $res = $stmt->get_result();
                            $cnt = 1;

                            while ($row = $res->fetch_object()) {
                                $mysqlDateTime = $row->tgl_timbang; //trim timestamp to date

                            ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $cnt; ?></td>
                                        <td><?php echo $row->umur_by; ?> bln</td>
                                        <td><?php echo $row->tinggi_by; ?> cm</td>
                                        <td><?php echo $row->berat_by; ?> kg</td>
                                        <td><?php echo $row->lingkar_kpl; ?> cm</td>
                                        <td><?php echo $row->lingkar_lgn; ?> cm</td>
                                        <td><?php echo $row->tgl_timbang; ?></td>
                                        <td>
                                            <ul style="padding-left:10px;">
                                                <li>
                                                    <?php

                                                    // Asumsi $row adalah objek yang berisi data yang diambil dari database
                                                    $umur_by = $row->umur_by;
                                                    $berat_by = $row->berat_by;
                                                    $jenis_kel_by = $row->jenis_kel_by;
                                                    if (!function_exists('determineBBU')) {
                                                        function determineBBU($jenis_kel_by, $umur_by, $berat_by)
                                                        {
                                                            $bb_u = "BB/U: Tidak Diketahui"; // Nilai default

                                                            $weight_ranges_file = 'assets/inc/weight_range.json';
                                                            $weight_ranges_data = file_get_contents($weight_ranges_file);
                                                            $weight_ranges = json_decode($weight_ranges_data, true);

                                                            // Periksa apakah jenis kelamin dan umur memiliki rentang berat yang didefinisikan
                                                            if (isset($weight_ranges[$jenis_kel_by][$umur_by])) {
                                                                // Ambil rentang berat untuk umur dan jenis kelamin tertentu
                                                                list($min_weight, $mid_weight, $max_weight) = $weight_ranges[$jenis_kel_by][$umur_by];

                                                                // Tentukan status BB/U berdasarkan rentang berat
                                                                if ($berat_by < $min_weight) {
                                                                    $bb_u = "BB/U: Sangat Kurang";
                                                                } elseif ($berat_by >= $min_weight && $berat_by < $mid_weight) {
                                                                    $bb_u = "BB/U: Kurang";
                                                                } elseif ($berat_by >= $mid_weight && $berat_by <= $max_weight) {
                                                                    $bb_u = "BB/U: Normal";
                                                                } elseif ($berat_by > $max_weight) {
                                                                    $bb_u = "BB/U: Berlebihan";
                                                                }
                                                            }

                                                            return $bb_u;
                                                        }
                                                    }

                                                    // Panggil fungsi determineBBU dan cetak hasilnya
                                                    $bb_u = determineBBU($jenis_kel_by, $umur_by, $berat_by);
                                                    echo $bb_u;

                                                    ?>

                                                </li>


                                                <li>
                                                    <?php

                                                    //  $row adalah objek yang berisi data yang diambil dari database
                                                    $umur_by = $row->umur_by;
                                                    $tinggi_by = $row->tinggi_by;
                                                    $jenis_kel_by = $row->jenis_kel_by;
                                                    if (!function_exists('determineTBU')) {
                                                        function determineTBU($jenis_kel_by, $umur_by, $tinggi_by)
                                                        {
                                                            $tb_u = "TB/U: Tidak Diketahui"; // Nilai default

                                                            $height_ranges_file = 'assets/inc/height_range.json';
                                                            $height_ranges_data = file_get_contents($height_ranges_file);
                                                            $height_ranges = json_decode($height_ranges_data, true);

                                                            // Periksa apakah jenis kelamin dan umur memiliki rentang berat yang didefinisikan
                                                            if (isset($height_ranges[$jenis_kel_by][$umur_by])) {
                                                                // Ambil rentang berat untuk umur dan jenis kelamin tertentu
                                                                list($min_height, $mid_height, $max_height) = $height_ranges[$jenis_kel_by][$umur_by];

                                                                // Tentukan status BB/U berdasarkan rentang berat
                                                                if ($tinggi_by < $min_height) {
                                                                    $tb_u = "TB/U: Sangat Pendek";
                                                                } elseif ($tinggi_by >= $min_height && $tinggi_by < $mid_height) {
                                                                    $tb_u = "TB/U: Pendek";
                                                                } elseif ($tinggi_by >= $mid_height && $tinggi_by <= $max_height) {
                                                                    $tb_u = "TB/U: Normal";
                                                                } elseif ($tinggi_by > $max_height) {
                                                                    $tb_u = "TB/U: Tinggi";
                                                                }
                                                            }

                                                            return $tb_u;
                                                        }
                                                    }

                                                    // Panggil fungsi determineBBU dan cetak hasilnya
                                                    $tb_u = determineTBU($jenis_kel_by, $umur_by, $tinggi_by);
                                                    echo $tb_u;

                                                    ?>

                                                </li>

                                                <li>
                                                    <?php

                                                    //  $row adalah objek yang berisi data yang diambil dari database
                                                    $umur_by = $row->umur_by;
                                                    $tinggi_by = $row->tinggi_by;
                                                    $berat_by = $row->berat_by;
                                                    $jenis_kel_by = $row->jenis_kel_by;
                                                    $tinggiM = $tinggi_by / 100;
                                                    $tinggiM2 = $tinggiM * $tinggiM;
                                                    $IMT_by = $berat_by / $tinggiM2;

                                                    if (!function_exists('determineIMTU')) {
                                                        function determineIMTU($jenis_kel_by, $umur_by, $IMT_by)
                                                        {
                                                            $imt_u = "IMT/U: Tidak Diketahui"; // Nilai default

                                                            $IMT_ranges_file = 'assets/inc/IMT_range.json';
                                                            $IMT_ranges_data = file_get_contents($IMT_ranges_file);
                                                            $IMT_ranges = json_decode($IMT_ranges_data, true);

                                                            // Periksa apakah jenis kelamin dan umur memiliki rentang berat yang didefinisikan
                                                            if (isset($IMT_ranges[$jenis_kel_by][$umur_by])) {
                                                                // Ambil rentang berat untuk umur dan jenis kelamin tertentu
                                                                list($SD_3, $SD_2, $SD1, $SD2, $SD3) = $IMT_ranges[$jenis_kel_by][$umur_by];

                                                                // Tentukan status BB/U berdasarkan rentang berat
                                                                if ($IMT_by < $SD_3) {
                                                                    $imt_u = "IMT/U: Gizi Buruk";
                                                                } elseif ($IMT_by >= $SD_3 && $IMT_by < $SD_2) {
                                                                    $imt_u = "IMT/U: Gizi Kurang";
                                                                } elseif ($IMT_by >= $SD_2 && $IMT_by <= $SD1) {
                                                                    $imt_u = "IMT/U: Gizi Baik";
                                                                } elseif ($IMT_by > $SD1 && $IMT_by <= $SD2) {
                                                                    $imt_u = "IMT/U: Risiko Gizi Lebih";
                                                                } elseif ($IMT_by > $SD2 && $IMT_by <= $SD3) {
                                                                    $imt_u = "IMT/U: Gizi Lebih";
                                                                } elseif ($IMT_by > $SD3) {
                                                                    $imt_u = "IMT/U: Obesitas";
                                                                }
                                                            }

                                                            return $imt_u;
                                                        }
                                                    }

                                                    // Panggil fungsi determineBBU dan cetak hasilnya
                                                    $imt_u = determineIMTU($jenis_kel_by, $umur_by, $IMT_by);
                                                    echo $imt_u;

                                                    ?>

                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php $cnt = $cnt + 1;
                            } ?>

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
                <!-- end vitals content-->

                <div class="tab-pane" id="settings" style="overflow-y:scroll;">
                    <div><canvas id="myChart" width="800" height="500"></canvas></div>
                    <?php
                    include('assets/inc/config.php');

                    // Mengambil data dari database
                    $nik = $_GET['nik'];
                    $sql = "SELECT umur_by, berat_by, tinggi_by FROM tb_periksa WHERE nik ='$nik'"; // Ubah "data_chart" dengan nama tabel yang sesuai
                    $result = $mysqli->query($sql);

                    $labels = [];
                    $data = [];
                    $data2 = [];

                    if ($result->num_rows > 0) {
                        // Output data setiap baris
                        while ($row = $result->fetch_assoc()) {
                            $labels[] = $row["umur_by"];
                            $data[] = $row["berat_by"];
                            $data2[] = $row["tinggi_by"];
                        }
                    } else {
                        echo "0 results";
                    }

                    // Menutup koneksi

                    ?>

                    <script>
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: <?php echo json_encode($labels); ?>,
                                datasets: [{
                                    label: 'Berat Bayi',
                                    data: <?php echo json_encode($data); ?>,
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1,
                                    tension: 0.4
                                }, {
                                    label: 'Tinggi Bayi',
                                    data: <?php echo json_encode($data2); ?>,
                                    backgroundColor: 'rgba(245, 40, 145, 0.8)',
                                    borderColor: 'rgba(245, 40, 145, 0.8)',
                                    borderWidth: 1,
                                    tension: 0.4
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>

                </div>

                <div class="tab-pane show " id="periksa">
                    <div class="table-responsive">
                        <table class="table table-bordered toggle-circle" data-paging="true" data-page-size="7">
                            <thead>
                                <tr>

                                    <th data-hide="phone">Tgl Periksa</th>
                                    <th>Pemeriksaan/Keluhan</th>

                                </tr>
                            </thead>
                            <?php
                            $vit_pat_number = $_GET['nik'];
                            $ret = "SELECT  * FROM tb_pemeriksaan_by WHERE nik ='$nik'";
                            $stmt = $mysqli->prepare($ret);
                            // $stmt->bind_param('i',$vit_pat_number );
                            $stmt->execute(); //ok
                            $res = $stmt->get_result();
                            $cnt = 1;

                            while ($row = $res->fetch_object()) {
                                $mysqlDateTime = $row->tgl_pemeriksaan_by; //trim timestamp to date

                            ?>
                                <tbody>
                                    <tr>

                                        <td><?php echo $row->tgl_pemeriksaan_by; ?></td>
                                        <td><?php echo $row->periksa_by; ?></td>


                                    </tr>
                                </tbody>
                            <?php $cnt = $cnt + 1;
                            } ?>

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

                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/footable/3.1.6/footable.min.js"></script>
                        <script>
                            $(function() {
                                $('.table').footable();
                            });
                        </script>
                    </div>
                </div>
            </div>
            <!-- end lab records content-->