<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function samplePdf()
    {
        // $patient = Session::get('patient');
    
        $pdf = PDF::loadView('Pdf.pdfview')
        ->setPaper('Letter', 'portrait')
        ->setPaper('Letter', 'portrait')
        ->setOption('margin-top','22mm')
        ->setOption('margin-bottom','30mm')
        ->setOption('margin-left','5mm')
        ->setOption('margin-right','5mm');
        return $pdf->inline('pdfview.pdf');

    }
}
