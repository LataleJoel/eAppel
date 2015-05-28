<?php
	defined('__EAPPEL__') or die('Acces interdit');
?>
<div id="liste_groupes">
	<ul>
		<?php foreach($this->groupes as $G){
			$url = Application::getUrl().'&id='.$G['id'];
		?>
		<li><a href="<?php echo $url; ?>" groupe3iL="<?php echo $G['id']; ?>"><?php echo $G['nom']; ?></a></li>
		<?php } ?>
	</ul>
</div>
<div id="detail_groupe">
</div>