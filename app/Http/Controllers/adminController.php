<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request as Input;
use DB;
use Session;

class adminController extends Controller
{
     public function index(){
        return view ('Dashboard.index');
    } 

     public function viewCategory(){
        $data =DB::table('categories')->get();
        return view ('Dashboard.category.category',['data'=>$data]);
     } 
    
      public function editcategory($id){
      $singledata=DB::table('categories')->where('cid',$id)->first();
         if($singledata == NULL){
            return redirect('viewcategory');
      }
      $data =DB::table('categories')->get();
      return view('Dashboard.category.editcategory',['data'=>$data,'singledata'=>$singledata]);
      }

     public function multipleDelete(){
      $data=Input::except('_token');
      
      if($data['bulk-action'] ==0 ){
         session::flash('message' , 'Please select the message you want to perform');
         return redirect()->back();
      }
      $tbl=decrypt($data['tbl']);
      $tblid=decrypt($data['tblid']);
      if(empty($data['select-data'])){
         session::flash('message' , 'Please select the data you want to delete');
         return redirect()->back();
      }
      $ids=$data['select-data'];
      foreach($ids as  $id){
         DB::table($tbl)->where($tblid,$id)->delete();
      }
         session::flash('message' , 'Data deleted sucessfully');      
         return redirect()->back();

     }

}
