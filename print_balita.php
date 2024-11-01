<?php
require_once 'tcpdf/tcpdf.php';
include 'koneksi.php';



// SQL query to fetch data
$query = "SELECT * FROM balita LEFT JOIN ibu ON balita.NIK_ibu = ibu.NIK_ibu  ";

$tampil = mysqli_query($koneksi, $query);

// HTML content for the PDF
$html = '<h1>Data Balita</h1>
        <table border="1" cellpadding="5">
        <thead>
          <tr>
          <th>ID</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>Ibu</th>
          </tr>
        </thead>
        <tbody>';

$no = 1;
while ($data = mysqli_fetch_array($tampil)) {
  $html .= '<tr>
              <td>' . $data['id_balita'] . '</td>
              <td>' . $data['NIK_balita'] . '</td>
              <td>' . $data['nama_balita'] . '</td>
              <td>' . $data['tempat_lahir_balita'] . '</td>
              <td>' . $data['tgl_lahir_balita'] . '</td>
              <td>' . $data['jenis_kelamin'] . '</td>
              <td>' . $data['agama_balita'] . '</td>
              <td>' . $data['alamat_ibu'] . '</td>
              <td>' . $data['nama_ibu'] . '</td>
            </tr>';
}

$html .= '</tbody></table>';


// Create PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Posyandu');
$pdf->SetTitle('Data Balita');
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
$pdf->Output('data_balita.pdf', 'I');
