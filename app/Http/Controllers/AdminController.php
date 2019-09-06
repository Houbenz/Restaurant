<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function loginAdmin(Request $request){

        $admin = Admin::where('email',$request->input('email'))->first();


        if($admin)
        return view('admins.home')->with('name',$admin->name);

        else
        return redirect('/loginAdmin');
    }

    public function registerUser(Request $request){

        $request->validate([
            'nom' => ['required' ,'string','alpha'],
            'email'=>['required','string'],
            'password'=> ['required','confirmed'],
            'password_confirmation' => ['required','min:8'],
            'type_client'=>'required',
             'num_tel' => ['required','numeric'],
        ]);


            $user = new User;    

            $user->nom = $request->input('nom');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->adresse=$request->input('adresse');
            $user->num_tel= $request->input('num_tel');
            $user->type_client=$request->input('type_client');
            
            $user->save();

            return Redirect::to('/register_user')->with('status','Utilisateur ajouté avec succès');

        }
    



    public function adminHome(){
        return view('admins.home');
    }
    
    public function registerUserRoute(){
        
        return view('admins.registerUser');
    }
}
