
        //for ajax
    
        $.ajaxSetup({
                    headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                            });
    
            function addToCart(id,nom){
        
                $.ajax({
                    type:"post",
                    url:'/sendAjax',
                    data:{
                        nom:nom,
                        id:id
                    },
                    success:function(data){
                           document.getElementById('cart_quantity').className='badge badge-danger';
                           document.getElementById('cart_quantity').innerHTML=data.msg;
                    }   
                }); 
            }
                