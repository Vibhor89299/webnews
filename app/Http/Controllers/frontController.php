<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

 class frontController extends Controller
{
   public function __construct()
   {
    $categories= DB::table('categories')->where('status','on')->get();
    $settings = DB::table('settings')->first();
    if($settings){
        $settings->social = explode(',' , $settings->social);
        foreach($settings->social as $social){
            $icon = explode('.' , $social) ;
            $icon= $icon[1];
            $icons[] = $icon ;
        }
    }
    else{
        $icons =[];
    }

    view()->share([
        'categories' => $categories,
        'settings' =>  $settings,
        'icons' => $icons,
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
