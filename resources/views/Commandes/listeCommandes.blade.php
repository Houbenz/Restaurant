@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-10">
    <div class="card">
        <div class="card-header">Liste des Commande</div>

        <div class="card-body">
            <div class="row">
                <h3 class="col-4">Commande</h3>
            </div>
            <br>
            @if (count($commandes) > 0)
                <table class="table table-striped">
                    <tr>
                            <th>Num</th>
                            <th>Nom du client</th>
                            <th>Num tel</th>
                            <th>Total</th>
                            <th>Valider</th>
                            <th>Annuler</th>
                    </tr>
                    @foreach ($commandes as $commande)
                        <tr>
                            <td>{{$commande->id}}</td>
                            <td>{{$commande->client->nom}}</td>
                            <td>{{$commande->client->num_tel}}</td>
                            <td>{{$totals[$commande->id]}}.00 DZD</td>
                            <td>
                                {{ Form::open(['url' => '/validerCommande' ,'method' => 'post']) }}
    
                                    @csrf
                                    {{Form::hidden('commande',$commande->id)}}
                                    {{Form::submit('Valider',['class' => 'btn btn-info'])}}
                                {{ Form::close() }}
                            </td>
                            <td>
                                    {{ Form::open(['url' => '/annulerCommande' ,'method' => 'post']) }}
                                        @csrf
                                        {{Form::hidden('commande',$commande->id)}}
                                        {{Form::submit('Annuler',['class' => 'btn btn-warning'])}}
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