@extends('layouts.app')

@section('content')

<!--  d-flex justify-content-center align-items-center //for the row -->

<div class="container border p-5 text-center">
    <h3 class="pb-5">Vos commandes</h3>       

        @if ($commandes)
            @if ( count($commandes)> 0)    


                @php
                    $i = 0;
                @endphp
                    @foreach ($commandes as $commande)

                    @if ($i % 3 == 0)
                        <div class="row text-center">                             
                        <div class="col-4 p-3 mb-2 text-center border">
                            <h5>Commande Num°: {{$commande->id}}</h5>
                                <p>{{$commande->created_at}}</p>
                                <a href="commandes/{{$commande->id}}" 
                                    class="btn btn-warning text-uppercase">Dètails</a>
                        </div>

                        @php
                            $i++;
                        @endphp
                    @else
                          <div class="col-4 p-3 mb-2 text-center border">
                            <h5>Commande Num°: {{$commande->id}}</h5>
                                <p>{{$commande->created_at}}</p>

                                <a href="commandes/{{$commande->id}}" 
                                    class="btn btn-warning text-uppercase">Dètails</a>
                                 </div>
                                
                            @php
                            $i++;
                            @endphp     
                    @endif  

                    @if ($i % 3 == 0)
                        </div>                        
                    @endif

                    @endforeach
            @else
            <h3 class="text-center">Vous n'avez aucune commandes</h3>
            @endif
        @endif

</div>
    
@endsection

