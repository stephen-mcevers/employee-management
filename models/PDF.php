<?php

require('fpdf.php');

class PDF extends FPDF {

    function Header() {
        $title = $_SESSION['title'];
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(55);
        $this->SetFillColor(217,217,214);
//$this->SetTextColor();
        $this->Cell(80, 10, $title, 1, 1, 'C', true);
        $this->Ln();
        $this->Cell(80);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(40, 10, $title, 0, 0, 'C');
        $this->Ln();
        $this->Cell(80);
        $this->Cell(30, 10, '', 0, 0, 'C');
        $this->Ln();
    }

    function Footer() {

        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(128);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

}
