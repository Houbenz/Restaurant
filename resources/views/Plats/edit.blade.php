@extends('layouts.app')

@section('content')
        <div class='jumbotron text-center col-8 offset-2'>

            <h3 class="text-center">Editer un plat</h3>
            name : {{Auth::user()->nom}}
            <br>
            type: {{$user->type_client}}
            <br>
                 @if(count($errors) > 0)
            
                    @foreach ($errors as $error)
                    <div class="alert alert-danger">
                        {{$errors}}
                    </div>
                    @endforeach
                @endif
                @if(session('message'))
                <div class="alert alert-success">
                        {{session('message')}}
                </div>
                @endif
                
            <br><br><br>
            {{ Form::open(['action' => ['platsController@update',$plat->id] ,'method' => 'post','enctype' => 'multipart/form-data']) }}
                
                    @method('PUT')
                @csrf
                        <div class="form-group">
                            {{Form::label('nom','Nom Plat :')}}
                            {{Form::text('nom',$plat->nom,['placeholder' => 'Nom du plat','class' => 'form-control'])}}
                        </div>

                        <div class="form-group">
                                {{Form::label('type','type :')}}
                                {{Form::text('type',$plat->type,['placeholder' => 'pizza,sandwich...','class' => 'form-control'])}}
                        </div>

                        <div class="form-group">
                                {{Form::label('ingrediants','Ingrediants :')}}
                                {{Form::text('ingrediants',$plat->ingrediants,['placeholder' => 'thon,fromage,viande,nutella','class' => 'form-control'])}}
                        </div>
                        
                        <div class="form-group">
                                {{Form::label('prix','prix :')}}
                                {{Form::Number('prix',$plat->prix,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                                {{Form::label('disponibilite','disponibilite :')}}
                                {{Form::select('disponibilite',array(0 => 'Disponible',1 => 'Non disponible'),0,['class' => 'form-control'])}}
                        </div>
                        
                        <div class="form-group">
                            {{Form::file('cover_image'),asset('/storage/cover_images'.$plat->cover_image)}}
                        </div>

                        {{Form::submit('Save post',['class' => 'offset-9 btn btn-lg btn-primary col-3'])}}
                {{ Form::close() }}
            </div>
@endsection
