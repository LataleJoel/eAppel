$(document).ready(function(){
	$('#liste_groupes a').click(function(){
		console.log('Click '+this.attributes.groupe3iL.nodeValue);
		$('#liste_groupes li.selection').toggleClass('selection');
		$(this).parents('li').toggleClass('selection');
		$.get(
				'index.php',
				{
					controller:'groupes',
					action:'detail',
					id:this.attributes.groupe3iL.nodeValue
				},
				function(data){
					//console.log(data);
					$('#detail_groupe').html(data);
				}
		);
		return false;
	});
});