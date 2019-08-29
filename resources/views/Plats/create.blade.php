@extends('layouts.app')

@section('content')
        <div class='jumbotron text-center col-8 offset-2'>
            <h3>Ajouter un nouveu plat</h3>
            <br>
                 @if(count($errors) > 0)
            
                    @foreach ($errors as $error)
                        <div class="alert alert-danger">
                            {{$errors}}
                        </div>
                        <br><br>
                    @endforeach
                @endif
                @if(session('message'))
                    <div class="alert alert-success">
                            {{session('message')}}
                    </div>
                    <br><br>
                @endif
                
            {{ Form::open(['action' => 'platsController@store' ,'method' => 'post','enctype' => 'multipart/form-data']) }}
                
                @csrf
                    <div class="form-group">
                        {{Form::label('nom','Nom du plat :')}}
                        {{Form::text('nom','',['placeholder' => 'Nom du plat','class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('type','type :')}}
                        <select name='type' class="mdb-select md-form colorful-select dropdown-primary form-control">
                                <option value="pizza">Pizza</option>
                                <option value="sandwich">Sandwich</option>
                                <option value="plat">Plat</option>
                                <option value="boisson">Boisson</option>
                                <option value="dessert">Dessert</option>
                        </select>
                    </div>

                    <div class="form-group">
                        {{Form::label('ingrediant','Ingrediants :')}}
                        {{Form::text('ingrediant','',['placeholder' => 'thon,fromage,viande,nutella','class' => 'form-control'])}}
                    </div>
                
                    <div class="form-group">
                        {{Form::label('prix','Prix :')}}
                        {{Form::Number('prix','',['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('disp','Disponibilité du plat :')}}
                        <select name='disp' class="mdb-select md-form colorful-select dropdown-primary form-control">
                                <option value="0">Disponible</option>
                                <option value="1">Non disponible</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                        {{Form::file('cover_image')}}
                    </div>

                {{Form::submit('Ajouter Plat',['class' => 'offset-9 btn btn-lg btn-primary col-3'])}}
                {{ Form::close() }}
        </div>
@endsection
