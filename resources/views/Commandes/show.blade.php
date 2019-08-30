@extends('layouts.app')

@section('content')
    

    <div class="container p-5 border">


        @if ($plats)
            
        @if ($command_id)
            
           <h3 class="text-center">Commande Num°:{{$command_id}}</h3>
        @endif
             <h5>Contenu : </h5>

            @if (count($plats) > 0)
                
            @foreach ($plats as $plat)
        <div class="row p-4 mt-4 border align-items-center " style="height:200px;">
                <div class="col-8">
            
                        <img src="{{asset('/storage/cover_images/'.$plat->cover_image)}}" alt="image" width="256"height="256" class="img-thumbnail pull-left mr-2" style="width:14rem;height:10rem;size:unset"">
                        <h3>{{$plat->nom}}</h3>
                        <p ><strong>Ingrédients :</strong>  {{$plat->ingrediants}}</p>
                    </div>      
            <div class="col-4"> <h5>Prix : {{$plat->prix}}.00DZD</h5> </div>
            </div>
            @endforeach
            
            @else
            @endif 
        @endif

            <div class="row p-2 d-flex mt-4">
                <div class="col-3"></div>
                <div class="col-6">
                    <h3 class="text-center">Total : 1200.00DZD</h3>
                </div>
                <div class="col-3"></div>

            </div>
 
    </div>

@endsection