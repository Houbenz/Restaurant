    @extends('layouts.app')

    @section('content')
        
    <div class="container pt-5">

        <h3 class="text-center display-3 mb-5">Tout les plâts !</h3>
    @if (count($plats) > 0)
                
    <ul class="cards">
        @foreach ($plats as $plat) 
            <li class="cards__item">
                <div class="card" style="width:18rem;height:22rem">
                <a href="/plats/{{$plat->id}}" class="custom-card">
                        <div class=" cover card__image card__image--fence" style="background-image:url('storage/cover_images/{{$plat->cover_image}}')">
                        </div>
                </a>

                    <div class="card__content">
                        <div class="card__title text-center" ><a href="/plats/{{$plat->id}}" class="custom-card">{{$plat->nom}}</a></div>
                        <p class="card__text">{{$plat->ingrediants}} </p>
                        @if(auth()->check())
                            @if (auth()->user()->type_client == 'responsable')
                                <a href="/plats/{{$plat->id}}/edit" class="btn btn-block card-btn btn-danger">Editer</a>
                            @else
                                <button class="btn btn-block card-btn btn-success" onclick="addToCart('{{$plat->id}}','{{$plat->nom}}')">
                                    Ajouter au commande
                                </button>
                            @endif
                        @else
                            <button class="btn btn-block card-btn btn-success" onclick="addToCart('{{$plat->id}}','{{$plat->nom}}')">
                                Ajouter au commande
                            </button>
                        @endif                    
                    </div>
                </div>
            
            </li>   
            @endforeach
    @endif
</ul>
</div>
@endsection

