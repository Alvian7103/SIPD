<?php
require_once 'tcpdf/tcpdf.php';
include 'koneksi.php';

// Get filter inputs
$tgl_awal = isset($_POST['tgl_awal']) ? $_POST['tgl_awal'] : '';
$tgl_akhir = isset($_POST['tgl_akhir']) ? $_POST['tgl_akhir'] : '';


// SQL query to fetch data
$sql = "SELECT * FROM imunisasi LEFT JOIN jenis_imunisasi ON imunisasi.kd_imunisasi = jenis_imunisasi.kd_imunisasi JOIN registrasi ON imunisasi.no_reg = registrasi.no_reg JOIN balita ON registrasi.NIK_balita = balita.NIK_balita
        WHERE (imunisasi.tgl_imunisasi BETWEEN '$tgl_awal' AND '$tgl_akhir' 
        OR ('$tgl_awal' = '' AND '$tgl_akhir' = '')) 
        ORDER BY imunisasi.no_imunisasi ASC";  // Ensure ordering by tgl_kunj

$result = mysqli_query($koneksi, $sql);

// HTML content for the PDF
$html = '<h1>Data Imunisasi</h1>
        <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>Tanggal Imunisasi</th>
                                                <th>No Registrasi</th>
                                                <th>Balita</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Imunisasi</th>
                                                <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>';

$no = 1;
while ($row = mysqli_fetch_array($result)) {
  $html .= '<tr>
              
              <td>' . $row['tgl_imunisasi'] . '</td>
              <td>' . $row['no_reg'] . '</td>
              <td>' . $row['nama_balita'] . '</td>
              <td>' . $row['tgl_lahir_balita'] . '</td>
              <td>' . $row['nama_imunisasi'] . '</td>
              <td>' . $row['ket_imunisasi'] . '</td>
             
            </tr>';
}

$html .= '</tbody></table>';

// Create PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Posyandu');
$pdf->SetTitle('Data Imunisasi');
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
$pdf->Output('Data Imunisasi.pdf', 'I');
