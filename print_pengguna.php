<?php
require_once 'tcpdf/tcpdf.php';
include 'koneksi.php';



// SQL query to fetch data
$query = "SELECT * FROM pengguna  ";

$tampil = mysqli_query($koneksi, $query);

// HTML content for the PDF
$html = '<h1>Data Pengguna</h1>
        <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>ID Pengguna</th>
            <th>Nama Pengguna</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level</th>
          </tr>
        </thead>
        <tbody>';

$no = 1;
while ($data = mysqli_fetch_array($tampil)) {
  $html .= '<tr>
              
              <td>' . $data['id_pengguna'] . '</td>
              <td>' . $data['nama_pengguna'] . '</td>
              <td>' . $data['username'] . '</td>
              <td>' . $data['password'] . '</td>
              <td>' . $data['level'] . '</td>
            </tr>';
}

$html .= '</tbody></table>';


// Create PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Posyandu');
$pdf->SetTitle('Data Pengguna');
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
$pdf->Output('Data Pengguna.pdf', 'I');
