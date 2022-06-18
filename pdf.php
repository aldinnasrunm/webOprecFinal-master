<?php
session_start();
include './dbconnect.php';

include("./fpdf/fpdf.php");

// $id = 14;
if(isset($_SESSION['idPDF'])){
    $id = $_SESSION['idPDF'];
    $query = mysqli_query($conn, "SELECT * FROM user WHERE userid = $id");
    $userData = mysqli_fetch_assoc($query);
    $query = mysqli_query($conn, "SELECT * FROM tb_registrationData WHERE id = $id");
    $registrationData = mysqli_fetch_assoc($query);
}else{
    $id = null;
}

$pdf = new FPDF();

$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('Arial', '', 12);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

if($id != null){

    /* --- Text --- */
    $pdf->SetFontSize(18);
    $pdf->Text(48, 19, 'Formulir Pendaftaran Open Recuitment');
    /* --- Text --- */
    $pdf->SetFont('', 'B', 24);
    $pdf->Text(23, 28, 'Himpunan Mahasiswa Teknik Informatika');
    /* --- Text --- */
    $pdf->SetFontSize(14);
    $pdf->Text(62, 35, 'Universitas Muhammadiyah Surakarta');
    /* --- Line --- */
    $pdf->Line(5, 39, 205, 39);
    // image
    $pdf->Image("./uploads/profile{$id}.jpg",20,50,50, 50);
    /* --- Text --- */
    // headline
    $pdf->SetFont('', 'B', 14);
    $pdf->Text(79, 57, 'Nama');
    $pdf->Text(79, 76, 'Angkatan');
    $pdf->Text(20, 110, 'Email');
    $pdf->Text(20, 130, 'Nomor HP');
    $pdf->Text(20, 150, 'Alamat');
    $pdf->Text(20, 170, 'Pengalaman Organisasi');
    $pdf->Text(20, 190, 'Motivasi mengikuti Himatif');


    //subtitle
    $pdf->SetFont('', '', 18);
    $pdf->Text(79, 66, $userData['nama']);
    $pdf->Text(79, 85, $registrationData['angkatan']);
    $pdf->Text(20,120 , $userData['useremail']);
    $pdf->Text(20,140 , $userData['no_hp']);
    $pdf->Text(20,160 , $userData['alamat']);
    $pdf->Text(20,180 , $registrationData['pengalaman']);
    $pdf->Text(20,200 , $registrationData['motivasi']);

    $pdf->Output("openrecuitment-{$userData['nama']}.pdf",'I');
}else{
    $pdf->SetFontSize(18);
    $pdf->Text(48, 19, 'Document Error!!');
    $pdf->Output("error.pdf",'I');

}

?>