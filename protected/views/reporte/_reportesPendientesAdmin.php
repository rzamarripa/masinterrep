<?php $c = 0; ?>
<div class="row">
	<div class="span12">
		<table class="table table-striped table-bordered table-hover table-condensed">
			<thead class="thead">
				<tr>
					<td class="span1"><p class="text-center">No.</p></td>
					<td class="span1"><p class="text-center">Acciones</p></td>
					<td class="span2"><p class="text-center">Número Rep.</p></td>
					<td class="span2"><p class="text-center">Fecha</p></td>
					<td class="span2"><p class="text-center">Nombre</p></td>					
					<td class="span2"><p class="text-center">Plaza</p></td>
					<td class="span2"><p class="text-center">Compañía</p></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($reportes as $reporte){ 
								if($reporte->estatus_did == 2){ $c++; ?>
				<tr>
					<td style='text-align:center;'><?php echo $c;?></td>
					<td>
					    <?php
					    $this->widget('bootstrap.widgets.TbButtonGroup', array(
					        'type'=>'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
					        'buttons'=>array(
					            array('items'=>array(
					                array('label'=>'Revisado', 'icon'=>'ok', 'url'=>array('cambiarestatus','id'=>$reporte->id, 'estatus'=>3)),
					                '---',
					                array('label'=>'Eliminar', 'icon'=>'trash', 'url'=>array('cambiarestatus','id'=>$reporte->id, 'estatus'=>4)),
					            )),
					        ),
					    )); ?>
					</td>
					<td style='text-align:center;'><?php echo CHtml::link($reporte->id,array('reporte/view', 'id'=>$reporte->id));?></td>
					<td style='text-align:center;'><?php echo $reporte->fecha_f;?></td>
					<td><?php echo $reporte->usuario->nombre;?></td>					
					<td><?php echo $reporte->plaza;?></td>
					<td><?php echo $reporte->compania;?></td>
				</tr>
				<?php }
				} ?>
			</tbody>
		</table>
		<div style="height:100px;"></div>
	</div>
</div>