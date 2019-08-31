@extends('layouts.app')

@section('content')


<div class="container border p-5 text-center">
        <h3 class="pb-5">Vos commandes</h3>

        @if(session('message'))
        <div class="alert alert-success text-center fade show alert-dismissible">{{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
        
    <div class="row text-center d-flex justify-content-center align-items-center">



        @if ($commandes)
            @if ( count($commandes)> 0)    
                    @foreach ($commandes as $commande)

                    <div class="col-4"></div>
                    <div class="col-4 p-3 mb-2 text-center border">
                        <h5>Commande Num°: {{$commande->id}}</h5>
                            <p>{{$commande->created_at}}</p>

                            <a href="commandes/{{$commande->id}}" 
                                class="btn btn-warning text-uppercase">Dètails</a>

                    </div>
                    <div class="col-4"></div>

                    @endforeach
            @else
            <h3 class="text-center">Vous n'avez aucune commandes</h3>
            @endif
        @endif
    </div>

</div>
    
@endsection

