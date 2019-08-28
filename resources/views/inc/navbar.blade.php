
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
        <span class=" nav-link drop-down text-white mr-2"><strong> {{Auth::user()->nom}} </strong></span>

        <form action="{{route('logout')}}" method="POST">
            @csrf
        <button type="submit" class="btn btn-danger ">Logout</button>
        </form>
             @else
                    <a href="{{route('register')}}" class="nav-item btn btn-warning mr-3">Register</a>

                 @if(Route::has('register'))

                 <a href="{{route('login')}}" class="nav-item btn btn-primary " >Login</a>

                 @endif

              @endauth

             @endif
        </div>
</div>