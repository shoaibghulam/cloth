<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\category;
use App\Models\Admin\Aboutus;




use View;
use App\Models\Admin\StoreInformation;


class AboutController extends Controller
{
    //
    public function __construct(){
        $showCategory = category::with('subCategory')->get();
        if (!empty($showCategory)) {
            $showCategory=$showCategory;
        }else{
            $showCategory='null';
        }
        $information=StoreInformation::first();

        if (!empty($information)) {
            $information=$information;
        }else{
            $information='null';
        }
        $data=['categories'=>$showCategory,'information'=>$information];
    
        View::share('data',$data);
    }

    public function about()
    {
        $aboutinfor = About::all();
        return view('client.page.about',['aboutinfor',$aboutinfor]);
    }
}
