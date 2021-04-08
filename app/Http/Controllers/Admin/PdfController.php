<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use mikehaertl\pdftk\Pdf as Pdf;
use Spatie\PdfToText\Pdf as Pdf;
use  Smalot\PdfParser\Parser  as Pars;
use setasign\fpdf\fdpf as fpdf;
use setasign\Fpdi\Fpdi as FPDI;

use App\Models\Admin\Book;

class PdfController extends Controller
{
    //
    public function add_pdf(Request $request){
        if ($request->file('file')) {
            $file=$request->file('file');
            $fileName ="/uploads/books/". uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/books/');
            $path=$file->move($destinationPath, $fileName);
            $book=new Book;
            $book->name=$fileName;
            $book->demo=$fileName;
            $book->save();
            $find=Book::find($book->id);

            $pdf = new FPDI();

$pageCount = $pdf->setSourceFile(public_path().$find->name);

//  Array of pages to skip -- modify this to fit your needs
$skipPages =3;

//  Add all pages of source to new document
for( $pageNo=1; $pageNo<=$pageCount; $pageNo++ )
{
    //  Skip undesired pages
    if($pageNo>$skipPages )
        continue;

    //  Add page to the document
    $templateID = $pdf->importPage($pageNo);
    $pdf->getTemplateSize($templateID);
    $pdf->addPage();
    $pdf->useTemplate($templateID);
}


$d=public_path('uploads/').'khalid.pdf';
$find->demo="uploads/khalid.pdf";
$find->save();
$pdf->Output($d,'F');

//             $parser = new Pars;
//                 $pdf    = $parser->parseFile(public_path().$find->name);
                
//                 // Retrieve all pages from the pdf file.
//                 $pages  = $pdf->getPages();
//                 $count=1;
//                 // Loop over each page to extract text.
//                 foreach ($pages as $page) {
//                     $count++;
//                     if ($count<4) {
//                     echo $page->getText();
                        
//                     }
//                 }
// dd();
        //     $pdf=new Pdf();
        //     // dd($pdf);
        //     $path1 = 'c:/Program Files/Git/mingw64/bin/pdftotext';

        //     $pdf= Pdf::getText(public_path().$find->name,$path1);
        // echo  $pdf;
            // $pdf = new Pdf(public_path().$find->name);
            // $result = $pdf->cat(1, 5)
            //     ->cat([7, 4, 9])
            //     ->saveAs(public_path('/')."new.pdf");
            // // dd([$result, $pdf->getError()]);
            // if ($result === false) {
            //     return $pdf->getError();
            // }
            // else{
            //     return "done";
            // }
            

        }
    }
    public function pdf(){
    $books=Book::orderBy('id','DESC')->first();
	return view('admin.pages.book.pdf',['books'=>$books]);
        
    }
}
