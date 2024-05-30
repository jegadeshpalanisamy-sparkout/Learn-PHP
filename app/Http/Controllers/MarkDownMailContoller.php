<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MarkDown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MarkDownMailContoller extends Controller
{
    //
    public function index()
    {
        
        $subject="This is Mark down mail";
        $body="Hii user";
        $user="moorthyponnusamy2019@gmail.com";
        $res=Mail::to($user)->send(new MarkDown($subject,$body));
        dd($res);
        if($res)
        {
            dd("message send successfully");
        }
        else{
            dd("message not send");
        }
    }
}
