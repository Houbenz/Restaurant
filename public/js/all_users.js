function enableInputsAdmin(id)
    {

        nom=document.getElementById("nom"+id);
        email=document.getElementById("email"+id);
        num_tel=document.getElementById("num_tel"+id);   
        type_client=document.getElementById("type_client"+id);
        adresse=document.getElementById("adresse"+id);    

        nom.removeAttribute('disabled');
        email.removeAttribute('disabled');  
        adresse.removeAttribute('disabled');
        type_client.removeAttribute('disabled');
        num_tel.removeAttribute('disabled'); 


    }