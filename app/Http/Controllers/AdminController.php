<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Validator;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    //


    public function loginAdmin(Request $request){

        $admin = Admin::where('email',$request->input('email'))->first();


        if($admin)
        return view('admins.home')->with('name',$admin->name);

        else
        return redirect('/loginAdmin');
    }

    public function registerUser(Request $request){

        $validator = Validator::make($request->all(),
        [
            'nom' => ['required','string'],
            'email'=>['required','string'],
            'password'=> ['required','confirmed'],
            'password_confirmation' => 'required',
            'type_client'=>'required',
             'num_Tel' => ['required','numeric'],
        ]);

        if($validator->fails()){
            return Redirect::to('/register_user')->withErrors($validator);
        }
        else{

            User::create([
                'nom' => $request->input('nom'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'adresse'=>$request->input('adresse'),
                'num_tel'=> $request->input('num_tel'),
                'type_client'=>$request->input('type_client'),
            ]);

            return Redirect::to('/register_user')->with('message','Utilisateur ajouté avec succès');
        }
    }



    public function adminHome(){
        return view('admins.home');
    }
    
    public function registerUserRoute(){
        
        return view('admins.registerUser');
    }
}
