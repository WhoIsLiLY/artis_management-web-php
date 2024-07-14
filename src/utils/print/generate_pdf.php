<?php
require_once('tcpdf/tcpdf.php');
require_once __DIR__ . "\\..\\..\\bootstrap.php";

$id = isset($_POST['id']) ? $_POST['id'] : '';
if($middleware->getRoleFromToken($_COOKIE["token"]) == "manager"){
    $data = $userController->getKontrakByManagerId($middleware->getIdFromToken($_COOKIE['token']));
}else{
    $data = $userController->getKontrakByArtisId($middleware->getIdFromToken($_COOKIE['token']));
}
$selected_data = array_filter($data, function($row) use ($id) {
    return $row['id'] == $id;
});

if (!empty($selected_data)) {
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle('Surat Kontrak Kerja');

    $pdf->SetMargins(20, 20, 20);
    // $pdf->SetHeaderMargin(1);

    $pdf->SetFont('helvetica', '', 12);

    $pdf->AddPage();

    foreach ($selected_data as $row) {
        $html = '<h2 style="text-align:center;">PERJANJIAN KERJA <br>UNTUK WAKTU TERTENTU (KONTRAK)</h2>' .
                '<p></p>'.
                '<p>Pada hari ini, ' . date('d F Y') . ', telah dibuat dan disepakati perjanjian kerja antara:</p>' .
                '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama: <b>Willy Himawan</b></p>' .
                '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat: Jalan Tenggilis Mejoyo Utara, Surabaya, Jawa Timur</p>' .
                '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telepon: 031-3719900</p>' .
                '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jabatan: Chief Director</p>' .
                '<p>Dalam hal ini bertindak untuk dan atas nama <b>CelebSync</b> yang selanjutnya disebut sebagai <b>PIHAK PERTAMA.</b> </p>' .
                '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama: <b>' . $row['nama_artis'] . '</b></p>' .
                '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;di bawah Manajer: <b>' . $row['nama_manager'] . '</b></p>' .
                '<p>Dalam hal ini bertindak untuk dan atas nama diri sendiri, yang selanjutnya disebut sebagai <b>PIHAK KEDUA.</b></p>' .
                '<p>Kedua belah pihak sepakat untuk mengikatkan diri dalam Perjanjian Kerja Untuk Waktu Tertentu (Kontrak) dengan ketentuan-ketentuan sebagai berikut:</p>' .
                '<p style="text-align:center"><b>PASAL 1</b></p>'.
                '<p>PIHAK PERTAMA menerima dan mempekerjakan PIHAK KEDUA sebagai:</p>'.
                '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Jabatan: <b>Artis</b></p>' .
                '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Masa Jabatan: Dari tanggal <b>' . $row['tanggal_awal'] . '</b> sampai tanggal <b>' . $row['tanggal_akhir'] . '</b></p>' .
                '<p></p>'.  
                '<p style="text-align:center"><b>PASAL 2</b></p>'.
                '<p>1. PIHAK KEDUA bersedia menerima dan melaksanakan tugas dan tanggung jawab dalam pekerjaan tersebut serta tugas-tugas lain yang diberikan PIHAK PERTAMA dengan sebaik-baiknya.</p>'.
                '<p>2. PIHAK KEDUA bersedia tunduk dan melaksanakan seluruh ketentuan yang telah diatur baik dalam Pedoman Peraturan dan Tata Tertib Perusahaan maupun ketentuan lain yang menjadi Keputusan Direksi dan Manajemen Perusahaan.</p>'.
                '<p></p>'.
                '<p>3. PIHAK KEDUA bersedia menyimpan dan menjaga kerahasiaan baik dokumen maupun informasi milik PIHAK PERTAMA dan tidak dibenarkan memberikan dokumen atau informasi yang diketahui baik secara lisan maupun tertulis kepada pihak lain.</p>'.
                '<p>Demikian surat perjanjian ini dibuat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>' .
                '<br>' .
                '<p>Surat perjanjian kerja ini dibuat rangkap dua, yang masing-masing mempunyai kekuatan hukum yang sama.</p>' .
                '<p></p>'.
                '<p>Yang membuat perjanjian,</p>' .
                '<p></p>'.
                '<br>' .
                '<table style="width:100%; border-collapse: collapse;">' .
                '<tr>' .
                '<td style="text-align:center;"><b>PIHAK PERTAMA</b></td>' .
                '<td style="text-align:center;"><b>PIHAK KEDUA</b></td>' .
                '</tr>' .
                '<br>'.
                '<br>'.
                '<tr>' .
                '<td style="height:50px; text-align:center"><img src = "tt.jpg" alt = "tt_chief_director"></td>' .
                '</tr>' .
                '<br>'.
                '<tr>' .
                '<td style="height:50px; text-align:center"><u>Dr. Willy Himawan, S.Kom, M.Kom</u><br>Chief Director</td>' .
                '<td style="height:50px; text-align:center"><u>'. $row['nama_artis'].'</u><br>Artis</td>' .
                '</tr>' .
                '</table>';
        
        //html content ke pdf
        $pdf->writeHTML($html, true, false, true, false, '');
    }

    //nama file
    $pdf->Output('Surat_Kontrak_Kerja_' . $id . '.pdf', 'I');
} else {
    echo "Data tidak ditemukan.";
}
?>