$("#utilisateurForm form").first().submit(function(){
	retour = true;
	
	$("#utilisateurForm dl input").each(function(){
		//console.log(this.value);
		$(this).removeClass("erreur");
		if(this.value.trim()===""){
			setMessage("Veuillez remplir l'élément "+this.attributes.errorLabel.value);
			console.log("Erreur "+this.id);
			$(this).addClass("erreur");
			retour = false;
			return false;
		}
	});
	if(!retour) return false;
	var login = $("#login");
	if(login.val().length < 4){
		setMessage("Votre login doit avoir au moins 4 caractères");
		login.addClass("erreur");
		retour = false;
		return false;
	}
	
	// var email = $("#email");
	// var regex = /^([a-zA-Z0-9]+(([\.\-\_]?[a-zA-Z0-9]+)+)?)\@(([a-zA-Z0-9]+[\.\-\_])+[a-zA-Z]{2,4})$/;
	// if(regex.test(email) === false){
		// setMessage("Veuillez saisir une adresse email valide");
		// email.addClass("erreur");
		// retour = false;
		// return false; 
	// }
	
	var password = $("#password");
	if(password.val().length < 7){
		setMessage("Votre mot de passe doit avoir au moins 7 caractères");
		password.addClass("erreur");
		retour = false;
		return false;
	}
	
	var confirmation = $("#confirmation");
	if(confirmation.val() !== password.val()){
		setMessage("confirmation différente du mot de passe");
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
