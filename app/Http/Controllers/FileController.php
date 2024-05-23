<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //
    // public function index(){
    //     return view('File-upload.file');
    // }

    // public function upload(Request $request)
    // {
    //     // return $request;
    //     // return $request->file('doc')->store('files');

    //     $file_name="new_img.".$request->file('doc')->extension();
        
    //     // $request->file('doc')->move(public_path('img'),$file_name);
    //     // $request->file('doc')->storeAs('new',$file_name,'public');
    //     // return "file added successfully";
    //     return $request->file('doc')->storeAs('custom-folder',$file_name);
        
        
    // }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        // return "hii";
        $data=$request->validate( [
            'name'=>'required',
            'profile_picture' => 'required'
        ]);
        //  dd($data);
        $upload=$request->file('profile_picture')->store('','profile_picture');

        $profile=Profile::create([
            'name'=>$data['name'],
            'profile_picture'=>$upload
        ]);
        // dd($profile);
       return redirect()->route('show');

        
    }

    public function show(){
        $profile=Profile::all();       
        return view('profile.show',compact('profile'));
    }
}
