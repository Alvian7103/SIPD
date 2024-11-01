<?php
require_once 'tcpdf/tcpdf.php';
include 'koneksi.php';

// Get filter inputs
$tgl_awal = isset($_POST['tgl_awal']) ? $_POST['tgl_awal'] : '';
$tgl_akhir = isset($_POST['tgl_akhir']) ? $_POST['tgl_akhir'] : '';

// SQL query to fetch data
$query = "SELECT registrasi.*, balita.nama_balita, balita.tgl_lahir_balita, ibu.nama_ibu, ibu.no_telp_ibu, ibu.alamat_ibu, kader.nama_kader
        FROM registrasi 
        JOIN balita ON registrasi.NIK_balita = balita.NIK_balita 
        JOIN ibu ON registrasi.NIK_ibu = ibu.NIK_ibu
        JOIN kader ON registrasi.NIK_kader = kader.NIK_kader 
        WHERE (registrasi.tgl_reg BETWEEN '$tgl_awal' AND '$tgl_akhir' 
        OR ('$tgl_awal' = '' AND '$tgl_akhir' = '')) 
        ORDER BY registrasi.no_reg ASC";  // Ensure ordering by tgl_kunj

$tampil = mysqli_query($koneksi, $query);

// HTML content for the PDF
$html = '<h1>Data Registrasi</h1>
        <table border="1" cellpadding="5">
        <thead>
          <tr>
                                                <th>No Registrasi</th>
                                                <th>Tanggal Registrasi</th>
                                                <th>Balita</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Ibu</th>
                                                <th>No Telepon</th>
                                                <th>Alamat</th>
                                                <th>Kader</th>
         </tr>
        </thead>
        <tbody>';

$no = 1;
while ($data = mysqli_fetch_array($tampil)) {
  $html .= '<tr>
              <td>' . $data['no_reg'] . '</td>
              <td>' . $data['tgl_reg'] . '</td>
              <td>' . $data['nama_balita'] . '</td>
              <td>' . $data['tgl_lahir_balita'] . '</td>
              <td>' . $data['nama_ibu'] . '</td>
              <td>' . $data['no_telp_ibu'] . '</td>
              <td>' . $data['alamat_ibu'] . '</td>
              <td>' . $data['nama_kader'] . '</td>
            </tr>';
}

$html .= '</tbody></table>';

// Create PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Posyandu');
$pdf->SetTitle('Data Registrasi');
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
$pdf->Output('Data Registrasi.pdf', 'I');