function enableInputs(){


nom=document.getElementById("nom");
email=document.getElementById("email");
save_changes=document.getElementById("save_changes");
num_tel=document.getElementById("num_tel");
adresse=document.getElementById("adresse");

nom.removeAttribute('disabled');
email.removeAttribute('disabled');  
adresse.removeAttribute('disabled');
num_tel.removeAttribute('disabled'); 
save_changes.removeAttribute('disabled');


}