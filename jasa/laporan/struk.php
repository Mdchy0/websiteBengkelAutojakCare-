<?php
require "../fpdf181/fpdf.php";
require "../config/koneksi.php";
session_start();
class Mypdf extends FPDF
{
    function header()
    {
        $this->SetFont('Times','B',10);
        $this->Cell(80,15,'Nomor Antrian',0,0,'C');
        $this->ln();
        $this->Cell(80,15,'Jak AutoCare',0,0,'C');
        $this->SetFont('Times','',14);
        $this->ln();
        $this->ln();
    }
    function mycell($w,$h,$x,$t)
    {
        $height = $h/3;
        $first  = $height+2;
        $second = $height+$height+$height+3;
        $len    = strlen($t);

        if ($len>20) {
            $txt = str_split($t,20);
            $this->SetX($x);
            $this->Cell($w,$first,$txt[0],'','','');
            $this->SetX($x);
            $this->Cell($w,$second,$txt[1],'','','');
            $this->SetX($x);
            $this->Cell($w,$h,'','LTRB',0,'C',0);
        }else{
            $this->SetX($x);
            $this->Cell($w,$h,$t,'LTRB',0,'C',0);
        }
    }
}

$no_antrian = $_GET['id'];

$queryy = mysql_query("SELECT * FROM pendaftaran join customer using (id_customer) where no_antrian = '$no_antrian'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

$per=mysql_query("SELECT * FROM pendaftaran join customer using (id_customer) where no_antrian = '$no_antrian'");
$no=1;
while($a=mysql_fetch_array($per))
    $no = explode('/', $a['no_antrian']);
    $no_antri = $no[1]; 
{

    $pdf = new Mypdf('P','pt',array(270.9,137.16));
    $pdf->AddPage();
    $pdf->SetFont('Times','',8);
    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,'Nomor Antrian',1,0,'C');
    $pdf->Ln();
    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,$no_antri,1,0,'C');
    $pdf->Ln();

    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,'Nama Customer',1,0,'C');
    $pdf->Ln();
    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,$dt['nama'],1,0,'C');
    $pdf->Ln();

    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,'Nomor Plat',1,0,'C');
    $pdf->Ln();
    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,$dt['nomor_plat'],1,0,'C');
    $pdf->Ln();


    $x = $pdf->GetX();
    $pdf->mycell(100,20,20,'Jak AutoCare',1,0,'C');
    $pdf->Ln();
}

$pdf->Output();
//$pd->download()
?> 