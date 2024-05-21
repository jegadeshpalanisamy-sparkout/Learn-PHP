<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ApiLearnController extends Controller
{
    //
    public function getdata()
    {
        return ['name'=>"jega","age"=>21];
    }

    //get datas in db
    public function getAllDataInDb()
    {
        return Book::all();
    }

    public function getDataById($id){
        return Book::find($id);
    }

    public function add(Request $request)
    {

        $book=new Book();
        $book->author=$request->author;
        $book->mail=$request->mail;
        $book->count=$request->count;
        $save=$book->save();
        if($save)
        {
            return ["result"=>"data was added sucessfully"];
        }
        else{
            return ["result"=>"something error data cannot be added"];
        }

        
    }

    public function update(Request $request,$id)
    {
        $getId=Book::find($id);
       // $book=new Book();
        $getId->author=$request->author;
        $getId->mail=$request->mail;
        $update=$getId->update();
        if($update)
        {
            return ['result'=>"Data updated successfully"];
        }
        else{
            return ['result'=>"Data cannot be update"];
        }

    }

    public function delete($id)
    {
        $getAuthor=Book::find($id);
        $delete=$getAuthor->delete();
        if($delete)
        {
            return ['result'=>'data was deleted successfully'];
        }
        else{
            return ['result'=>'data cannot be deleted'];
        }
    }
}
