
<div class="navbar fixed-top navbar-expand bg-dark text-white">

    <span class="navbar-brand h3 font-weight-bold">
        <span class="text-warning">RESTA</span><span class="text-primary">URANT</span> </span> 

        <div class="navbar-nav mr-auto">
        
            @auth
                @if (auth()->user()->type_client !== 'admin')
                    <a href="{{route('home')}}" class="nav-item nav-link h5 text-white active">Home</a>
                @else                 
                    <a href="/adminHome" class="nav-item nav-link h5 text-white active">Home</a>
                @endif
                    <a href="/plats" class="nav-item nav-link h5 text-white">Menu</a>
            
        
             @endauth
         
        </div>
        <div class="navbar-nav ml-auto">

            <!--Notification panel-->
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


            @if(Route::has('login'))
              @auth

              <div class="dropdown">
                 <span style="cursor:pointer" class=" btn btn-grey nav-link drop-down dropdown-toggle text-white mr-5" data-toggle="dropdown">
                     <strong> {{Auth::user()->nom}} </strong></span>
                 <div class="dropdown-menu">

                       
                 <a href="/user" class="dropdown-item">Profile</a>    
                 <a href="/commandes" class="dropdown-item">Mes commandes</a>
                
                <!--test du type de clien pour afficher le bon drop menu juste pour ne pas oublier-->
                @if (auth()->user()->type_client == 'responsable')
                    <a href="/plats/create" class="dropdown-item">Ajouter un plat</a>
                @endif
                @if(auth()->user()->type_client !== 'client_dehors')     
                    <a href="/listeCommandes" class="dropdown-item">Commandes a controller</a>
                @endif
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