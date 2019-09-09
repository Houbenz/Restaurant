
<div class="container">
    <h2 class="text-center font-weight-bold mb-5">Contactez Nous</h2>
<div class="row text-center">
    <div class="col-lg-5 col-md-12" >
            <form method="" action="" class=" mb-4 p-4 grey-text border border-black">

                @csrf
                    <div class="md-form form-sm">
                            <label for="form3">Votre nom</label>
                      <input type="text" id="form3"name="nom" class="form-control form-control-sm">
                    </div>
                    <div class="md-form form-sm">
                            <label for="form2">Votre email</label>
                      <input required type="text" id="form2"name="email" class="form-control form-control-sm">
                    </div>
                    <div class="md-form form-sm">
                            <label for="form34">Sujet</label>
                      <input type="text" id="form32" name="sujet" class="form-control form-control-sm">
                    </div>
                    <div aria-required="true" class="md-form form-sm"><label for="form8">Votre message</label>
                      <textarea type="text" id="form8" name="message"
                      class="md-textarea form-control form-control-sm" rows="4"></textarea>
                    </div>
                    <div class="text-center mt-4">
                      <button type="submit" class="btn btn-primary" onclick="sendMessage()">Envoyer</button>
                    </div>
                  </form>
    </div>
    <div class="col-lg-7 col-md-12">
            <div id="map-container " class="z-depth-1-half map-container mb-5" style="height:400px"> </div>
    </div>




</div>
</div>