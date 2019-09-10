

    $.ajaxSetup({
        headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });


function load_new_notification(id){

    $.ajax({
        type:'post',
        url:'/notification',
        data:{
            id:id
        },
        success:function(data){

                for(let i = 0 ; i < data.notifications.length;i++){

                    $("#putNotification").html(
                        $("#putNotification").html()+ 

                    "<div class='p-2'><small class='dropdown-item'><strong>"+data.notifications[i].titre
                    +"</strong></small> <small>"+data.notifications[i].contenu+
                    "</small><br/><small>"+data.notifications[i].created_at+"</small></div> <hr>");
                }
        }

    
    })

}

