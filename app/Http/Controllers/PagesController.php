<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    
    public function testRobvan()
    {
        $user = User::Find(auth()->user()->id);
        return view('robvanTests.testR')->with('user',$user);
    }
}
