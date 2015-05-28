<?php
    defined('__EAPPEL__') or die('Acces interdit');
	
		abstract class MenuPrincipal{
			public static function afficher(){
				$menu[0] = array('titre'=>'Accueil','controleur'=>'accueil','action'=>'accueil');
				$menu[1] = array('titre'=>'Faire un appel','controleur'=>'appels','action'=>'choixGroupe');
				$menu[2] = array('titre'=>'Liste des appels','controleur'=>'appels','action'=>'lister');
				$menu[3] = array('titre'=>'Groupes','controleur'=>'groupes','action'=>'lister');
				$menu[4] = array('titre'=>'Enseignants','controleur'=>'utilisateurs','action'=>'lister');
				
				$controleur = Application::getControleur();
				$action = Application::getAction();
				?>
				<nav id="menu_principal">
					<ul>
						<?php foreach($menu as $tab){
							$active = '';
							if($controleur == $tab['controleur'] && $action == $tab['action']){
								$active = 'class = "active"';
							}
						?>
						<li <?php echo $active; ?>><a href="<?php echo 'index.php?controller='.$tab['controleur'].'&action='.$tab['action']; ?>"><?php echo $tab['titre']; ?></a></li>
						<?php } ?>
					</ul>
				</nav>
				<?php 
			}
		}
?>