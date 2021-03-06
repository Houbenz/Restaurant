
<div class="navbar fixed-top navbar-expand-md bg-dark navbar-dark text-white">

    <a class="navbar-brand h3 font-weight-bold" href="/">
        <span class="text-warning">RESTA</span><span class="text-primary">URANT</span> 
    </a> 
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">

        <div class="navbar-nav mr-auto">

            @auth      
                    @switch(auth()->user()->type_client)
                            @case('admin')
                            
                            <a href="/adminHome" class="nav-item nav-link h5 text-white active">Page d'accueil</a>

                            @break

                            @case('chef_cuisinier')
                            <a href="/listeCommandes" class="nav-item nav-link h5 text-white active">Page d'accueil</a>
                            
                            @break

                            @case('responsable')                    
                            <a href="/listeCommandes" class="nav-item nav-link h5 text-white active">Page d'accueil</a>
                            <a href="/plats" class="nav-item nav-link h5 text-white">Menu</a>

                            @break
                            
                            @case('serveur')
                            <a href="/listeServeur" class="nav-item nav-link h5 text-white active">Page d'accueil</a>
                                
                            @break
                            @case('caissier')
                            <a href="/listeCaissier" class="nav-item nav-link h5 text-white active">Page d'accueil</a>
                                
                            @break

                            @default
                            <a href="/plats" class="nav-item nav-link h5 text-white">Menu</a>
                            <a href="{{route('home')}}" class="nav-item nav-link h5 text-white active">Page d'accueil</a>
                    @endswitch
            @endauth
            @guest
                <a href="/plats" class="nav-item nav-link h5 text-white">Menu</a>
            @endguest

        </div>
        <div class="navbar-nav ml-auto">

            @auth
            @if (auth()->user()->type_client == 'client_dehors' ||auth()->user()->type_client == 'table' )
                
           
                <!--cart auth panel-->
                <a class="btn btn-light  text-white mr-3" href="/panier">
                            
                    <img src="{{asset('pictures/cart.svg')}}" alt="img" width="32" height="32">
                    <span id='cart_quantity' class="badge badge-light" style="margin-left:-4px">

                        @if (session('plats'))
                                {{count(session('plats'))}}  
                        @else
                                0
                        @endif
                    </span>
                </a>
                <!--Notification panel  -->


                <div class="dropdown mr-1" >
                    <span style="cursor:pointer" 
                    class=" btn btn-dark nav-link drop-down dropdown-toggle text-white mr-5" 
                    data-toggle="dropdown"
                    onclick="load_new_notification()">
                    
                    <img src="{{asset('pictures/bell.svg')}}" alt="img" width="32" height="32">
                        <span id='notifSpan' class="badge badge-light">0</span>
                    </span>

                    <div class="dropdown-menu" id='putNotification'>

                        <!-- put your notifications here -->
                            
                    </div>
                </div>
            @endif          
            @endauth
            @guest
                 <!--cart guest panel-->
                 <a class="btn btn-light  text-white mr-3" href="/panier">
                            
                    <img src="{{asset('pictures/cart.svg')}}" alt="img" width="32" height="32">
                    <span id='cart_quantity' class="badge badge-light" style="margin-left:-4px">

                        @if (session('plats'))
                                {{count(session('plats'))}}  
                        @else
                                0
                        @endif
                    </span>
                </a>
            @endguest

            @if(Route::has('login'))
              @auth

              <div class="dropdown mr-5">
                 <span style="cursor:pointer" class=" btn btn-grey nav-link drop-down dropdown-toggle text-white mr-5" data-toggle="dropdown">
                     <strong> {{Auth::user()->nom}} </strong></span>
                 <div class="dropdown-menu">
                    
                    @include('inc.dropmenu')
                 
                </div>
             </div>
           
             @else
                    <a href="{{route('register')}}" class="nav-item btn btn-warning mr-3">Register</a>

                 @if(Route::has('register'))

                 <a href="{{route('login')}}" class="nav-item btn btn-primary " >Login</a>

                 @endif

              @endauth

             @endif
        </div>
    </div>
</div>