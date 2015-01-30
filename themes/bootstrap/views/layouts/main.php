<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html ng-app="inox">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Language" content="es"/>
	
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/docs.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/select2.css" />
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
		<?php Yii::app()->bootstrap->register(); ?>
	
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/select2.min.js"></script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
	</head>

	<body>

	<?php 
		$items = array();
		
		$usuarioActual = Usuario::model()->find('usuario=:x',array(':x'=>Yii::app()->user->name));
	
		if(isset($usuarioActual) && $usuarioActual->tipoUsuario->nombre == 'Administrador')
		{
			$items=array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
					'items'=>array(
		                array('label'=>'Inicio','icon'=>'home', 'url'=>array('site/index')),
		                array('label'=>'Catálogos', 'icon'=>'globe', 'url'=>array('#'), 'items'=>array(
			                array('label'=>'Artículos', 'url'=>array('articulo/index')),
			                array('label'=>'Ciudades', 'url'=>array('ciudad/index')),	
			                array('label'=>'Estados', 'url'=>array('estado/index')),
			                array('label'=>'Metas', 'url'=>array('meta/index')),
			                array('label'=>'Tipo Usuario', 'url'=>array('tipoUsuario/index')),
			                array('label'=>'Usuarios', 'url'=>array('usuario/index')),
			            )),	
			            array('label'=>'Reportes', 'icon'=>'file', 'url'=>array('#'), 'items'=>array(
			                array('label'=>'Reportes', 'url'=>array('reporte/index')),
			            )),	
		            ),
		        ),
		     );
		}
		elseif(isset($usuarioActual) && $usuarioActual->tipoUsuario->nombre == 'Usuario B' && $usuarioActual->tipoUsuario->nombre == 'Usuario A' && $usuarioActual->tipoUsuario->nombre == 'Usuario C'){
			$items=array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>array(
		                array('label'=>'Inicio', 'url'=>array('site/index'),'icon'=>'home'),	                
			            array('label'=>'Documentos', 'url'=>array('requisicion/index'), 'icon'=>'file', 'items'=>array(		                
			                array('label'=>'Órdenes de Compra', 'url'=>array('ordenCompra/index')),
			                array('label'=>'Contrarecibos', 'url'=>array('contrarecibo/index')),		            
							),					
						),
						array('label'=>'Pasivo', 'url'=>array('proveedor/pasivoporproveedor'),'icon'=>'file'),	                					
		            ),
		        ),
		     );
		}
		elseif(isset($usuarioActual) && $usuarioActual->tipoUsuario->nombre == 'Capturista'){
			$items=array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>array(
		                array('label'=>'Catálogos', 'url'=>array('#'), 'icon'=>'globe', 'items'=>array(		                
			                array('label'=>'Artículos', 'url'=>array('articulo/index')),
			                array('label'=>'Proveedores', 'url'=>array('proveedor/index')),
							),					
						),
						array('label'=>'Documentos', 'url'=>array('requisicion/index'), 'icon'=>'file', 'items'=>array(		                
			                array('label'=>'Requisiciones', 'url'=>array('requisicion/index')),
			                array('label'=>'Cotizaciones', 'url'=>array('cotizacion/index')),		            
							),					
						),
		            ),
		        ),
		     );
		}
		elseif(isset($usuarioActual) && $usuarioActual->tipoUsuario->nombre == 'Proveedor'){
			$items=array(
		        array(
		            'class'=>'bootstrap.widgets.TbMenu',
		            'items'=>array(
		                array('label'=>'Inicio', 'url'=>array('site/index'),'icon'=>'home'),
			            array('label'=>'Contacto','icon'=>'comment', 'url'=>array('site/contact')),
		            ),
		        ),
		     );
		}	
		
		$items[]=array(
		  'class'=>'bootstrap.widgets.TbMenu',
		  'htmlOptions'=>array('class'=>'pull-right'),
		  'encodeLabel'=>false,
		  'items'=>array(  
		  	array('label'=>$usuarioActual->usuario, 'url'=>array('/perfil/view'), 'visible'=>!Yii::app()->user->isGuest, 				'htmlOptions'=>array('class'=>'btn'), 'icon'=>'user','items'=>array(		                
			                array('label'=>'Ver Perfil', 'icon'=>'user','url'=>array('usuario/view', 'id'=>$usuarioActual->id)),
			                array('label'=>'Cambiar Contraseña', 'icon'=>'wrench','url'=>array('usuario/cambiar', 'id'=>$usuarioActual->id)),
			            )),
		  	array('label'=>'Iniciar Sesión', 'icon'=>'off', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn')),
		    array('label'=>'Cerrar Sesión', 'icon'=>'off', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest, 'htmlOptions'=>array('class'=>'btn'))
		  ),
		);
		
		$this->widget('bootstrap.widgets.TbNavbar', array(
		    'type'=>'', // null or 'inverse'
		    'brand'=>Yii::app()->name,
		    'brandUrl'=>array('site/index'),
		    'brandOptions'=>array('class'=>'left'),
		    'collapse'=>true,
		    'items'=>$items
		)); 
	
		$flashMessages = Yii::app()->user->getFlashes();
		if($flashMessages){
			foreach($flashMessages as $key => $message){
				echo '<div class="info alert alert-'.$key.'" style="text-align:center">
							<button type="button" class="close" data-dismiss="alert">&times;</button>';
				echo '<p>' . $message . '</p>';
				echo '</div>';
			}
		}
	?>
		<div class="container" id="page">
			<div class="container">
				<div class="row">
					<div class="span4">
						<img src="<?php echo Yii::app()->baseUrl . '/images/logo2.png';?>" class="img-rounded"/>
					</div>
					<div class="span8"></div>
				</div>
				<div class="row">
					<div class="span12" style="margin-top:20px;">
						<?php if(isset($this->breadcrumbs)):?>
							<?php $this->widget('BBreadcrumbs', array(
								'links'=>$this->breadcrumbs,
								'separator'=>' / ',
							)); ?><!-- breadcrumbs -->
						<?php endif?>
					</div>
			</div>
			<?php echo $content; ?>
			<br/>		
			<div id="footer" style="text-align:center">
				<strong>Todos los derechos reservados para Interceramic <?php echo date('Y'); ?><br/></strong>
				<br/>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/angular/ui.select2.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/inoxica.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/controllers/requisicion.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/controllers/articulo.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/controllers/contrarecibo.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/highcharts.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/highcharts-more.js"></script>
		<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/highcharts-exporting.js"></script>
	</body>
</html>
<?php
	Yii::app()->clientScript->registerScript(
		'myHideEffect',
		'$(".info").animate({opacity:1.0},5000).slideUp("slow");',
		CClientScript::POS_READY
	);