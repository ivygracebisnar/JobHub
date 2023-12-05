<?php
require_once "../connection.php";
require_once "../fpdf/fpdf.php";

$eid = $_GET['pdfid'];
$result = "SELECT * FROM jobseeker WHERE id='$eid'";
$sql = $conn->query($result);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(190, 10, 'Southern Leyte State University - College of Teacher Education', 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(190, 10, 'San Isidro, Tomas Oppus, Southern Leyte', 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(190, 10, 'Bachelor of Science in Information Technology', 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, 'Barangay JobHub Information Management System', 0, 0, 'C');
$pdf->Image('../img/slsu.png', 10, 8, 27);
$pdf->Image('../img/logorm.png', 170, 8, 30);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 12);
while($row = $sql->fetch_object()) {
    $id=$row->id;
    $name=$row->name;
    $summary=$row->summary;
    $age=$row->age;
    $address=$row->address;
    $phone=$row->phone;
    $skills=$row->skills;
    $experience=$row->experience;

    $pdf->Cell(50, 10, 'Applicant ID: ', 0, 0, 'L');
    $pdf->Cell(170,10, $id, 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(50, 10, 'Fullname: ', 0, 0, 'L');
    $pdf->Cell(170,10, $name, 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(50, 10, 'Summary: ', 0, 0, 'L');
    $pdf->Cell(170,10, $summary, 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(50, 10, 'Age: ', 0, 0, 'L');
    $pdf->Cell(170,10, $age, 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(50, 10, 'Address: ', 0, 0, 'L');
    $pdf->Cell(170,10, $address, 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(50, 10, 'Phone Number: ', 0, 0, 'L');
    $pdf->Cell(170,10, $phone, 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(50, 10, 'Skills: ', 0, 0, 'L');
    $pdf->Cell(170,10, $skills, 0, 0, 'L');
    $pdf->Ln();
    $pdf->Cell(50, 10, 'Experience: ', 0, 0, 'L');
    $pdf->Cell(170,10, $experience, 0, 0, 'L');
    $pdf->Ln();
}

$pdf->Output();
?>