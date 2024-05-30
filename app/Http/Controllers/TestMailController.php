<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestMailController extends Controller
{
    //
    public function index()
    {
        $user="jegadesh54321@gmail.com";
        $subject="hii this is test mail";
        $body="This is body content for mail testing";
        // dd("hii");
        $response=Mail::to($user)->send(new TestMail($subject,$body));
        if ($response) {
            dd("Mail sent successfully");
        } else {
            dd("Error sending mail");
        }
    }
}
