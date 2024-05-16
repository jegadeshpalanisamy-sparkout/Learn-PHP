<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class RawQueryController extends Controller
{
    //
    public function index()
    {
        $allDatas=DB::select("select * from members");
        return $allDatas;
    }
    public function create()
    {
        $insert=DB::insert("INSERT INTO members (name,city)VALUES(?,?)",['abishk','chennai']);
        if($insert){
            return "Inserted successfully";
        }
        else{
            return "not inserted";
        }
        
    }
    public function update(){
        $update=DB::update("UPDATE members set name=? where id=?",['moorthy','3']);
        if($update){
            return "updated successfully";
        }
        else{
            return "not updated";
        }
        
    }
    public function delete(){
        $delete=DB::delete("DELETE FROm members WHERE name='Mr.Ram'");
        if($delete){
            return "record was deleted";
        }
        else{
            return "record cannot be delete";
        }
    }
}
