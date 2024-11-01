<?php
require_once 'tcpdf/tcpdf.php';
include 'koneksi.php';

// Get filter inputs
$tgl_awal = isset($_POST['tgl_awal']) ? $_POST['tgl_awal'] : '';
$tgl_akhir = isset($_POST['tgl_akhir']) ? $_POST['tgl_akhir'] : '';


// SQL query to fetch data
$sql = "SELECT * FROM penimbangan_pengukuran LEFT JOIN pengguna ON penimbangan_pengukuran.id_pengguna = pengguna.id_pengguna JOIN registrasi ON penimbangan_pengukuran.no_reg = registrasi.no_reg JOIN balita ON registrasi.NIK_balita = balita.NIK_balita
        WHERE (penimbangan_pengukuran.tgl_timbang BETWEEN '$tgl_awal' AND '$tgl_akhir' 
        OR ('$tgl_awal' = '' AND '$tgl_akhir' = '')) 
        ORDER BY penimbangan_pengukuran.no_timbang ASC";  // Ensure ordering by tgl_kunj

$result = mysqli_query($koneksi, $sql);

// HTML content for the PDF
$html = '<h1>Data Penimbangan & Pengukuran</h1>
        <table border="1" cellpadding="5">
        <thead>
          <tr>
             <th>Tanggal Pelayanan</th>
             <th>No Registrasi</th>
             <th>Balita</th>
             <th>Tanggal Lahir Balita</th>
             <th>Kader/Bidan</th>
             <th>BB</th>
             <th>TB</th>
          </tr>
        </thead>
        <tbody>';

$no = 1;
while ($row = mysqli_fetch_array($result)) {
        $html .= '<tr>
              
              <td>' . $row['tgl_timbang'] . '</td>
              <td>' . $row['no_reg'] . '</td>
              <td>' . $row['nama_balita'] . '</td>
              <td>' . $row['tgl_lahir_balita'] . '</td>
              <td>' . $row['nama_pengguna'] . '</td>
              <td>' . $row['BB'] . '</td>
              <td>' . $row['TB'] . '</td>
            </tr>';
}

$html .= '</tbody></table>';

// Create PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Posyandu');
$pdf->SetTitle('Data Penimbangan dan Pengukuran');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Last page
$pdf->lastPage();

// Output the PDF
$pdf->Output('Data Penimbangan dan Pengukuran.pdf', 'I');
