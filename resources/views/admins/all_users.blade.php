@extends('admins.home')

@section('admin-content')

<div class="container-fluid mt-4">

    <div class="row">
        <div class="col-12">


            <table class="table table-striped">

                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nom </th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>num° Tél</th>
                        <th>Type</th>
                        <th>Confirmer</th>
                        <th>Modifier</th>                     
                        <th>Bloquer</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users)
                        @foreach ($users as $user)        
                            <tr>                                                                      
                                <th>{{$user->id}}</th>
                        <form action="/modify" method="post">
                                @csrf

                            <td><input type="text" id="nom{{$user->id}}" value="{{$user->nom}}" required name="nom{{$user->id}}" disabled class="form-control"></td>
                                <td><input type="email" id="email{{$user->id}}" value="{{$user->email}}" required name="email{{$user->id}}" disabled class="form-control"></td>
                                <td><input type="text" id="adresse{{$user->id}}" value="{{$user->adresse}}" required name="adresse{{$user->id}}" disabled class="form-control"></td>
                                <td><input type="text" id="num_tel{{$user->id}}" value="{{$user->num_tel}}" required name="num_tel{{$user->id}}" disabled class="form-control" pattern="[0-9]{10}" ></td>
                                <td><input type="text" id="type_client{{$user->id}}" value="{{$user->type_client}}" required name="type_client{{$user->id}}" disabled class="form-control"></td>
                    <!-- pour envoyer le formulaire -->                          
                                <td>
                                    <input type="text" hidden name="id" value="{{$user->id}}">
                                <button class="btn btn-success btn-more pull-right"> 
                                <img src="{{asset('/pictures/confirm.svg')}}" alt="Confirmer" width="32" height="32">
                                </button>
                                </td>
                        </form> 
                                <!-- pour annuler le disabled sur les inputs -->
                                <td> <button class="btn btn-dark btn-more pull-right"  onclick="enableInputsAdmin({{$user->id}})"> 
                                    <img src="{{asset('/pictures/editButton.svg')}}" alt="modifier button" width='32' height='32'></td>
                                    </button>
                                
                                <!-- pour bloquer un utilisateur --> 
                                <form action="/bloque" method="post">
                                    @csrf
                                        <td>
                                        <button class="btn btn-danger btn-more pull-right"> 
                                        <img src="{{asset('/pictures/trash.svg')}}" alt="Bloque" width="32" height="32">
                                        </button>
                                        </td>
                                </form>
  
                            </tr> 
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection