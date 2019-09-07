<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Plat;
use App\Commande;

class PagesController extends Controller
{    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth' ,['except' => ['index' , 'modifierPanier','removePlatFromPanier','recherchePlats']]);
    }

    public function index(){
        $plats =  Plat::paginate(3);
        return view('start')->with('plats',$plats);
    }
    public function testRobvan(){
        $plats =  Plat::paginate(3);
        return view('robvanTests.testR')->with('plats',$plats);
    }
    //methode permet de consulter et modifier le panier
    public function modifierPanier(){
        $listePlats = session('plats');

        
        $plats=array();
        $somme=0;

        if($listePlats){
        for ($i=0; $i <count($listePlats) ; $i++) { 
            
             $plat = Plat::find($listePlats[$i]) ;

            array_push($plats,$plat);
        }

        foreach($plats as $plat){
            $somme += $plat->prix;
        }

    }
        return view('panier')->with(['plats' => $plats,'somme' => $somme]);

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
                $platSuprime = Plat::find($plat);
            }else{
                $platsList[$i] = $plat;
                $i++;
            }
        }
        $request->session()->put('plats', $platsList);

        return redirect('/panier')->with('message','Plat "'.$platSuprime->nom.'" enlevée avec succes');;
    }

    public function listeCommandes()
    {
        if (auth()->user()->type_client == 'responsable') {
            # code...
            $commandes = Commande::where([
                ['etat', 'lancer'],
                ['type', 'dehors'],
            ])->get();
        } else {
            if (auth()->user()->type_client == 'chef_cuisinier') {
                # code...
                $commandes = Commande::where([
                    ['etat', 'lancer'],
                    ['type', 'interne'],
                    ])->orWhere('etat', 'valider')->get();
            }else {
                # code...
                return redirect('/plats')->with('message','    that page is forbiden   ');
            }
        }
        
       
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
            
        if (auth()->user()->type_client == 'responsable') {
            # code...
            return view('commandes.listeCommandes')->with('commandes',$commandes)
            ->with('totals' , $totals);
        } else {
            # code...
            return view('commandes.listeCommandesCuisinier')->with('commandes',$commandes)
            ->with('totals' , $totals);
        }
       
    }

    public function etatCommande(Request $request)
    {
        $commande = Commande::find($request->input('commande'));
        $commande->etat = $request->input('etat');
        if($commande->etat == 'valider' || $commande->etat =='annuler' ){
            $commande->valideur = auth()->user()->id;
        }
        if($commande->etat == 'servi'){
            $commande->serveur = auth()->user()->id;
        }
        $commande->save();
        
        return redirect('/listeCommandes')->with('message','la commande est : '.$commande->etat);;   
    }

public function recherchePlats(Request $request){
    $prix = $request->input('prix');
    $type = $request->input('type');

    if($prix==0){
        $prix=5000;
    }
    if($type == '%'){
        $plats = Plat::where([['prix','<=',$prix],])->get();
    }else{
        $plats = Plat::where([
            ['type', $type],
            ['prix','<=',$prix]
        ])->get();
    }
    $view = view("inc.platsCards",['plats' => $plats]);
    return $view;
}
public function loginAdminRoute(){

    return view('admins.login');
}
}
