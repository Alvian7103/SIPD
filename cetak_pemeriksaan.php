<?php

include('koneksi.php');
$tgl_awal = isset($_POST['tgl_awal']) ? $_POST['tgl_awal'] : '';
$tgl_akhir = isset($_POST['tgl_akhir']) ? $_POST['tgl_akhir'] : '';

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>

    <style>
        table,
        th,
        td {
            font-size: 11pt;
            border: 2px solid;
            border-collapse: collapse;
            text-align: left;
        }

        th,
        td {
            height: 10px;
            padding: 10px;
        }

        .subjudul {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;

        }

        .subjudul-new {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            padding-top: 5px;
            padding-bottom: 15px;

        }

        h2 {
            text-align: center;
            line-height: 0, 5;
        }

        p {
            text-align: center;
            line-height: 0;
            padding-bottom: 15px;
        }

        body {
            size: A4;
            margin-top: 19;
        }
    </style>

    <h2>POSYANDU ANGGREK 1 DESA TAMBAK</h2>
    <p id="p1">Ds. Tambak, Kec. Karangdowo, Kab. Klaten</p>
    <hr size="2px" color="black">
    <br>
    <div class="subjudul">Laporan Data Pemeriksaan</div>
    <div class="subjudul-new">Posyandu Anggrek 1</div>
    <br>


    <table width="100%">
        <thead height="15px">

            <tr>
                <th data-hide="phone">Tanggal Pemeriksaan</th>
                <th data-hide="phone">ID Balita</th>
                <th data-hide="phone">Balita</th>
                <th data-hide="phone">Usia</th>
                <th data-hide="phone">Hasil</th>
                <th data-hide="phone">Vitamin A</th>
                <th data-hide="phone">Obat Cacing</th>
                <th data-hide="phone">Pemeriksaan Lanjutan</th>
                <th data-hide="phone">Kader/Bidan</th>
            </tr>
        </thead>
        <?php
        $query = "SELECT * FROM pemeriksaan 
              LEFT JOIN pengguna ON pemeriksaan.id_pengguna = pengguna.id_pengguna 
              JOIN balita ON pemeriksaan.id_balita = balita.id_balita where (pemeriksaan.tgl_periksa BETWEEN '$tgl_awal' AND '$tgl_akhir' 
        OR ('$tgl_awal' = '' AND '$tgl_akhir' = '')) 
        ORDER BY pemeriksaan.no_periksa ASC";
        $tampil = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_array($tampil)) :
        ?>
            <tr>
                <td><?php if ($data['tgl_periksa'] == "0000-00-00") {
                        echo "-";
                    } else {
                        echo tgl_indo($data['tgl_periksa']);
                    } ?></td>
                <td><?= $data['id_balita'] ?></td>
                <td><?= $data['nama_balita'] ?></td>
                <td><?php if ($data['tgl_lahir_balita'] == "0000-00-00") {
                        echo "-";
                    } else {
                        echo usia($data['tgl_lahir_balita']);
                    } ?></td>
                <td><?= $data['hasil'] ?></td>
                <td><?= $data['vitA'] ?></td>
                <td><?= $data['obat_cacing'] ?></td>
                <td><?= $data['pemeriksaan_lanjutan'] ?></td>
                <td><?= $data['nama_pengguna'] ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>


    </table>


    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>

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