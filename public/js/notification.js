    $.ajaxSetup({
        headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });


function load_new_notification(){

    $.ajax({
        type:'post',
        url:'/notification',
    }).done(function(response){
        $("#putNotification").html(response);
    });   
}

