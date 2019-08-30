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

    
    //methode permet de consulter et modifier le panier
    public function modifierPanier(){
        $listePlats = session('plats');

        $plats = Plat::find($listePlats);

        return view('commandes.panier')->with('plats',$plats);

    }

    public function removePlatFromPanier(Request $request){
        $plats = session('plats');
        $id = $request->input('plat');
        $count = false;
        $platsList = array();
        $i=0;
        foreach ($plats as $plat) 
        {
            # code...
            if(($plat == $id)&&(!$count))
            {
                $count = true;
            }else{
                $platsList[$i] = $plat;
                $i++;
            }
        }
        $request->session()->put('plats', $platsList);

        return redirect('/panier');
    }

    public function testRobvan()
    {
        $user = User::Find(auth()->user()->id);
        return view('robvanTests.testR')->with('user',$user);
    }
}
