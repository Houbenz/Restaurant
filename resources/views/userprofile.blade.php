
@extends('layouts.app')
@section('content')

<div class="container emp-profile">
<form method="POST" action="/updateprofile" enctype = "multipart/form-data" >
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="profile-img">
                <img  src="storage/profile_images/{{auth()->user()->profile_image}}" alt=""/>
                <div style="cursor:pointer" class="file btn btn-lg btn-primary">
                    Change Photo
                    <input type="file" id="profile_image" name="profile_image" disabled/>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="profile-head">
                        <h5>
                            {{Auth::user()->nom}}
                        </h5>
                        <h6>
                        </h6>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" 
                        role="tab" aria-controls="home" aria-selected="true">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                         role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">

        <input type="hidden" name="type_client" id="type_client" value="{{Auth::user()->type_client}}">
        
        <input type="hidden" name="id" id="id" value="{{Auth::user()->id}}">
            <input type="button" class="profile-edit-btn" name="btnAddMore" onclick="enableInputs()" value="Edit profile" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-4"> </div>
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label>Nom</label>
                                </div>
                                <div class="col-md-6 mb-2">

                                    <input type="text" class="text-primary form-control "
                                     name="nom" id="nom" value="{{Auth::user()->nom}}" disabled>
                                   <!-- <p>{{Auth::user()->nom}}</p>-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6 mb-2">
                                        <input type="email" name="email" class="text-primary form-control "
                                         id="email" value="{{Auth::user()->email}}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label>Num Tél</label>
                                </div>
                                <div class="col-md-6 mb-2 ">
                                    <input type="text" name="num_tel" pattern="[0-9]{10}" 
                                    class="text-primary form-control "id="num_tel" value="{{Auth::user()->num_tel}}" disabled>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label>Adresse</label>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" name="adresse"
                                         class="text-primary form-control mb-2" 
                                         id="adresse" value="{{Auth::user()->adresse}}" disabled>
                                    </div>
                                </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>English Level</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Your Bio</label><br/>
                            <p>Your detail description</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-4" ></div>
            <div class="col-8">
        <button id="save_changes"  class="btn btn-primary form control" type="submit" disabled>Save changes</button>
    </div>
    </div>
</form>          
</div>
@endsection