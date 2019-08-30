@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Consulter Panier</div>

        <div class="card-body">
            <div class="row">
                <h3 class="col-4">Commande</h3>
                <a href="/plats" class="btn btn-lg btn-primary col-4 offset-3"> Ajouter un plat </a>
            </div>
            <br>
            @if (count($plats) > 0)
                <table class="table table-striped">
                    <tr>
                            <th>Nom</th>
                            <th>Type</th>
                            <th>Prix</th>
                            <th>Edit</th>
                    </tr>
                    @foreach ($plats as $plat)
                        <tr>
                            <td>{{$plat->nom}}</td>
                            <td>{{$plat->type}}</td>
                            <td>{{$plat->prix}} DZD</td>
                            <td>
                                {{ Form::open(['url' => '/removePlatFromPanier' ,'method' => 'post']) }}
    
                                    @csrf
                                    {{Form::hidden('plat',$plat->id)}}
                                    {{Form::submit('Enlever',['class' => 'btn btn-lg btn-danger'])}}
                                {{ Form::close() }}
                            </td>          
                        </tr>                  
                    @endforeach
                </table>
                {{ Form::open(['url' => '/commande' ,'method' => 'post']) }}
    
                @csrf
                    {{Form::submit('confirmer',['class' => 'btn btn-lg btn-success offset-8 col-3'])}}
                    {{ Form::close() }}
            @endif
        </div>
    </div>
</div>
</div>
</div>
@endsection