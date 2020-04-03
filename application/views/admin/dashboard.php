
        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                Dashboard
                <small>Panel Control </small>
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo $cantalumn->countalumn;?></h3>

                                <p>Alumnos</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="<?php echo base_url();?>mantenimiento/alumnos" class="small-box-footer">Ver Alumnos <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo $cantdisponible->countdisponible;?></h3>

                                <p>Certificados Disponibles</p>
                            </div>
                            <div class="icon">
                                <i class="glyphicon glyphicon-list-alt"></i>
                            </div>
                            <a href="<?php echo base_url();?>movimientos/certificados" class="small-box-footer">Ver Certificados<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?php echo $cantespera->countespera;?></h3>

                                <p>Certificados En Espera</p>
                            </div>
                            <div class="icon">
                                <i class="glyphicon glyphicon-list-alt"></i>
                            </div>
                            <a href="<?php echo base_url();?>administrador/usuarios" class="small-box-footer">Ver Certificados<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?php echo $cantentregado->countentregado;?></h3>

                                <p>Certificados Entregados</p>
                            </div>
                            <div class="icon">
                                <i class="glyphicon glyphicon-list-alt"></i>
                            </div>
                            <a href="<?php echo base_url();?>movimientos/cajas" class="small-box-footer">Ver Certificados<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
