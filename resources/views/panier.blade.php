@extends('layouts.app')

@section('content')



<div class="container p-5 border">

<div class=" row d-flex justify-content-center align-items-center pb-4">

    <h3 class="text-center display-2">Votre Panier</h3>
</div>
@if ($plats)


@if(count($plats) > 0)


@foreach ($plats as $plat)

<div class="row p-4 mt-4 border align-items-center " style="height:200px;">
        <div class="col-8">

                <img src="{{asset('/storage/cover_images/'.$plat->cover_image)}}" alt="image" width="256"height="256" class="img-thumbnail pull-left mr-2" style="width:14rem;height:10rem;size:unset"">
                <h3>{{$plat->nom}}</h3>
                <p ><strong>Ingrédients :</strong>  {{$plat->ingrediants}}</p>
         </div>

    <div class="col-2"> <h5>Prix : {{$plat->prix}}.00DZD</h5> </div>

          <div class="col-2">
                {{ Form::open(['url' => '/removePlatFromPanier' ,'method' => 'post']) }}
                @csrf

                    <button class="btn btn-danger btn-more pull-right">
                    <img src="{{asset('/pictures/trash.svg')}}" alt="trash" width="32" height="32">
                    </button>

                    <!-- this is the input we send to make command  -->
                 {{Form::hidden('plat',$plat->id)}}

                 {{ Form::close() }}

        </div>
    </div>
    @endforeach

    @if ($somme)
    <div class="row d-flex justify-content-center p-4 ">
        <div class="col-3"></div>
        <div class="col-6 text-center text-uppercase"><h4 class="display-4"> Totatl : {{$somme}}.00DZD </h4></div>
        <div class="col-3"></div>
    </div>
    @endif


    {{ Form::open(['action' => 'CommandeController@store' ,'method' => 'post']) }}

    @csrf
    <div class="row d-flex justify-content-center mt-4 ">
            <div class="col-3"></div>
            <div class="col-6">
                 <button class="btn btn-success form-control text-uppercase"><strong>Commander</strong></button>
                </div>
            <div class="col-3"></div>
        </div>
        {{ Form::close() }}


        @endif

        @else

        <h3 class="text-center">Vous n'avez choisie aucun plât</h3>
        @endif


</div>

@endsection
