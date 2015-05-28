<?php
	defined('__EAPPEL__') or die('Acces interdit');
?>
<table class="datagrid">
	<caption><?php echo $this->groupe; ?></caption>
	<thead>
		<tr>
			<th>Numero</th>
			<th>Nom</th>
			<th>Prénom</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->data as $n => $E){ ?>
		<tr>
			<td><?php echo $n+1; ?></td>
			<td><?php echo $E->nom; ?></td>
			<td><?php echo $E->prenom; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>