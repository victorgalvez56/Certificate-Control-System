
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Curso
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
                        <form action="<?php echo base_url();?>mantenimiento/cursos/update" method="POST">
                            <input type="hidden" name="idCurso" value="<?php echo $curso->id_curso;?>">

                            <div class="form-group <?php echo !empty(form_error('codigo_curso')) ? 'has-error':'';?>">
                                <label for="codigo_curso">Código:</label>
                                <input type="text" class="form-control" id="codigo_curso" name="codigo_curso" value="<?php echo !empty(form_error('codigo_curso')) ? set_value('codigo_curso'):$curso->codigo_curso?>">
                                <?php echo form_error("codigo_curso","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('nombre_curso')) ? 'has-error':'';?>">
                                <label for="nombre_curso">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_curso" name="nombre_curso" value="<?php echo !empty(form_error('nombre_curso')) ? set_value('nombre_curso'):$curso->nombre_curso?>">
                                <?php echo form_error("nombre_curso","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('fecha_inicio')) ? 'has-error':'';?>">
                                <label for="fecha_inicio">Fecha Inicio:</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo !empty(form_error('fecha_inicio')) ? set_value('fecha_inicio'):$curso->fecha_inicio?>">
                                <?php echo form_error("fecha_inicio","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group <?php echo !empty(form_error('fecha_fin')) ? 'has-error':'';?>">
                                <label for="fecha_fin">Fecha Fin:</label>
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="<?php echo !empty(form_error('fecha_fin')) ? set_value('fecha_fin'):$curso->fecha_fin?>">
                                <?php echo form_error("fecha_fin","<span class='help-block'>","</span>");?>
                            </div>
                            <div class="form-group">
                                <label for="especialidad">Especialidad:</label>
                                <select name="especialidad" id="especialidad" class="form-control">
                                    <?php foreach($especialidades as $especialidad):?>
                                        <?php if($especialidad->id == $especialidad->id_espe):?>
                                        <option value="<?php echo $especialidad->id_espe?>" selected><?php echo $especialidad->nombre_espe;?></option>
                                    <?php else:?>
                                        <option value="<?php echo $especialidad->id_espe?>"><?php echo $especialidad->nombre_espe;?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
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
