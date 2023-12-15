<?php
/* Template Name: CustomPagePdf */

require 'includes/pdfGeneration/fpdf.php';

$_pdf = new FPDF('P', 'mm', 'A4'); // Set page orientation and size to A4

// Get image dimensions
list($originalWidth, $originalHeight) = getimagesize('https://adamsfcstg.wpenginepowered.com/wp-content/uploads/2023/12/Adams_Academy__-_Certificate_.png');

// Calculate scaling factor based on page width and image aspect ratio
$pageWidth = $_pdf->GetPageWidth();
$scaleFactor = $pageWidth / $originalWidth;

// Calculate new image width and height based on scaling factor
$newWidth = $originalWidth * $scaleFactor;
$newHeight = $originalHeight * $scaleFactor;

// Center the image horizontally
$xPosition = ($_pdf->GetPageWidth() - $newWidth) / 2;
$yPosition = ($_pdf->GetPageHeight() - $newHeight) / 2;

// Add the image to the PDF
$_pdf->AddPage();
$_pdf->Image('https://adamsfcstg.wpenginepowered.com/wp-content/uploads/2023/12/Adams_Academy__-_Certificate_.png', $xPosition, $yPosition, $newWidth, $newHeight);

// Set the font size for the name and diploma text
$_pdf->SetFont('Arial', '', 40);

// Position the text cursor below the "Adams Academy hereby certifies" text
$_pdf->SetXY($xPosition + 15, $yPosition + 1.4 * $newHeight / 4);

// Add the "Shoive Hossain" text
$_pdf->MultiCell(180, 30, 'Shoive Hossain', 0, 'C', 0);

// Position the text cursor below the "has successfully demonstrated proficient comprehension in the course" text
$_pdf->SetFont('Arial', '', 24);

$_pdf->SetXY($xPosition + 15, $yPosition + 1.8 * $newHeight / 4);

// Add the "Advanced Diploma in Copy Writing" text
$_pdf->MultiCell(180, 30, 'Advanced Diploma in Copy Writing', 0, 'C', 0);

// Output the PDF
$_pdf->Output();
