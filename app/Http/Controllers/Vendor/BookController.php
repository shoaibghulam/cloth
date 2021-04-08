<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Language;
use App\Models\Admin\Publisher;
use App\Models\SubCategory;
use App\Models\Vendor\Book;
use App\Models\author;
use App\Models\category;

use setasign\Fpdi\Fpdi as FPDI;
use Auth;
use Validator;
class BookController extends Controller
{
    //
    public function booklist(){
        $books=Book::with('subcategory','language','publisher','author','categoryy')->where('vendor_id',Auth::guard("vendor")->user()->id)->get();
        $languages=Language::all();
        $publishers=Publisher::all();
        $authors=author::all();
        $subcategories=SubCategory::all();
        $categories=category::all();

        
	return view('vendor.pages.book.book',['subcategories'=>$subcategories,'publishers'=>$publishers,'authors'=>$authors,'languages'=>$languages,'books'=>$books,'categories'=>$categories]);

    }
    public function change_category(Request $request){
        $id=$request->id;
        $subcategories=SubCategory::where('category_id',$id)->get();
        return $subcategories;

    }
   

    public function addbook(Request $request){
        $controlls=$request->all();
        
        $rules=array(
            "name"=>"required|unique:books,name",
            "title"=>"required|unique:books,title",
            "price"=>"required",
            "discount"=>"nullable|numeric|min:1|max:100",
            "category"=>"required|exists:categories,id",
            "subcategory"=>"required|exists:sub_categories,id",
            "description"=>"required",
            "cover_image"=>"required|image"

        );
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }else
        {
            $book=new Book;
            $book->vendor_id=Auth::guard('vendor')->user()->id;
            $book->sub_category_id=$request->subcategory;
            // $book->language_id=$request->language;
            // $book->publisher_id=$request->publisher;
           
            $book->name=$request->name;
            $book->title=$request->title;
            $book->price=$request->price;
            $book->discount=$request->discount;
            //$book->price=$request->price;
           // $book->isbn=$request->isbn;
            //$book->demo_pages=$request->demo_pages;
            //$book->published_date=$request->published_date;
            $book->description=$request->description;
            if ($request->file('cover_image')) {
                $file=$request->file('cover_image');
                $fileName =uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/images/');
                $path=$file->move($destinationPath, $fileName);
                $book->image=$fileName;   
             }
            // if ($request->file('attachment')) {
            //     $file=$request->file('attachment');
            //     $fileName =uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
            //     $destinationPath = public_path('/uploads/books/');
            //     $path=$file->move($destinationPath, $fileName);
            //     $book->attachment=$fileName;   
            //  }
             $book->save();
             return redirect()->back()->withSuccess('Product Added Successfully...!');
            // $find=Book::find($book->id);
            
            //  $pdf = new FPDI();
            //     $pageCount = $pdf->setSourceFile(public_path()."/uploads/books/".$find->attachment);
            //     $skipPages =$request->demo_pages;
    
            //     for( $pageNo=1; $pageNo<=$pageCount; $pageNo++ )
            //     {
            //         if($pageNo<$skipPages ){
            //             $templateID = $pdf->importPage($pageNo);
            //             $pdf->getTemplateSize($templateID);
            //             $pdf->addPage();
            //             $pdf->useTemplate($templateID);

            //         }
            //         if($pageNo==$skipPages ){
                        
            //             $pdf->AddPage();
            //             $pdf->SetFont('Arial','B',20);
            //             $pdf->SetTextColor(255,0,0);
            //             $pdf->SetXY(50, 50);
            //             $pdf->Write(0,'Purchase');
            //             $pdf->SetTextColor(0,0,255);
            //             $pdf->SetFont('','U');
            //             $pdf->Write(0, "www.google.com");

            //         }
                    
                   
            //     }
               

            //     $n=time().".pdf";
            //     $d=public_path('uploads/').$n;
            //     $find->demo_file="uploads/".$n;
            //     $find->save();
            //     $pdf->Output($d,'F');
            //     
        }
   }

   public function destroy($id){
       $delete=Book::find($id);
       unlink(public_path($delete->demo_file));
       unlink(public_path('uploads/books/'.$delete->attachment));
       unlink(public_path('uploads/images/'.$delete->image));
       Book::destroy($id);
       return redirect()->back();

   }
    public function edit(Request $request){
                $id=$request->id;
                $book=Book::with('subcategory','language','publisher','author')->find($id);
                return response()->json(['book'=>$book]);
                
            }
            public function update(Request $request){
                $controlls=$request->all();
                
                $rules=array(
                    "id"=>"required|exists:books",
                    "e_name"=>"required|unique:books,name,$request->id",
                    "e_title"=>"required|unique:books,title,$request->id",
                    "e_price"=>"required",
                    "e_discount"=>"nullable|numeric|min:1|max:100",
                    "e_subcategory"=>"required|exists:sub_categories,id",
                  
                    "e_publisher"=>"required|exists:publishers,id",
                    "e_language"=>"required|exists:languages,id",
                    "e_published_date"=>"required|date",
                    "e_description"=>"required",
                    "e_cover_image"=>"nullable",
                    "e_attachment"=>"nullable",
                    "e_isbn"=>"required",
                    
                    "e_demo_pages"=>"required|numeric",
        
                );
                $validator=Validator::make($controlls,$rules);
                if ($validator->fails()) {
        
                    return redirect()->back()->withErrors($validator)->withInput($controlls);
                }else
                {
                    $book=Book::find($request->id);
                    $book->vendor_id=Auth::guard('vendor')->user()->id;
                    $book->sub_category_id=$request->e_subcategory;
                    $book->language_id=$request->e_language;
                    $book->publisher_id=$request->e_publisher;
                   
                    $book->name=$request->e_name;
                    $book->title=$request->e_title;
                    $book->price=$request->e_price;
                    $book->discount=$request->e_discount;
                    $book->price=$request->e_price;
                    $book->isbn=$request->e_isbn;
                    
                    $book->demo_pages=$request->e_demo_pages;
                    $book->published_date=$request->e_published_date;
                    $book->description=$request->e_description;
                    if ($request->file('e_cover_image')) {
                        $file=$request->file('e_cover_image');
                        $fileName =uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
                        $destinationPath = public_path('/uploads/images/');
                        $path=$file->move($destinationPath, $fileName);
                        $book->image=$fileName;   
                     }
                    if ($request->file('e_attachment')) {
                        $file=$request->file('e_attachment');
                        $fileName =uniqid().'_'.time() . '.' . $file->getClientOriginalExtension();
                        $destinationPath = public_path('/uploads/books/');
                        $path=$file->move($destinationPath, $fileName);
                        $book->attachment=$fileName;   
                     }
                     $book->save();
                     if ($request->file('e_attachment')) {
                    $find=Book::find($book->id);
                     $pdf = new FPDI();
                        $pageCount = $pdf->setSourceFile(public_path()."/uploads/books/".$find->attachment);
                        $skipPages =$request->e_demo_pages;
                        for( $pageNo=1; $pageNo<=$pageCount; $pageNo++ )
                        {
                            if($pageNo<$skipPages ){
                                $templateID = $pdf->importPage($pageNo);
                                $pdf->getTemplateSize($templateID);
                                $pdf->addPage();
                                $pdf->useTemplate($templateID);
        
                            }
                            if($pageNo==$skipPages ){
                                $pdf->AddPage();
                                $pdf->SetFont('Arial','B',20);
                                $pdf->SetTextColor(255,0,0);
                                $pdf->SetXY(50, 50);
                                $pdf->Write(0,'Purchase');
                                // Then put a blue underlined link
                                $pdf->SetTextColor(0,0,255);
                                $pdf->SetFont('','U');
                                $pdf->Write(0, "www.google.com");
                            }
                            
                           
                        }
                        $n=time().".pdf";
                        $d=public_path('uploads/').$n;
                        $find->demo_file="uploads/".$n;
                        $find->save();
                        $pdf->Output($d,'F');
                    }
                        return redirect()->back()->withSuccess('Book Added Successfully...!');
                }
           }

          public function check(){
            $pdf = new FPDI();
            $pdf->Output('uploads/1606311345.pdf','I');
          } 
}
