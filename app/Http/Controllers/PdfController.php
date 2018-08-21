<?php

namespace App\Http\Controllers;

use PDF;
use Barryvdh\Snappy\Facades\SnappyPdf as PDFSnappy;

use App\Models\Inspection;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Session;
use DB;
use Illuminate\Validation\Rule;

class PdfController extends Controller
{
     public function inspect($id){
        $date = date('Y-m-d H:i:s');
        $inspect = Inspection::findOrFail($id);
        //$pdf = PDFSnappy::loadView('pdf.inspection',compact('inspect','date'));
        //return $pdf->inline('github.pdf');
        //PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        //$pdf = PDF::loadview('pdf.inspection',compact('inspect','date'))->setPaper([0,0,612,792]);
        //return $pdf->download('inspection.pdf');
        return View('admin/pdf/inspection',compact('inspect','date'));
    }
}
