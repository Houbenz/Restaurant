<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\DB;

class ModifyUserController extends Controller
{
    //


    public  function modify(Request $request) {

        $user = User::find(auth()->user()->id);

        if($request -> hasFile('profile_image')){
            //get filename with the extension
            $fileNameWithExt = $request->file('profile_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
             $request->file('profile_image')->storeAs('public/profile_images', $fileNameToStore);     
             $user->profile_image = $fileNameToStore;
        }
        $user->email = $request->input('email') ;
        $user->nom = $request->input('nom');
        $user->adresse = $request->input('adresse');
        $user->num_tel = $request->input('num_tel');
        $user->save();

        return redirect('/home')->with('message','profile mis à jour avec succès');
    }
}
