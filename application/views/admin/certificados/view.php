
<div class="row">

	<div class="col-xs-12 text-center">

		<b>Empresa de Ventas</b><br>
		Calle Moquegua 430 <br>
		Tel. 481890 <br>
		Email:yonybrondy17@gmail.com
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>ALUMNO</b><br>
		<b>Nombres:</b> <?php echo $certificado->nombrealumno;?> <br>
		<b>Apellidos:</b> <?php echo $certificado->apellidoalumno;?><br>
		<b>Teléfono:</b> <?php echo $certificado->telefono;?> <br>
	</div>	
	<div class="col-xs-6">	
		<b>CERTIFICADO</b><br>
		<b>Código:</b>	<?php echo $certificado->codigo_cert;?><br>

	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre del Curso</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles as $detalle):?>
				<tr>
					<td><?php echo $detalle->codigo_curso;?></td>
					<td><?php echo $detalle->nombre_curso;?></td>

				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>

			</tfoot>
		</table>
	</div>
</div>