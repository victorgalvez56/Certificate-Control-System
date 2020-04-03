
<div class="row">
	<div class="col-xs-12 text-center">
		<b>Instituto XXX</b><br>
		Calle Moquegua 430 <br>
		Tel. 481890 <br>
		Email:XXXXX@gmail.com
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>RESPONSABLE</b><br>
		<b>Nombre:</b> <?php echo $certificado->responsable;?> <br>
	</div>	
	<div class="col-xs-6">	
		<b>COMPROBANTE</b> <br>
		<b>Tipo de Comprobante:</b> <?php echo $certificado->comprobante;?><br>
		<b>Serie:</b> <?php echo $certificado->serie;?><br>
		<b>Nro de Comprobante:</b><?php echo $certificado->num_documento;?><br>
		<b>Fecha</b> <?php echo $certificado->fecha;?>
	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nombre y Apellido</th>
					<th>Codigo Certificado</th>
					<th>Precio Certificado</th>					
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles as $detalle):?>
				<tr>
					<td><?php echo $detalle->nombres_alumn." ".$detalle->apellidos_alumn;?></td>
					<td><?php echo $detalle->codigo_cert;?></td>
					<td><?php echo "S/.".$detalle->precio;?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $certificado->total_pago;?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>