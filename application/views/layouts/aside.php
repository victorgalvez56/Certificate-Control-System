        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <li><a href="<?php echo base_url();?>movimientos/certificados/add">
                            <i class="glyphicon glyphicon-list-alt"></i><span>Agregar Certificados</span>
                        </a>
                    </li>
                    <li><a href="<?php echo base_url();?>movimientos/pagoscertificados/add">
                            <i class="glyphicon glyphicon-usd"></i><span>Pagar Certificados</span>
                        </a>
                    </li>                    

                    <li><a href="<?php echo base_url();?>mantenimiento/alumnos/add">
                            <i class="glyphicon glyphicon-user"></i><span>Agregar Alumnos</span>
                        </a>
                    </li> 

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-share-alt"></i> <span>Movimientos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>



                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>movimientos/certificados"><i class="fa fa-circle-o"></i>Certificados</a></li>
                            <li><a href="<?php echo base_url();?>movimientos/pagoscertificados"><i class="fa fa-circle-o"></i>Pagos</a></li>                            
                            <li><a href="<?php echo base_url();?>mantenimiento/alumnos"><i class="fa fa-circle-o"></i>Alumnos</a></li>


                            
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Mantenimiento</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/especialidades"><i class="fa fa-circle-o"></i>Especialidades</a></li>
                            <li><a href="<?php echo base_url();?>mantenimiento/tipocertificados"><i class="fa fa-circle-o"></i>Tipos de Certificados</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/cursos"><i class="fa fa-circle-o"></i>Cursos</a></li>
                            <li><a href="<?php echo base_url(); ?>mantenimiento/sedes"><i class="fa fa-circle-o"></i>Sedes</a></li>
                        </ul>
                    </li>                    
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>administrador/usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                            <li><a href="<?php echo base_url();?>administrador/permisos"><i class="fa fa-circle-o"></i> Permisos</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->