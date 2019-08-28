<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\DB;

class ModifyUserController extends Controller
{
    //


    public  function modify(Request $request) {

        DB::table('users')
        ->where('id',$request->input("id"))
            ->update([
                'email' => $request->input('email'),
                'nom'=>$request->input('nom'),
                'adresse'=>$request->input('adresse'),
                'num_tel'=>$request->input('num_tel'),
                    ]);

        return redirect('/home')->with('success','profile updated succesfully');
    }
}
