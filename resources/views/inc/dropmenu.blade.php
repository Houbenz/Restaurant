


<a href="/user" class="dropdown-item">Profile</a>    

@switch(auth()->user()->type_client)
    @case('admin')

    @break

    @case('chef_cuisinier')
    <a href="/listeCommandes" class="dropdown-item">Commandes a controller</a>
    
    @break

    @case('responsable')                    
    <a href="/plats/create" class="dropdown-item">Ajouter un plat</a>
    <a href="/listeCommandes" class="dropdown-item">Commandes a controller</a>
    
    @break
    
    @case('serveur')
    <a href="/listeServeur" class="dropdown-item">Commandes a controller</a>
        
    @break
    @case('caissier')
    <a href="/listeCaissier" class="dropdown-item">Commandes a controller</a>
        
    @break

    @default
    <a href="/commandes" class="dropdown-item">Mes commandes</a>
@endswitch     

<form action="{{route('logout')}}" method="POST">
    @csrf
        <button type="submit" class=" dropdown-item text-danger ">Logout</button>
</form>                    
