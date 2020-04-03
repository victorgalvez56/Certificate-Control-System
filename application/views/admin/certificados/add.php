
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Certificados
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
                        
                        <form action="<?php echo base_url();?>movimientos/certificados/store" method="POST" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-5">
                                    <label for="">Alumnos:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="idalumno" id="idalumno">
                                        <input type="text" class="form-control" disabled="disabled" id="alumno">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default2"><span class="fa fa-search"></span> Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div> 
  
                                <div class="col-md-3">
                                    <label for="tipo">Tipo de Certificado:</label>
                                    <select name="tipo" id="tipo" class="form-control">
                                        <?php foreach($tipos as $tipo):?>
                                            <option value="<?php echo $tipo->id_tipo?>"><?php echo $tipo->nombre_tipo;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>                                                                

                                 
                            </div>
                            <div class="form-group">

                                <div class="col-md-5">
                                    <label for="">Cursos:</label>
                                    <div class="input-group">
                                        <input type="hidden" name="idcurso" id="idcurso">
                                        <input type="text" class="form-control" disabled="disabled" id="curso">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-default" ><span class="fa fa-search"></span> Buscar</button>
                                        </span>
                                    </div><!-- /input-group -->
                                </div> 
                                 <div class="col-md-3">
                                    <label for="">Código:</label>
                                    <input type="text" class="form-control" id="codigo">
                                </div>                               
                                <div class="col-md-3">
                                    <label for="">Fecha de Entrega:</label>
                                    <input type="date" class="form-control" name="fecha">
                                </div>

                            </div>
                            <table id="tbcursos" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre del Curso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>


                            
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                </div>
                                
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de Cursos</h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Fin</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($cursos)):?>
                            <?php foreach($cursos as $curso):?>
                                <tr>
                                    <td><?php echo $curso->codigo_curso;?></td>
                                    <td><?php echo $curso->nombre_curso;?></td>
                                    <td><?php echo $curso->fecha_inicio;?></td>
                                    <td><?php echo $curso->fecha_fin;?></td>

                                    <?php $datacliente = $curso->id_curso."*".$curso->codigo_curso."*".$curso->nombre_curso."*".$curso->fecha_inicio."*".$curso->fecha_fin;?>
                                    <td>
                                        <button type="button" class="btn btn-success btn-check1" value="<?php echo $datacliente;?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-default2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista de Alumnos</h4>
            </div>
            <div class="modal-body">
                <table id="example" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Teléfono</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($alumnos)):?>
                            <?php foreach($alumnos as $alumno):?>
                                <tr>
                                    <td><?php echo $alumno->dni;?></td>
                                    <td><?php echo $alumno->nombres_alumn." ".$alumno->apellidos_alumn;?></td>
                                    <td><?php echo $alumno->telefono_alumn;?></td>

                                    <?php $datacliente = $alumno->nombres_alumn."*".$alumno->id_alumn."*".$alumno->apellidos_alumn."*".$alumno->telefono_alumn;?>
                                    <td>
                                        <button type="button" class="btn btn-success btn-check10" value="<?php echo $datacliente;?>"><span class="fa fa-check"></span></button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>