<?php

    session_start();
    if(!isset($_SESSION['id'])){
    header("Location: index.php");
    }

    $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['tipo_usuario'];

    require 'conexion.php';
	
    
	$id = $_GET['id'];
    
	
	$sql = "SELECT * FROM controversias WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
    

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Primera version control de controversias">
    <meta name="author" content="Carlos Crisostomo Cordero Paz">

    <title>Controversias</title>

    <!-- Fuentes personalizadas para esta plantilla-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        rel="stylesheet">

    <!-- Estilos personalizados para esta plantilla-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	
   
    <script type="text/javascript">
        $(document).ready(function() {
            $('.delete').click(function(){
                var parent = $(this).parent().attr('id');
                var service = $(this).parent().attr('data');
                var datastring = 'id='+service;

                $.ajax({
                    type:"POST",
                    url: "del_file.php",
                    data: datastring,
                    success: function(){
                    location.reload();
                    }   
                });
            });
        });
    </script> 

</head>

<body id="page-top">

    <!-- Pagina -->
    <div id="wrapper">

        <!-- Barra lateral -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Barra lateral - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="principal.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    </div>
                <div class="sidebar-brand-text mx-3">Controversias<sup>1.0</sup></div>
                
            </a>

            <!-- Divisor -->
            <hr class="sidebar-divider my-0">

           <!-- Divisor -->
            <hr class="sidebar-divider">

            <!-- Encabezado -->
            <div class="sidebar-heading">
                Controversia
            </div>

            <!-- Elemento de navegacion - Menu de páginas -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapsetwo">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Registro</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="nuevo.php">Nuevo</a>
                        <a class="collapse-item" href="editar.php">Modificar/Eliminar</a>
                    </div>
                </div>
            </li>

            <!-- Elemento de navegación - Menu Colapsado de utilidades -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file-export"></i>
                    <span>Reportes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="consolidado.php">Consolidado</a>
                        <a class="collapse-item" href="en_atencion.php">En atención</a>
                        <a class="collapse-item" href="finalizado.php">Finalizado</a>
                    </div>
                </div>
            </li>
            
            <hr class="sidebar-divider">

            <!-- Encabezado -->
            <div class="sidebar-heading">
                Tarjetahabiente
            </div>

            <!-- Elemento de navegacion - Menu de páginas -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapsetwo">
                    <i class="fas fa-fw fa-address-card"></i>
                    <span>Registro de cliente</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="nuevocliente.php">Nuevo</a>
                        <a class="collapse-item" href="editarcliente.php">Buscar/Modificar</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider">

            <!-- Elemento de navegación- guia rápida -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-book-open"></i>
                    <span>Guia Rápida</span></a>
            </li>

            <!-- Divisor -->
            <hr class="sidebar-divider">

            <?php if($tipo_usuario == 1) { ?>
            <!-- Título -->
            <div class="sidebar-heading">
                Administrador
            </div>

            

            <!-- Elemento de navegacion - Usuarios -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="utilities-color.html">Adicionar</a>
                        <a class="collapse-item" href="utilities-border.html">Eliminar</a>
                    </div>
                </div>
            </li>

            

            <!-- Divisor -->
            <hr class="sidebar-divider d-none d-md-block">

            <?php } ?>

            
        </ul>
        <!-- Fin de la barra lateral -->

        <!-- Contenedor de contenido -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Contenido principal -->
            <div id="content">

                <!-- Barra superior -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- barra lateral (barraSuperior) -->
                    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
               
                    <!-- Barra superior barra de navegación -->
                    <ul class="navbar-nav ml-auto">
                                           
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Elemento de navegación - Información de usuario -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombre; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Desplegable - Informacion de usuario -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- Fin de la barra superior -->

                <!-- Inicio del contenido de la pagina -->
                <div class="container-fluid">

                    <!-- Cabezera de la pagina -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">MODIFICAR REGISTRO</h6>
                        </div>
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="update.php" enctype="multipart/form-data" autocomplete="off">
                                
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="flujo" class="col-sm-2 control-label">Numero de flujo</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="flujo" name="flujo" placeholder="Numero de flujo de reclamo" value="<?php echo $row['flujo']; ?>" required >
                                    </div>                               
                                 </div>

                                 <div class="form-group">
                                    <label for="cod_cli" class="col-sm-2 control-label">Codigo del cliente</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="cod_cli" name="cod_cli" placeholder="Código del cliente" value="<?php echo $row['cod_cli']; ?>" required >
                                    </div>                               
                                 </div>

                                 <div class="form-group">
                                    <label for="nombre_ciente" class="col-sm-2 control-label">Tarjetahabiente</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre del tarjetahabiente" value="<?php echo $row['nombre_cliente']; ?>" required >
                                    </div>                               
                                 </div>

                                 <div class="form-group">
                                    <label for="departamento" class="col-sm-2 control-label">Departamento</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="departamento" name="departamento">
                                            <option value="SANTA CRUZ" <?php if ($row['departamento']=='SANTA CRUZ') echo 'selected'; ?>>SANTA CRUZ</option>
                                            <option value="LA PAZ" <?php if ($row['departamento']=='LA PAZ') echo 'selected'; ?>>LA PAZ</option>
                                            <option value="COCHABAMBA" <?php if ($row['departamento']=='COCHABAMBA') echo 'selected'; ?>>COCHABAMBA</option>
                                            <option value="BENI" <?php if ($row['departamento']=='BENI') echo 'selected'; ?>>BENI</option>
                                            <option value="SUCRE" <?php if ($row['departamento']=='SUCRE') echo 'selected'; ?>>SUCRE</option>
                                            <option value="TARIJA" <?php if ($row['departamento']=='TARIJA') echo 'selected'; ?>>TARIJA</option>
                                            <option value="ORURO" <?php if ($row['departamento']=='ORURO') echo 'selected'; ?>>ORURO</option>
                                            <option value="PANDO" <?php if ($row['departamento']=='PANDO') echo 'selected'; ?>>PANDO</option>
                                            <option value="POTOSI" <?php if ($row['departamento']=='SANTA CRUZ') echo 'selected'; ?>>POTOSI</option>
                                        </select>
                                    </div>                               
                                 </div>

                                 <div class="form-group">
                                    <label for="nombre_creador" class="col-sm-2 control-label">Nombre del creador</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="nombre_creador" name="nombre_creador" placeholder="Creador" value="<?php echo $row['nombre_creador']; ?>" required >
                                    </div>                               
                                 </div>

                                 <div class="form-group">
                                    <label for="numero_tarjeta" class="col-sm-2 control-label">Tarjeta</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" placeholder="Numero de tarjeta" value="<?php echo $row['numero_tarjeta']; ?>" required >
                                    </div>                               
                                 </div>

                                 <div class="form-group">
                                    <label for="comercio" class="col-sm-2 control-label">Comercio</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="comercio" name="comercio" placeholder="Comercio" value="<?php echo $row['comercio']; ?>" required >
                                    </div>                               
                                 </div>

                                 <div class="form-group">
                                    <label for="num_transaccion" class="col-sm-2 control-label"># de transacciones</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="num_transaccion" name="num_transaccion" placeholder="Cantidad de transacciones" value="<?php echo $row['num_transaccion']; ?>" required >
                                    </div>                               
                                 </div>



                                 <div class="form-group">
                                    <label for="monto_disputa" class="col-sm-2 control-label">Monto en disputa</label>
                                    <div class="col-sm-6">
                                        <input type="decimal" class="form-control" id="monto_disputa" name="monto_disputa" placeholder="Monto" value="<?php echo $row['monto_disputa']; ?>" required >
                                    </div>                               
                                 </div>
				
                                 <div class="form-group">
                                    <label for="moneda" class="col-sm-2 control-label">Moneda</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="moneda" name="moneda">
                                            <option value="BOLIVIANOS" <?php if ($row['moneda']=='BOLIVIANOS') echo 'selected'; ?>>BOLIVIANOS</option>
                                            <option value="DOLARES" <?php if ($row['moneda']=='DOLARES') echo 'selected'; ?>>DOLARES</option>
                                        </select>
                                    </div>                               
                                 </div>
				                
                                 <div class="form-group">
                                    <label for="fecha_confirmacion" class="col-sm-2 control-label">Fecha de confirmación</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="fecha_confirmacion" name="fecha_confirmacion" value="<?php echo $row['fecha_confirmacion']; ?>" required >
                                    </div>                               
                                 </div>

                                 <div class="form-group">
                                    <label for="fecha_finalizacion" class="col-sm-2 control-label">Fecha de Finalización</label>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="fecha_finalizacion" name="fecha_finalizacion" value="<?php echo $row['fecha_finalizacion']; ?>">
                                    </div>                               
                                 </div>
				             
                                 <div class="form-group">
                                    <label for="estado" class="col-sm-2 control-label">Estado</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="estado" name="estado">
                                            <option value="EN ATENCION" <?php if ($row['estado']=='EN ATENCION') echo 'selected'; ?>>EN ATENCION</option>
                                            <option value="PRE ARBITRAJE" <?php if ($row['estado']=='PRE ARBITRAJE') echo 'selected'; ?>>PRE ARBITRAJE</option>
                                            <option value="ARBITRAJE" <?php if ($row['estado']=='ARBITRAJE') echo 'selected'; ?>>ARBITRAJE</option>
                                            <option value="PRE CUMPLIMIENTO" <?php if ($row['estado']=='PRE CUMPLIMIENTO') echo 'selected'; ?>>PRE CUMPLIMIENTO</option>
                                            <option value="CUMPLIMIENTO" <?php if ($row['estado']=='CUMPLIMIENTO') echo 'selected'; ?>>CUMPLIMIENTO</option>
                                            <option value="FINALIZADO" <?php if ($row['estado']=='FINALIZADO') echo 'selected'; ?>>FINALIZADO</option>
                                        </select>
                                    </div>                               
                                 </div>

                                 <div class="form-group">
                                    <label for="cite" class="col-sm-2 control-label">CITE</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="cite" name="cite" placeholder="CITE" value="<?php echo $row['cite']; ?>">
                                    </div>                               
                                 </div>

                                 <div class="form-group">
                                    <label for="detalle" class="col-sm-2 control-label">Detalle</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="detalle" name="detalle" placeholder="Ingrese alguna observación" value="<?php echo $row['detalle']; ?>">
                                    </div>                               
                                 </div>

                                 <div class="form-group">
                                    <label for="archivo" class="col-sm-2 control-label">Archivo</label>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control" id="archivo" name="archivo">
                                        <?php
                                            $path = "files/".$id;
                                            if(file_exists($path)){
                                                $directorio = opendir($path);
                                                while ($archivo=readdir($directorio))
                                                {
                                                    if (!is_dir($archivo)){
                                                        echo "<div_data='".$path."/".$archivo."'><a href='".$path."/".$archivo."'
                                                        title='Ver archivo adjunto'><span class='fas fa-fw fa-image'></span></a>";
                                                        echo "$archivo <a href='#' class='delete' title='Eliminar archivo adjunto'><span 
                                                        class='fas fa-fw fa-trash' aria-hidden='true'></span></a></div>";
                                                                                                                 
                                                    }
                                                }
                                            } 
                                        ?>
                                    </div>                               
                                 </div>

                                  

				                <div class="form-group">
					            <div class="col-sm-offset-2 col-sm-10">
						            <a href="principal.php" class="btn btn-default">Regresar</a>
						            <button type="submit" class="btn btn-primary">Guardar</button>
					            </div>
				                </div>
			                </form>
                        </div>
                    </div>

                </div>
                <!-- /.Contenedor -->
                

            </div>
            <!-- Fin del contenido principal -->

            

        </div>
        <!-- Fin del contenido de contenedor -->

    </div>
    <!-- Fin del contenedor de página -->

    <!-- Desplazarse al boton superior-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!--    Modal de cierre de sesion-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Esta seguro de cerrar su sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" para finalizar su sesión</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    


    

</body>

</html>