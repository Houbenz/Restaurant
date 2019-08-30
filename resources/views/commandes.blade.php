@extends('layouts.app')

@section('content')



<div class="container p-5 border">

<div class=" row d-flex justify-content-center align-items-center pb-4">

    <h3 class="text-center display-2">Commandes</h3>
</div>


<div class="row p-4 border align-items-center " style="height:200px;">
    <div class="col-8">
<img src="{{asset('/pictures/burger.jpg')}}" alt="facebook" width="256" height="256" class="img-thumbnail pull-left mr-2">

<h3>Burger</h3>
<p >Not very useful when you're full</p>

</div>

<div class="col-2">
    
    <h3>Price : 200.00$</h3>
</div>
<div class="col-2">
    
    <button class="btn btn-danger btn-more pull-right">Cancel</button>

</div>
</div>


<div class="row p-4 mt-4 border align-items-center " style="height:200px;">
        <div class="col-8">
    <img src="{{asset('/pictures/chicken.jpg')}}" alt="facebook" width="256" height="256" class="img-thumbnail pull-left mr-2">
    
    <h3>Chicken</h3>
    <p >real delicious</p>
    </div>
    
    <div class="col-2">
        <h5>Price : 250.00$</h5>
    </div>
    
          <div class="col-2">
        
            <button class="btn btn-danger btn-more pull-right">Cancel</button>
        
        </div>
    </div>


    <div class="row d-flex justify-content-center mt-4 ">
        <div class="col-3"></div>
        <div class="col-6">
             <button class="btn btn-success form-control text-uppercase"><strong>Commander</strong></button>
            </div>
        <div class="col-3"></div>
    </div>
</div>
    
@endsection