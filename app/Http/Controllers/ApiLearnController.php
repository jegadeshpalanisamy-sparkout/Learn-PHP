<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $book=Book::all();
        return response(['success' => true,'message' => 'Book created successfully','data' => $book]);
    }
    //get data by  id
    public function getDataById($id){
        return Book::find($id);
    }
    //add book details
    public function add(Request $request)
    {

        // $book=new Book();
        // $book->author=$request->author;
        // $book->mail=$request->mail;
        // $book->count=$request->count;
        // $save=$book->save();
        // dd($save);
        // if($save)
        // {
        //     return ["result"=>"data was added sucessfully"];
        // }
        // else{
        //     return ["result"=>"something error data cannot be added"];
        // }
            $rules=[
            'author'=>"required|min:3",
            'mail'=>"required|email|unique:books",
            'count'=>"required"
            ];
            $validator=Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return $validator->errors();
        }
        else{
            $book=Book::create([
                'author'=>$request->author,
                'mail'=>$request->mail,
                'count'=>$request->count
    
            ]);
            if($book)
            {
                return response(['success'=>'true','message'=>'data  added successfuly','data'=>$book]);
            }
            else{
                return response(['success'=>'false','message'=>'data cannot be added']);
            }
        }
       
        // dd($book);       

        
    }
    //update existiong book
    public function update(Request $request,$id)
    {
        $getId=Book::find($id);
       // $book=new Book();
        $getId->author=$request->author;
        $getId->mail=$request->mail;
        $update=$getId->update();
        if($update)
        {
            return response(['success'=>'true','message'=>"Data updated successfully",'data'=>$getId]);
        }
        else{
            return response(['success'=>'false','message'=>'data cannot be updated']);
        }

        

    }
    //delete book by id
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
    //search book by author name
    public function search($name){
        $author=Book::where('author',"like","%".$name."%")->get();
        if($author->isNotEmpty())
        {
            return response(['success'=>'true','message'=>'Data was get successfully','data'=>$author]);
        } else {
            return response(['success' => 'false', 'message' => 'No data found'], 404);
        }
        
    }
}
