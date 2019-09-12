    
    $(document).ready(function(){
        myPeriodicMethod();
    })
    
$.ajaxSetup({
    headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

function myPeriodicMethod() {
    $.ajax({
        url: '/countNotifications' ,
        method: 'POST',
        success: function(data) {
            if (data == 0) {
                $('#notifSpan').prop('class','badge badge-light');
            } else {
                $('#notifSpan').prop('class','badge badge-danger');

            }
            $('#notifSpan').html(data);
        },
        complete: function() {
            setTimeout(myPeriodicMethod, 5000);
        }
    });
    }
function load_new_notification(){

    $.ajax({
        method:'POST',
        url:'/notification',
    }).done(function(response){
        $("#putNotification").html(response);
    });   
}

