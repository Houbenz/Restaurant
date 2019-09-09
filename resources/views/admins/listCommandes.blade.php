@extends('admins.home')


@section('admin-content')


<div class="container-fluid">

    <div class="row">
        <div class="col-12">


            <table class="table table-striped">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Serveur</th>
                        <th>Valideur</th>
                        <th>Etat</th>
                        <th>type</th>
                    </tr>

                </thead>
                    <tbody>

                        @if ($commandes)
                            @foreach ($commandes as $commande)                 
                        <tr>
                            <th>{{$commande->id}}</th>
                            <td>{{$commande->client->nom}}</td>
                                @if ($commande->serveur)                                
                                <td>{{$commande->serveur->nom}}</td>
                                @else
                                <td>/</td>
                                @endif
                            
                                @if ($commande->valideur)                                
                                <td>{{$commande->valideur->nom}}</td>
                               @else
                                <td>/</td>
                               @endif
                            
                                <td>{{$commande->etat}}</td>
                                <td>{{$commande->type}}</td>
                        </tr>
                         @endforeach
                        @endif
                    </tbody>

            </table>
        </div>
    </div>
</div>


@endsection