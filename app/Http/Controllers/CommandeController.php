<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plat;
use App\Commande;
use App\User;

class CommandeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $commandes = Commande::where('id_client',auth()->user()->id)->get();
      
         return view('commandes.index')->with('commandes',$commandes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commande = new commande;
        $plats =session('plats');

        $commande->etat = 'lancer';
        $commande->id_client = auth()->user()->id;
        if (auth()->user()->type_client == 'client_dehors') {
            # code...
            $commande->type ='dehors';
        } else {
            $etat = ['lancer','valider','prete','servi'];
            $result = Commande::whereIn('etat' ,$etat)
                    ->where('id_client',$commande->id_client)
                    ->get();
            if (count($result) > 0) {  
                return redirect('/plats')->with('message' , 'cette table a une commande non paye
                                                    (vous ne pouvez pas lancer une autre qu\'apres payer la premiere');
            }
            $commande->type ='interne';
        }        
        $commande->save();
        $commande->plat()->attach($plats);

        //to remove plats from session when an commande is done
        $request->session()->forget('plats');

        return redirect('/commandes')->with('message','Votre commande est lancé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plats= Commande::find($id)->plat;

        $somme=0;

        foreach($plats as $plat){
            $somme += $plat->prix;
        }

        return view('commandes.show',['plats'=> $plats,'command_id' => $id,'somme' => $somme]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
