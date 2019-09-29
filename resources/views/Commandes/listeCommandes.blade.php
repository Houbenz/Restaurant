@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-10">
    <div class="card">
        <div class="card-header row">
            <small class="offset-1">
                User : {{auth()->user()->nom}}
            </small>
            <small class="offset-7">
                    {{strftime("%m/%d/%Y %H:%M")}}
            </small>
        </div>

        <div class="card-body">
            @if (count($commandes) > 0)

                <div class="row">
                <h3 class="col-4">Commandes {{$commandes[0]->type}}</h3>
                </div>
                <br>
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
                        
                            <td>
                                <a id="details" data-toggle="tooltip" data-placement="left" title="Detail de la commande" href="/commandes/{{$commande->id}}">
                                    {{$commande->id}}
                                </a>
                                <script>
                                    function hide(){
                                        $('#details').tooltip('hide');
                                    }
                                     $('#details').tooltip('show');
                                    setTimeout(hide,2000);
                                    $('[data-toggle="tooltip"]').tooltip();

                                </script>
                            </td>
                            <td>{{$commande->client->nom}}</td>
                            <td>{{$commande->client->num_tel}}</td>
                            <td>{{$totals[$commande->id]}}.00 DZD</td>
                            <td>
                                {{ Form::open(['url' => '/etatCommande' ,'method' => 'post']) }}
    
                                    @csrf
                                    {{Form::hidden('commande',$commande->id)}}
                                    {{Form::hidden('etat','valider')}}
                                    {{Form::submit('Valider',['class' => 'btn btn-info'])}}
                                {{ Form::close() }}
                            </td>
                            <td>    
                                {{ Form::open(['url' => '/etatCommande' ,'method' => 'post']) }}
                                    @csrf
                                    {{Form::hidden('commande',$commande->id)}}
                                    {{Form::hidden('etat','annuler')}}
                                    {{Form::submit('Annuler',['class' => 'btn btn-warning'])}}
                                {{ Form::close() }}
                            </td>          
                        </tr>                  
                    @endforeach
                </table>
            @endif
        </div>
    </div>
</div>
</div>
</div>
@endsection