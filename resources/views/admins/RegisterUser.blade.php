@extends('admins.home')

@section('admin-content')


<div class="container-fluid">
    <div class="row">

        <div class="col-3"></div>
        <div class="col-6">

            <form action="/registerUser" method="post" class="border p-4 shadow-lg mt-4">

                @csrf
                <label for="nom">Nom :</label>
                <input type="text" class="form-control  @error('nom') is-invalid @enderror" id="nom" name="nom" required>
                @error('nom') 
                <div class="invalid-feedback" role="alert"><strong class="text-danger">{{$message}}</strong></div> 
                @enderror

                <label for="email">Email :</label>
                <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" required>
                @error('email') 
                <div><strong class="text-danger">{{$message}} whast</strong></div> 
                @enderror

                <label for="num_tel">{{ __('Numero de Tél : ') }}</label>
                <input id="num_tel" type="text" class="form-control  @error('num_tel') is-invalid @enderror"  pattern="[0-9]{10}" name='num_tel' required>
                @error('num_tel') 
                <div><strong class="text-danger">{{$message}}</strong></div> 
                @enderror
                <label for="adresse">Adresse :</label>
                <input type="text" class="form-control  @error('adresse') is-invalid @enderror" id="adresse" name="adresse" required>
                @error('adresse') 
                <div><strong class="text-danger">{{$message}}</strong></div>  
                @enderror

                <label for="password">Mot de passe : </label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" required> 
                @error('password') 
                <div><strong class="text-danger">{{$message}}</strong></div>  
                @enderror
                
                <label for="password_confirmation">Confirmer le mot de passe : </label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                
                <label for="type_client">Type d'utilisateur : </label>
                <select name='type_client' id='type_client' class="mdb-select md-form colorful-select dropdown-primary form-control" required>
                        <option value="serveur">Serveur</option>
                        <option value="client_dedans">Table pour client</option>
                        <option value="cuisinier">Cuisinier</option>
                        <option value="responsable">Responsable de commande</option>
                        <option value="livreur">Livreur</option>
                </select>

                <button type="submit" class="btn btn-success mt-4 form-control text-uppercase">Enregistrer l'utilisateur</button>

            </form>
            
        </div>
        <div class="col-3"></div>
    </div>
</div>
    
@endsection

