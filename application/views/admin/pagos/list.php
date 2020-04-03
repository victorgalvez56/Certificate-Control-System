
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Pagos
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                                                <?php if($permisos->insert == 1):?>

                        <a href="<?php echo base_url();?>movimientos/pagoscertificados/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Pago</a>
                                                <?php endif;?>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Número de Documento</th>
                                    <th>Responsable</th>
                                    <th>Total</th>                                   
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($pagos)): ?>
                                    <?php foreach($pagos as $pago):?>
                                        <tr>
                                            <td><?php echo $pago->fecha;?></td>
                                            <td><?php echo $pago->comprobante." ".$pago->num_documento;?></td>
                                            <td><?php echo $pago->responsable;?></td>
                                            <td><?php echo "S/.".$pago->total_pago;?></td>
                                            
                                            <td>

                                                <button type="button" class="btn btn-info btn-view-venta1" value="<?php echo $pago->id_pago;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                                                                                    <?php if($permisos->delete == 1):?>

                                                <a href="<?php echo base_url();?>movimientos/pagoscertificados/delete/<?php echo $pago->id_pago;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                                                                    <?php endif;?>

                                                
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Información del Pago</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
