@extends('layouts.app')


@section('content')
<div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
          <div class="sidebar-heading">Options </div>
          <div class="list-group list-group-flush">
            <a href="/register_user" class="list-group-item list-group-item-action bg-light">Ajouter un employé/Table</a>
            <a href="/all_users" class="list-group-item list-group-item-action bg-light">Voir les utilsateurs</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Toutes les commandes</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Mon Status</a>
          </div>
        </div>
        <!-- /#sidebar-wrapper -->
    
        <!-- Page Content -->
        <div id="page-content-wrapper">
    
          <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Voir plus</button>
    
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
          </nav>
    
          <div class="container-fluid text-center mt-4">
                @if(auth()->user())
                <h3> Bonjour {{auth()->user()->nom}} </h3>
                @endif
                
                 @yield('admin-content')
              </div>
        </div>
        <!-- /#page-content-wrapper -->
    
      </div>


@endsection