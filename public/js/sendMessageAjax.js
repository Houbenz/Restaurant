

$.ajaxSetup({
    headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

function sendMessage(id,nom){

$.ajax({
    type:"post",
    url:'/storeMessage',
    data:{
        nom: ('#nom').val(),
        email: ('#email').val(),
        sujet: ('#sujet').val(),
        message: ('#message').val(),
    },
    success:function(data){
            $('#content').html(data.nom);

            $('.toast').toast('show');

    }   
}); 
}