<?php
    include_once('fpdf/fpdf.php');
     
    class PDF extends FPDF
    {

        function Header()
        {
            // Logo
            //$this->Image('logo.png',10,-1,70);
            $this->SetFont('Arial','B',13);
            // Move to the right
            $this->Cell(80);
            // Title
            //$this->Cell(80,10,'List',1,0,'C');
            // Line break
            $this->Ln(20);
        }
         
        // Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }
     
    /*$data_source = new DataSource;
    $connString =  $data_source->getPDOConnection();
    $display_heading = array('id'=>'ID', 'first_name'=> 'Surname', 'last_name'=> 'Othernames','phone_number'=> 'Phone Number','country'=> 'Country','carrier'=> 'Carrier',);
     
    $result = mysqli_query($connString, "SELECT * FROM phone_number") or die("database error:". mysqli_error($connString));
    $header = mysqli_query($connString, "SHOW columns FROM phone_number");
     
    $pdf = new PDF();
    //header
    $pdf->AddPage();
    //foter page
    $pdf->AliasNbPages();
    $pdf->SetFont('Arial','B',12);
    foreach($header as $heading) {
        $pdf->Cell(40,12,$display_heading[$heading['Field']],1);
    }
    foreach($result as $row) {
        $pdf->Ln();
        foreach($row as $column)
            $pdf->Cell(40,12,$column,1);
    }

    $pdf->Output();*/
?>