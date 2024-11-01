<?php

include('koneksi.php');
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
    <div class="subjudul">Laporan Data Pengguna</div>
    <div class="subjudul-new">Posyandu Anggrek 1</div>
    <br>


    <table width="100%">
        <thead height="15px">

            <tr>
                <th data-hide="phone">ID Pengguna</th>
                <th data-hide="phone">Nama Pengguna</th>
                <th data-hide="phone">Username</th>
                <th data-hide="phone">Password</th>
                <th data-hide="phone">Level</th>
            </tr>
        </thead>
        <?php
        include 'koneksi.php';
        $query = "SELECT * FROM pengguna order by id_pengguna asc";
        $tampil = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_array($tampil)) :
        ?>
            <tr>
                <td><?= $data['id_pengguna'] ?></td>
                <td><?= $data['nama_pengguna'] ?></td>
                <td><?= $data['username'] ?></td>
                <td><?= $data['password'] ?></td>
                <td><?= $data['level'] ?></td>
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
}
?>