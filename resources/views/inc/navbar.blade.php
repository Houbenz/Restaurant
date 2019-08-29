
<div class="navbar fixed-top navbar-expand bg-dark text-white">

    <span class="navbar-brand h3 font-weight-bold">
        <span class="text-warning">RESTA</span><span class="text-primary">URANT</span> </span> 

        <div class="navbar-nav mr-auto">
        <a href="{{route('home')}}" class="nav-item nav-link h5 text-white active">Home</a>
            <a href="#" class="nav-item nav-link h5 text-white">Contact</a>
            <a href="#" class="nav-item nav-link h5 text-white">About Us</a>
        </div>
        <div class="navbar-nav ml-auto">
            @if(Route::has('login'))
              @auth
              <div class="dropdown">
                 <span style="cursor:pointer" class=" btn btn-grey nav-link drop-down dropdown-toggle text-white mr-5" data-toggle="dropdown">
                     <strong> {{Auth::user()->nom}} </strong></span>
                 <div class="dropdown-menu">
                     <a href="/plats" class="dropdown-item">Menus</a>
                    
                    <a href="/user" class="dropdown-item">Profile</a>
                    
                    <!-- just poure le responsable-->
                    @if (auth()->user()->type_client == 'responsable')
                        <a class="dropdown-item" href="/plats/create">Ajouter un plat</a>
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