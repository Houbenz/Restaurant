@extends('layouts.app')

@section('content')
    

<div class="container pt-5">

    <h3 class="text-center display-3 mb-4">Tout les plâts !</h3>

    @if (count($plat) > 0)     
                <div class="card" style="width:18rem">
                    <div class="card-image-top" style="width : 100%" src="../storage/cover_images/{{$plat->cover_image}}">
                        {{$plat->cover_image}}
                    </div>
                    <div class="card-body">
                        <div class="card-title">{{$plat->nom}}</div>
                        <p class="card-text">{{$plat->ingrediants}} </p>
                       
                        @if (auth()->user()->type_client == 'responsable')
                            <a href="/plats/{{$plat->id}}/edit" class="btn btn-block card-btn btn-danger">Editer</a>
                        @else
                            <button class="btn btn-block card-btn btn-success">Ajouter au commande</button>
                        @endif
                    </div>
                </div>
        @else
            <br>
            <div class="jumbotron text-center">
                <h2>Aucun Plat dans</h2>
            </div>
        @endif
</div>
@endsection