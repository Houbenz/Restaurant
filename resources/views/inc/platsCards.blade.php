@if (count($plats) > 0)
@php
    $i=0;
@endphp    <ul class="cards col-12">
        @foreach ($plats as $plat) 
            <li class="cards__item" data-aos="fade-up" data-aos-offset="{{200+($i%150)}}">
               
                @php
                    $i +=50;
                @endphp
                <div class="card" style="width:18rem;height:24rem">
                    <a href="/plats/{{$plat->id}}" class="custom-card">
                        <div class=" cover card__image card__image--fence" style="background-image:url('storage/cover_images/{{$plat->cover_image}}')">
                        </div>
                    </a>

                    <div class="card__content">
                        <div class="card__title text-center" ><a href="/plats/{{$plat->id}}" class="custom-card">{{$plat->nom}}</a></div>
                        <p class="card__text">ingredients: {{$plat->ingrediants}}</p>
                        <p class="card__text"><strong>Prix: {{$plat->prix}}.00DZD</strong> </p>
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
    </ul>
@endif
