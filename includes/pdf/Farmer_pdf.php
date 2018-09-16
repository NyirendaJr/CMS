<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../config/tcpdf_config.php');
require_once('../tcpdf.php');
require_once('../init.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {

    // Load table data from file
    public function LoadData() {
        // Read file lines
        $farmers = User::find_by_category(4);
        $data_array = json_decode(json_encode($farmers), true);
        //$data_array = User::objectToArray($users);
        return $data_array;
    }

    // Colored table
    public function ColoredTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(227,242,253);
        $this->SetTextColor(0,0,0);
        $this->SetDrawColor(238,238,238);
        $this->SetLineWidth(0);
        $this->SetFont('', 'B');
        // Header
        $w = array(10, 25, 35, 20, 20,20, 55);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill    = 0;
        $counter = 1;
        foreach($data as $row) {
            $this->Cell($w[0], 7, $counter++,        'LR', 0, 'L', $fill);
            $this->Cell($w[1], 7, $row['firstname'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 7, $row['lastname'],  'LR', 0, 'L', $fill);
            $this->Cell($w[3], 7, $row['phone'],     'LR', 0, 'L', $fill);
            $this->Cell($w[4], 7, $row['regNo'],     'LR', 0, 'L', $fill);
            $this->Cell($w[5], 7, $row['gender'],    'LR', 0, 'L', $fill);
            $this->Cell($w[6], 7, $row['email'],     'LR', 0, 'L', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 10);

// add a page
$pdf->AddPage();

// column titles
$header = array('S/N','First Name', 'Last Name', 'Phone', 'Reg #', 'Gender', 'Email');

// data loading
$data = $pdf->LoadData();
// echo "<pre>";
// print_r($data); exit;
// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------
// Clean any content of the output buffer
ob_end_clean();
// close and output PDF document
$pdf->Output('farmers.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
