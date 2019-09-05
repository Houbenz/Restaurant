@extends('layouts.app')





@section('content')
@if ($errors)

@if (count($errors) > 0)

@foreach ($errors as $error)
    
<div class="alert alert-danger">{{$error}}</div>

@endforeach

@endif
    
@endif

@if (session('message'))@if ($errors)

@if (count($errors) > 0)

@foreach ($errors as $error)
    
<div class="alert alert-danger">{{$error}}</div>

@endforeach

@endif
    
@endif

@if (session('message'))

<div class="alert alert-success">{{session('message')}}</div>

@endif

@endif

<div class="container">
    <div class="row">

        <div class="col-3"></div>
        <div class="col-6" class=" ">

            <form action="/registerUser" method="post" class="border p-4 shadow-lg mt-4">

                @csrf
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" required>

                <label for="name">Email :</label>
                <input type="email" class="form-control" id="email" name="email" required>
                
                <label for="num_tel">{{ __('Numero de Tél : ') }}</label>
                <input id="num_Tel" type="text" class="form-control"  pattern="[0-9]{10}" name='num_tel' required>


                <label for="name">Adresse :</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>

                <label for="password">Mot de passe : </label>
                <input type="password" class="form-control" id="password" name="password" required> 
                
                <label for="password_confirmation">Confirmer le mot de passe : </label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                
                <label for="type_client">Type d'utilisateur : </label>
                <select name='type_client' id='type_client' class="mdb-select md-form colorful-select dropdown-primary form-control" required>
                        <option value="serveur">Serveur</option>
                        <option value="client_dedans">Table pour client</option>
                        <option value="cuisinier">Cuisinier</option>
                        <option value="responsable_commande">Responsable de commande</option>
                        <option value="livreur">Livreur</option>
                </select>

                <button type="submit" class="btn btn-success mt-4 form-control text-uppercase">Enregistrer l'utilisateur</button>

            </form>
            
        </div>
        <div class="col-3"></div>
    </div>
</div>
    
@endsection

