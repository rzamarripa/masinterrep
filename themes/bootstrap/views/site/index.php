<?php
	/*
echo '<pre>';print_r($_SERVER); echo "</pre>";
	exit;
*/
	$this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
	    'heading'=>'Bienvenido a Intereporte',
	)); 
?>
 	<div class="row-fluid"> 		
 		<div class="span12">
 			<p>Es el nuevo sistema de Interceramic Grupo Kuroda que nos ayuda a dar seguimiento a los resultados y a las actividades más importantes en nuestra labor comercial.</p>
 		</div>
 		<p><?php $this->widget('bootstrap.widgets.TbButton', array(
		        'type'=>'info',
		        'url'=>array('site/login'),
		        'size'=>'large',
		        'label'=>'Iniciar Sesión',
		    )); ?></p>
 	</div>
    
 
<?php 
	$this->endWidget(); 	
	
?>