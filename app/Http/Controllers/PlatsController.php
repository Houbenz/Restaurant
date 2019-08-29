<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\plat;

class PlatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //validation
        $this -> validate($request,[
            'nom' => 'required',
            'type' => 'required',
            'prix'=> 'required|integer|between:10,1500',
            'disp' => 'required|in:0,1',
            'ingrediant' => 'required',
            'cover_image' => 'image|max:1999',
        ]);
        
        //handle file upload
        if($request -> hasFile('cover_image')){
            //get filename with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
             $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);          
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        
        $plat = new plat;

        $plat->nom = $request->input('nom');
        $plat->type = $request->input('type');
        //$plat->user_id = auth()->user()->id;
        $plat->prix = $request->input('prix');
        $plat->ingrediants = $request->input('ingrediant');
        $plat->disponibilite = $request->input('disp');
        $plat->cover_image=$fileNameToStore;
        $plat->save();

        return redirect('/tr')->with('message','plat sauvgardé avec succés');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //returner le plate de l'id $id 
        $plat = plat::find($id);
        
        return view('plats.show')->with('plat',$plat);
        return redirect('/tr')->with('plat',$plat);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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


    public function getPlats(){
        $plats= Plat::all();

        return view("Plats.show")->with('plats',$plats);
    }
}
