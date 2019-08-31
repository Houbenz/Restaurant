<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Plat;
use App\Commande;

class PagesController extends Controller
{
    public function index(){
        $plats =  Plat::paginate(3);
        return view('start')->with('plats',$plats);
    }

    
    //methode permet de consulter et modifier le panier
    public function modifierPanier(){
        $listePlats = session('plats');

        
        $plats=array();

        if($listePlats){
        for ($i=0; $i <count($listePlats) ; $i++) { 
            
             $plat = Plat::find($listePlats[$i]) ;

            array_push($plats,$plat);
        }
    }
        return view('panier')->with('plats',$plats);

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

    public function listeCommandes()
    {
        $commandes = Commande::where([
            ['etat', 'lancer'],
            ['type', 'dehors'],
        ])->get();
        $totals=array();
        $total=0;

        foreach ($commandes as $commande) {
            # code...
            $plats = $commande->plat;
            foreach ($plats as $plat) {
                # code...
                $total = $total + $plat->prix;
            }
            $totals = $totals + array($commande->id => $total);
            $total=0;
        }

        return view('commandes.listeCommandes')->with('commandes',$commandes)
                                                ->with('totals' , $totals);
    }

    public function annulerCommande(Request $request)
    {   
        $commande = Commande::find($request->input('commande'));
        $commande->etat = 'annuler';
        $commande->save();

        return redirect('/listeCommandes');
    }

    public function validerCommande(Request $request)
    {
        $commande = Commande::find($request->input('commande'));
        $commande->etat = 'valider';
        $commande->save();

        return redirect('/listeCommandes');   
    }

    public function testRobvan()
    {
        $user = User::Find(auth()->user()->id);
        return view('robvanTests.testR')->with('user',$user);
    }
}
