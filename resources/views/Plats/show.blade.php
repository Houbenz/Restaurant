@extends('layouts.app')

@section('content')
    

<div class="container pt-5">

    <h3 class="text-center display-3 mb-4">Tout les plâts !</h3>

    <ul class="cards">

        @if (count($plat) > 0)
        {            
                <li class="cards__item">
                <div class="card" style="width:18rem;height:22rem">
                    <div class=" cover card__image card__image--fence" style="background-image:url('storage/cover_images/{{$plat->cover_image}}')"></div>
                    <div class="card__content">
                    <div class="card__title">{{$plat->nom}}</div>
                    <p class="card__text">{{$plat->ingrediants}} </p>
                    <button class="btn btn--block card__btn btn-success">Acheter</button>
                    </div>
                </div>
            
                </li>
        }

        }@else{
            <br>
            <div class="jumbotron text-center">
                <h2>Aucun Plat dans</h2>
            </div>
        }
        @endif
    </ul>
</div>
@endsection