<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Plat;

class PagesController extends Controller
{
    public function index(){
        $plats =  Plat::paginate(3);
        return view('start')->with('plats',$plats);
    }

    public function testRobvan()
    {
        $user = User::Find(auth()->user()->id);
        return view('robvanTests.testR')->with('user',$user);
    }
}
