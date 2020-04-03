
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Certificados
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

                        <a href="<?php echo base_url();?>movimientos/certificados/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Certificado</a>
                                                <?php endif;?>

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Alumno</th>
                                    <th>Código</th>
                                    <th>Estado</th>
                                    <th>Sede</th>
                                    <th>Tipo</th>
                                    
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($certificados)): ?>
                                    <?php foreach($certificados as $certificado):?>
                                        <tr>

                                            <td><?php echo $certificado->nombrealumno." ".$certificado->apellidoalumno;?></td>
                                            <td><?php echo $certificado->codigo_cert;?></td>
                                            <td><?php echo $certificado->estado_cert;?></td>
                                            <td><?php echo $certificado->nombresede;?></td>
                                            <td><?php echo $certificado->nombretipo;?></td>
                                            
                                            
                                            <td>
   
                                                <button type="button" class="btn btn-info btn-view-venta" value="<?php echo $certificado->id_cert;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
                                                <?php if($permisos->update == 1):?>
                                                <a href="<?php echo base_url()?>movimientos/certificados/edit/<?php echo $certificado->id_cert;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a> 
                                                <?php endif;?>
                                                <?php if($permisos->delete == 1):?>
                                                <a href="<?php echo base_url();?>movimientos/certificados/delete/<?php echo $certificado->id_cert;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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
        <h4 class="modal-title">Información del Certificado</h4>
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
