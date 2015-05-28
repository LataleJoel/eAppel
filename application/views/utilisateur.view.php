<?php 
	defined('__EAPPEL__') or die('Acces interdit');
	$faute = '';
    if(isset($this->erreur)){
        $faute = $this->erreur;
	}
	#détermination pour savoir si on est en édition ou création
	$mode = '';
	if(isset($this->creation) === false){
		$mode='readonly';
		$this->titre = $this->titre.' '.$this->login;
	}
?>

<div id="utilisateurForm">
	<h2><?php echo $this->titre; ?></h2>
	<form method="post" action="index.php?controller=utilisateurs&action=editer">
		<p><?php echo $faute; ?></p>
		<dl>
			<dt><label for="login">Login:</label></dt>
			<dd><input type="text" name="login" id="login" errorLabel="login" <?php echo $mode."\t";?> value="<?php echo $this->login;?>" /></dd>
			
			<dt><label for="nom">Nom:</label></dt>
			<dd><input type="text" name="nom" id="nom" errorLabel="nom"  value="<?php echo $this->nom;?>" /></dd>
			
			<dt><label for="prenom">Pr&eacute;nom:</label></dt>
			<dd><input type="text" name="prenom" id="prenom" errorLabel="prénom" value="<?php echo $this->prenom;?>" /></dd> 
			
			<dt><label for="email">E-mail:</label></dt>
			<dd><input type="email" name="email" id="email" errorLabel="email" value="<?php echo $this->email;?>" /></dd>
			
			<dt><label for="password">Mot de passe:</label></dt>
			<dd><input type="password" name="password" id="password" errorLabel="mot de passe"  value="<?php echo $this->password;?>" /></dd> 
			 
			<dt><label for="confirmation">Confirmation:</label></dt>
			<dd><input type="password" name="confirmation" id="confirmation" errorLabel="confirmation" value="<?php echo $this->confirmation;?>" /></dd> 
			
		</dl>
		<input type="submit" name="enregistrer" value="enregistrer"/>
		<input type="hidden" name="id" value="<?php echo $this->id; ?>"/>
	</form>
</div>
