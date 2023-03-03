<?php
	require 'pdf/fpdf/fpdf.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('img/Banco Union Logos.png', 5, 5, 40 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(140,10, 'Detalle de la controversia',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>