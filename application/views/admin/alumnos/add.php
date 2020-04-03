
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Alumno
        <small>Nuevo</small>
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
                        <form action="<?php echo base_url();?>mantenimiento/alumnos/store" method="POST">
                            <div class="form-group <?php echo form_error('nombres_alumn') == true ? 'has-error':''?>">
                                <label for="nombres_alumn">Nombres:</label>
                                <input type="text" class="form-control" id="nombres_alumn" name="nombres_alumn">
                                <?php echo form_error("nombres_alumn","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo form_error('apellidos_alumn') == true ? 'has-error':''?>">
                                <label for="apellidos_alumn">Apellidos:</label>
                                <input type="text" class="form-control" id="apellidos_alumn" name="apellidos_alumn">
                                <?php echo form_error("apellidos_alumn","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo form_error('dni') == true ? 'has-error':''?>">
                                <label for="dni">Dni:</label>
                                <input type="number" class="form-control" id="dni" name="dni">
                                <?php echo form_error("dni","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo form_error('telefono_alumn') == true ? 'has-error':''?>">
                                <label for="telefono_alumn">Teléfono:</label>
                                <input type="number" class="form-control" id="telefono_alumn" name="telefono_alumn">
                                <?php echo form_error("telefono_alumn","<span class='help-block'>","</span>");?>
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
