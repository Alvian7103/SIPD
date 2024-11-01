<?php
require_once 'tcpdf/tcpdf.php';
include 'koneksi.php';



// SQL query to fetch data
$query = "SELECT * FROM kader LEFT JOIN pengguna ON kader.id_pengguna = pengguna.id_pengguna";

$tampil = mysqli_query($koneksi, $query);

// HTML content for the PDF
$html = '<h1>Data Kader</h1>
        <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>NIK </th>
            <th>Nama </th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Agama</th>
            <th>Golongan Darah</th>
            <th>Pendidikan</th>
             <th>Pekerjaan</th>
             <th>Alamat</th>
             <th>No Telepon</th>
             <th>ID </th>
          </tr>
        </thead>
        <tbody>';

$no = 1;
while ($data = mysqli_fetch_array($tampil)) {
  $html .= '<tr>
              
              <td>' . $data['NIK_kader'] . '</td>
              <td>' . $data['nama_kader'] . '</td>
              <td>' . $data['tempat_lahir_kader'] . '</td>
              <td>' . $data['tgl_lahir_kader'] . '</td>
              <td>' . $data['agama_kader'] . '</td>
              <td>' . $data['gol_darah_kader'] . '</td>
              <td>' . $data['pendidikan_kader'] . '</td>
              <td>' . $data['pekerjaan_kader'] . '</td>
              <td>' . $data['alamat_kader'] . '</td>
              <td>0' . $data['no_telp_kader'] . '</td>
              <td>' . $data['id_pengguna'] . '</td>
            </tr>';
}

$html .= '</tbody></table>';


// Create PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Posyandu');
$pdf->SetTitle('Data Kader');
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
$pdf->Output('Data Kader.pdf', 'I');
