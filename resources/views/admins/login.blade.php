@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">

        <div class="col-3"></div>
        <div class="col-6" class=" ">

            <form action="/loginAdmin" method="post" class="border p-4 shadow-lg mt-4">

                @csrf

                <label for="name">Email :</label>
                <input type="email" class="form-control" id="email" name="email">
                
                <label for="password">Mot de passe : </label>
                <input type="password" class="form-control" id="password" name="password">
                
                <button type="submit" class="btn btn-success mt-2 form-control text-uppercase">S'authentifier</button>

            </form>
            
        </div>
        <div class="col-3"></div>
    </div>
</div>
    
@endsection

