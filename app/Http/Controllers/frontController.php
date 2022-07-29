<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

 class frontController extends Controller
{
   public function __construct()
   {
    $categories= DB::table('categories')->where('status','on')->get();
    view()->share([
        'categories' => $categories,
    ]);
   }
   
   
    public function index(){
        return view('Frontend.index');
    }

    public function category(){
        return view('Frontend.category');
    }

    public function  post(){
        return view('Frontend.article');
    }

    

}
