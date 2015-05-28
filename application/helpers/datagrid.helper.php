<?php
    defined('__EAPPEL__') or die('Acces interdit');
	
		abstract class DatagridHelper{
			public static function lienTri($nom,$ordre,$tri){
			$css = array('tri');
			$url = Application::getURL();
		
			if($ordre == $tri['order']){
				if($tri['tri'] == 'asc'){
					$url = $url.'&order='.$ordre.'&dir=desc';
					$css[] = 'asc';
				}
				else{
					$url = $url.'&order='.$ordre.'&dir=asc';
					$css[] = 'desc';
				}
			}
			else{
				$url = $url.'&order='.$ordre.'&dir=asc';
			}
			
			?>
			<a href="<?php echo $url; ?>"><?php echo $nom; ?><span class="<?php echo implode(' ',$css); ?>"></span></a>
			<?php
			}
		}
?>