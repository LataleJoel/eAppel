/*dans l'url courante je récupère le dernier paramètre, si c'est une chaine c'est qu'il n'y a pas d'id alors
on est encore en création sinon c'est un nombre donc on est bien en édition*/
var url = window.location.search;
var valeur = url.substring(url.lastIndexOf("=")+1);
var edition = false;
if(typeof(valeur) == "number")
	edition = true;

$("#utilisateurForm form").first().submit(function(){
	retour = true;
	
	$("#utilisateurForm dl input").each(function(){
		//console.log(this.value);
		$(this).removeClass("erreur");
	});
	if(!retour) return false;
	
	var nom = $("#nom");
	nomtrim = trim(nom.val());
	if(nomtrim.length < 1){
		setMessage("Veuiller remplir le nom");
		nom.addClass("erreur");
		retour = false;
		return false;
	}
	
	var prenom = $("#prenom");
	prenomtrim = trim(prenom.val());
	if(prenomtrim.length < 1){
		setMessage("Veuiller remplir le prénom");
		prenom.addClass("erreur");
		retour = false;
		return false;
	}
	
	var email = $("#email");
	emailtrim = trim(email.val());
	if(emailtrim.length < 1){
		setMessage("Veuiller remplir l'e-mail");
		email.addClass("erreur");
		retour = false;
		return false;
	}
	// var regex = /^([a-zA-Z0-9]+(([\.\-\_]?[a-zA-Z0-9]+)+)?)\@(([a-zA-Z0-9]+[\.\-\_])+[a-zA-Z]{2,4})$/;
	// if(regex.test(email) === false){
		// setMessage("Veuillez saisir une adresse email valide");
		// email.addClass("erreur");
		// retour = false;
		// return false; 
	// 
	
	var password = $("#password");
	passtrim = trim(password.val());
	//if((!edition && passtrim.length < 7 ) || (edition && passtrim.length > 0 && passtrim.length < 7)){
	if(passtrim.length > 0 && passtrim.length < 7){
		setMessage("Votre mot de passe doit avoir au moins 7 caractères");
		password.addClass("erreur");
		retour = false;
		return false;
	}
	
	var confirmation = $("#confirmation");
	confirmtrim = trim(confirmation.val());
	if(confirmtrim !== passtrim){
		setMessage("la confirmation doit être identique au mot de passe");
		confirmation.addClass("erreur");
		retour = true;
		return false;
	}
	return retour;
});
			
function setMessage(msg){
	var message = $("#utilisateurForm form > p").get(0);
	if(message===undefined){
		$("<p>"+msg+"</p>").prependTo('#utilisateurForm form');
	}
	else{
		message.innerHTML = msg;
	}
}
function trim (myString)
{
	return myString.replace(/^\s+/g,'').replace(/\s+$/g,'')
} 