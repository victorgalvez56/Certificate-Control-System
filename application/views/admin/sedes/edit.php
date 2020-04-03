
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Sede
        <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if($this->session->flashdata("error")):?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                
                             </div>
                        <?php endif;?>
                        <form action="<?php echo base_url();?>mantenimiento/sedes/update" method="POST">
                            <input type="hidden" value="<?php echo $sede->id_sede;?>" name="idSede">
                            <div class="form-group <?php echo form_error('nombre_sede') == true ? 'has-error': '';?>">
                                <label for="nombre_sede">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_sede" name="nombre_sede" value="<?php echo $sede->nombre_sede?>">
                                <?php echo form_error("nombre_sede","<span class='help-block'>","</span>");?>
                            </div>
                            <div>
                            <div class="form-group">
                                <label for="direccion_sede">Dirección:</label>
                                <input type="text" class="form-control" id="direccion_sede" name="direccion_sede" value="<?php echo $sede->direccion_sede?>">
                            </div>
                            <div class="form-group">
                                <label for="ciudad">Ciudad:</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $sede->ciudad?>">
                            </div>                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                            </div>
                        </form>
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
