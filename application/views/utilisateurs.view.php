<?php
defined('__EAPPEL__') or die('Acces interdit');
require_once 'application/helpers/datagrid.helper.php';
if($this->message != '')
?>
<h2 class="message"><?php echo $this->message; ?></h2>;
<table id="liste_enseignants" class="datagrid">
    <caption>
		liste des appels 
		<form action="index.php" method="get">
			<input type="hidden" name="controller" value="utilisateurs"/>
			<input type="hidden" name="action" value="creer"/>
			<input type="submit" value="Créer Utilisateur"/>
		</form>
	</caption>
    <thead>
        <tr>
            <th><?php DatagridHelper::lienTri('Login','login',$this->triGrille);?></th>
            <th><?php DatagridHelper::lienTri('Nom','nom',$this->triGrille);?></th>
            <th><?php DatagridHelper::lienTri('Prénom','prenom',$this->triGrille);?></th>
            <th><?php DatagridHelper::lienTri('Email','email',$this->triGrille);?></th>
            <th><?php DatagridHelper::lienTri('Type','type',$this->triGrille);?></th>
            <th>Commandes</th>
        </tr>
    </thead>
    <tbody>
	<?php foreach($this->utilisateurs as $tab){
	?>
        <tr>
			<td><?php echo $tab['login']; ?></td>
            <td><?php echo $tab['nom']; ?></td>
            <td><?php echo $tab['prenom']; ?></td>
            <td><?php echo $tab['email']; ?></td>
            <td><?php echo $tab['type']; ?></td>
            <td>
				<form method="get" action="index.php" name="edition">
                    <button type="submit" name="action" value="editer"><img src="application/images/icone_editer.png" alt="editer" title="editer"/></button>
                    <button type="submit" name="action" value="supprimer"><img src="application/images/icone_supprimer.png" alt="supprimer" title="supprimer"/></button>
					<input type="hidden" name="controller" value="utilisateurs"/>
					<input type="hidden" name="id" value=<?php echo $tab['id']; ?> />
                </form>
            </td>
        </tr>
	<?php } ?>
    </tbody>
</table>
