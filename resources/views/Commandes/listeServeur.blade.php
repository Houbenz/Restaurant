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
                            <th>Client</th>
                            <th>Adresse</th>
                            <th>num Tel</th>
                            <th>Total</th>
                            <th>Action</th>
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
                            @if ($commande->client->type_client == 'client_dehors')
                                <td>{{$commande->client->adresse}}</td>
                                <td>{{$commande->client->num_tel}}</td>
                            @else
                                <td>/</td>
                                <td>/</td>
                            @endif
                            <td>{{$totals[$commande->id]}}.00 DZD</td>
                            <td>
                                {{ Form::open(['url' => '/etatCommande' ,'method' => 'post']) }}
                                    @csrf
                                    {{Form::hidden('commande',$commande->id)}}
                                    @if ($commande->etat == 'prete')
                                        {{Form::hidden('etat',$etat = 'servi')}}
                                    @else
                                        
                                    {{Form::hidden('etat',$etat = 'encaisser')}}
                                            
                                    @endif
                                    {{Form::submit('Commande '.$etat,['class' => 'btn btn-warning col-12'])}}
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