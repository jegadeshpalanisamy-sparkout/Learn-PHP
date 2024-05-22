<?php

namespace App\Http\Controllers;

use App\Models\Member;


use App\Http\Controllers\Controller;
use App\Http\Resources\Member as MemberResource;
use App\Http\Resources\MemberCollection;
use Illuminate\Http\Request;


class ApiResourceController extends Controller
{
    //
    public function getMember($id)
    {
        // dd("hii");
         $member=Member::find($id);
        
        // return new MemberResource($member); //member resource is alias name of resource/user  it return json resource
        if (!$member) {
            return response()->json(['message' => 'Member not found'], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Member retrieved successfully',
            'data' => new MemberResource($member)
        ]);
    }

    public function getMembers()
    {
        $members=Member::all();
        return new MemberCollection($members);
    }

    
}
