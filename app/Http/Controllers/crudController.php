<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request as Input;



use DB;
use Session;


class crudController extends Controller
{
    public function insertData(){
       $data= Input::except('_token');
       $tbl= decrypt($data['tbl']);
       unset($data['tbl']);
       $data['created_at'] = date('Y-m-d H:i:s');
       DB::table($tbl)->insert($data);
       session::flash('message' , 'Data inserted sucessfully');
       return redirect()->back();
    }

    public function updateData(){
        $data= Input::except('_token');
        $tbl= decrypt($data['tbl']);
        unset($data['tbl']);
        $data['updated_at'] = date('Y-m-d H:i:s');
        DB:: table($tbl)->where( key ($data), reset($data))->update($data);
        session::flash('message' , 'Data Updated sucessfully');
        return redirect()->back();
     }
}
