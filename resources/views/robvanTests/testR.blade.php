@extends('layouts.app')

@section('content')
        <div class='jumbotron text-center col-8 offset-2'>
            name : {{Auth::user()->nom}}
            <br>
            num tel: {{Auth::user()->num_tel}}
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
            {{ Form::open(['action' => 'platsController@store' ,'method' => 'post','enctype' => 'multipart/form-data']) }}
                
            @csrf
                 <div class="form-group">
                {{Form::label('nom','Nom Plat :')}}
                {{Form::text('nom','',['placeholder' => 'Nom du plat','class' => 'form-control'])}}
            </div>

            <div class="form-group">
                    {{Form::label('type','type :')}}
                    {{Form::text('type','',['placeholder' => 'pizza,sandwich...','class' => 'form-control'])}}
            </div>

            <div class="form-group">
                    {{Form::label('ingrediant','Ingrediants :')}}
                    {{Form::text('ingrediant','',['placeholder' => 'thon,fromage,viande,nutella','class' => 'form-control'])}}
            </div>
            
            <div class="form-group">
                    {{Form::label('prix','prix :')}}
                    {{Form::Number('prix','',['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                    {{Form::label('disp','disp :')}}
                    {{Form::number('disp','',['class' => 'form-control'])}}
            </div>
            
            <div class="form-group">
                {{Form::file('cover_image')}}
            </div>

            {{Form::submit('Save post',['class' => 'offset-9 btn btn-lg btn-primary col-3'])}}
        {{ Form::close() }}
        </div>
@endsection
