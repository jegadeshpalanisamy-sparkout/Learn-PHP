<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TestNotificationController extends Controller
{
    //

    public function sendNotification()
    {
        $user=User::find(2);//send particular person
        // $users=User::all();
        // dd($user);

        $testData=[
            'data'=>'Test Notification message',
            'url'=>url('/'),
        ];
        $user->notify(new TestNotification($testData));
        
        // foreach($users as $user) //send mail to all users
        // {
        //     Notification::send($user,new TestNotification($testData));
        // }
        
       return response("Notification send successfully");
    }
}
