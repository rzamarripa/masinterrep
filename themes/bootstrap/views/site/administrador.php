<?php 
	$this->breadcrumbs=array(
		'Administrador',
	);
	$usuarioActual = Usuario::model()->find('usuario=:x',array(':x'=>Yii::app()->user->name));
	$cantidadReportePendientes = Reporte::model()->findAll("estatus_did = 2");
   	$reportePendiente = '
		<div class="alert alert-info">
			<h4>Reportes</h4>
		</div>
		<ul>
			<li class="plan-feature">' . count($cantidadReportePendientes) . ' Recibidos</li>
		</ul>
	';
	$cantidadReporteRevisados = Reporte::model()->findAll("estatus_did = 4");
   	$reporteRevisados = '
		<div class="alert alert-info">
			<h4>Reportes</h4>
		</div>
		<ul>
			<li class="plan-feature">' . count($cantidadReporteRevisados) . ' Recibidos</li>
		</ul>
	';
    
?>
<div class="row">
    <div class="span6">
		<?php if(!Yii::app()->user->isGuest == true){ ?>
		<div class="container">
			<div class="row">
				<div class="span5 well">
		            <div class="row">
		        		<div class="span1"><?php 
		        			if(!$usuarioActual->foto)
			        			echo CHtml::link('<img class="thumbnail" src="http://critterapp.pagodabox.com/img/user.jpg" alt="">',array('usuario/cambiar', 'id' => $usuarioActual->id));
			        		else
			        			echo CHtml::link('<img class="thumbnail" src="' . Yii::app()->baseUrl . '/fotos/' . $usuarioActual->foto . '" alt="">',array('usuario/cambiar', 'id' => $usuarioActual->id));
			        			 ?>
			        	</div>
		        		<div class="span3">
		                  	<p><?php echo $usuarioActual->usuario; ?></p>
		                  	<p><strong><?php echo $usuarioActual->nombre;  ?></strong></p>
		                  	<p><strong><?php echo $usuarioActual->puesto;  ?></strong></p>
		                  	<p><strong><?php echo $usuarioActual->puntoVenta;  ?></strong></p>
						  	<p><strong><?php echo $usuarioActual->ciudad;  ?></strong></p>
						  	<p><strong><?php echo $usuarioActual->compania;  ?></strong></p>
		        			<?php echo CHtml::link('<span class="label label-warning">' . $reportes . ' reportes</span>',array('reporte/indexgerente')); ?>
		        		</div>
		        	</div>
		        </div>
			</div>
		</div>
<?php	} ?>
	</div>	
	<div class="span6">
		<div class="row-fluid pricing-table pricing-three-column">			
            <div class="span6 plan">
				<?php echo CHtml::link($reportePendiente,array('reporte/indexgerente')); ?> 
			</div>
			
        </div>       
    </div>
</div>