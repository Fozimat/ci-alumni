<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('fpdf/fpdf.php');
class Pdf extends FPDF{

function __construct($orientation='L', $unit='mm', $size='A4')
  {
    parent::__construct($orientation,$unit,$size);
}

function Header(){
    if ($this->page == 1)
    {
        $this->Image(APPPATH. 'libraries/fpdf/gambar/smp10.png',10,5,30,0,'PNG');
        $this->Image(APPPATH. 'libraries/fpdf/gambar/pemko.png',260,7,20,0,'PNG');
        global $title ;
        $lebar = $this->w;
        $this->SetFont('Arial','B',15);
        $w = $this->GetStringWidth($title );
        $this->SetX(($lebar -$w)/2);
        $this->Cell($w,9,$title  ,0,1,'C');
        $this->SetFont('Arial','',12);
        $this->Cell(277,5,'Jl. Sultan Mahmud No. 57, Tanjungpinang',0,1,'C');
        $this->Cell(277,7,'smpn10tanjungpinang@gmail.com',0,1,'C');
        $this->Cell(277,7,' Telp. 0771-22652',0,1,'C');
        $this->Ln(0);
        $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
        $this->Ln(5);
    }
	
}                


function Footer() {
    $this->SetY(-15);   
    $lebar = $this->w;   
    $this->SetFont('Arial','I',8);           
    $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-20, $this->GetY());
    $this->SetY(-15);
    $this->SetX(0);       
    $this->Ln(1);
    $hal = 'Hal : '.$this->PageNo().'/{nb}' ;
    $this->Cell($this->GetStringWidth($hal ),10,$hal );   
    $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
    $tanggal  = 'Printed : '.date('d-m-Y H:i').' ';
    $this->Cell($lebar-$this->GetStringWidth($hal )-$this->GetStringWidth($tanggal)-20);   
    $this->Cell($this->GetStringWidth($tanggal),10,$tanggal );     
  }               


}