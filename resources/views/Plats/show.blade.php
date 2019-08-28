@extends('layouts.app')

@section('content')
    <div class='jumbotron text-center col-8 offset-2'>
        name : {{$user->nom}}
        <br>
        num tel: {{$user->num_tel}}
        <br>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif        
@endsection