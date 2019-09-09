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
                            <h3 class="col-4">Commandes {{$commandes[0]->type}}s</h3>
                            </div>
                            <br>
                            <table class="table table-striped">
                                <tr>
                                        <th>Num</th>
                                        <th>Table</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                </tr>
                                @foreach ($commandes as $commande)
                                    <tr>
                                        <td>{{$commande->id}}</td>
                                        <td>{{$commande->client->nom}}</td>
                                        <td>{{$totals[$commande->id]}}.00 DZD</td>
                                        <td>
                                            @if ($commande->etat == 'lancer')
                                                {{ Form::open(['url' => '/etatCommande' ,'method' => 'post']) }}
                                                    @csrf
                                                    {{Form::hidden('commande',$commande->id)}}
                                                    {{Form::hidden('etat','valider')}}
                                                    {{Form::submit('Valider',['class' => 'btn btn-info col-12'])}}
                                                {{ Form::close() }}
                                            @else
                                                {{ Form::open(['url' => '/etatCommande' ,'method' => 'post']) }}
                                                    @csrf
                                                    {{Form::hidden('commande',$commande->id)}}
                                                    {{Form::hidden('etat','prete')}}
                                                    {{Form::submit('Commande prete',['class' => 'btn btn-warning col-12'])}}
                                                {{ Form::close() }}
                                            @endif
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
