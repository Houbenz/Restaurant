
<div class="navbar fixed-top navbar-expand bg-dark text-white">

    <span class="navbar-brand h3 font-weight-bold">
        <span class="text-warning">RESTA</span><span class="text-primary">URANT</span> </span> 

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
                            
                            @break
                            
                            @case('serveur')
                            <a href="/listeServeur" class="nav-item nav-link h5 text-white active">Page d'accueil</a>
                                
                            @break
                            @case('caissier')
                            <a href="/listeCaissier" class="nav-item nav-link h5 text-white active">Page d'accueil</a>
                                
                            @break

                            @default
                            <a href="{{route('home')}}" class="nav-item nav-link h5 text-white active">Page d'accueil</a>
                            <a href="/plats" class="nav-item nav-link h5 text-white">Menu</a>
                    @endswitch
            @endauth
        </div>
        <div class="navbar-nav ml-auto">

            @auth
            @if (auth()->user()->type_client == 'client_dehors' ||auth()->user()->type_client == 'client_dedans' )
                
           
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

            @endif          
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



                    <a href="/user" class="dropdown-item">Profile</a>    

                           @switch(auth()->user()->type_client)
                                   @case('admin')
       
                                   @break
       
                                   @case('chef_cuisinier')
                                   <a href="/listeCommandes" class="dropdown-item">Commandes a controller</a>
                                   
                                   @break
       
                                   @case('responsable')                    
                                   <a href="/plats/create" class="dropdown-item">Ajouter un plat</a>
                                   <a href="/listeCommandes" class="dropdown-item">Commandes a controller</a>
                                   
                                   @break
                                   
                                   @case('serveur')
                                   <a href="/listeServeur" class="dropdown-item">Commandes a controller</a>
                                       
                                   @break
                                   @case('caissier')
                                   <a href="/listeCaissier" class="dropdown-item">Commandes a controller</a>
                                       
                                   @break
       
                                   @default
                                   <a href="/commandes" class="dropdown-item">Mes commandes</a>
                           @endswitch     
                           
                           <form action="{{route('logout')}}" method="POST">
                               @csrf
                           <button type="submit" class=" dropdown-item text-danger ">Logout</button>
                           </form>                    
                
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