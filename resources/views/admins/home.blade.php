@extends('layouts.app')


@section('content')
    


<div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
          <div class="sidebar-heading">Options </div>
          <div class="list-group list-group-flush">
            <a href="/register_user" class="list-group-item list-group-item-action bg-light">Ajouter un employé</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Ajouter un plat</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Voir les utilsateurs</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Toutes les commandes</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Mon Profile</a>
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
              <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
    
          <div class="container-fluid text-center mt-4">
                @if($name)
                <h3> Bonjour {{$name}} </h3>
                @endif
              </div>
        </div>
        <!-- /#page-content-wrapper -->
    
      </div>

<div class="container-fluid p-5">

    <div class="row text-center d-flex justify-content-center">
        <div class="col-3">  
        </div>
        <div class="col-6">

      

        </div>
        <div class="col-3"></div>
    </div>
</div>
@endsection