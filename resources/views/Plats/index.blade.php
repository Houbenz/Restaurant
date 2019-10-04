@extends('layouts.app')

@section('content')
        
    <div class="container">
        <div id="accordion">
            <div class="card">
                <div class="card-header text-center">
                    <h5 class="card-link" data-toggle="collapse" href="#collapseOne">
                        Recherche Menu
                    </h5>
                </div>
                <div id="collapseOne" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row col-12">
                            <form class="form-inline col-12" action="/recherchePlats" method="get" id="recherchePlats" >
                                <div class="form-group col-12 col-md-5 text-center">
                                    <label for="type">Type: </label>
                                    <select class="form-control offset-1 col-12 col-md-5" name="type" id="type">
                                        <option value="%">Tout les repas</option>
                                        <option value="pizza">Nos Pizzas</option>
                                        <option value="sandwich">Nos Sandwichs</option>
                                        <option value="plat">Nos Plats</option>
                                        <option value="boisson">Nos Boisson</option>
                                    </select>
                                </div>                            
                                <div class="form-group col-md-5 col-12 text-center">
                                        <label for="prix">Prix: </label>
                                        <input type="number" class="form-control offset-1 col-12 col-md-5" name="prix" id="prix" aria-describedby="helpId" placeholder="">
                                        <small id="helpId" class="form-text text-muted offset-1"> prix < à</small>
                                </div>
                                <button type="submit" class="btn btn-primary offset-1 offset-md-0 col-md-2 col-12">Submit</button>
                            </form>
                        </div>
                        <div class="row col-12" id="resultat">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                    <div class="card-header text-center">
                        <h5>
                            <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                                    Tout les plâts !
                            </a>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            @include('inc.platsCards')
                        <div class="row">
                            <div class="offset-md-5">
                                    {{$plats->links()}}
                            </div>
                        </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <style>
        .card-link{
            cursor: pointer;
            color: #696969;
        }
        .card-link:hover{
            color: black
        }    
    </style>
    <script>
        $("#recherchePlats").submit(function(event){
            event.preventDefault(); //prevent default action 
            var post_url = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = $(this).serialize(); //Encode form elements for submission
            
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data
            }).done(function(response){ //
                $("#resultat").html(response);
                AOS.refreshHard();
            });
        });
    </script>
@endsection

