<?php

    

    session_start();
    if(!isset($_SESSION['id'])){
    header("Location: index.php");
    }

    $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['tipo_usuario'];

    require 'conexion.php';
    $sql= "SELECT * FROM controversias";
    $resultado = $mysqli ->query($sql);
    
    

    
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Primera version control de controversias">
    <meta name="Carlos Crisotomo Cordero Paz" content="Controversias">

    <title>Controversias</title>

    <!-- Fuentes personalizadas para esta plantilla-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        rel="stylesheet">

    <!-- Estilos personalizados para esta plantilla-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Estilos personalizados para esta página -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/jquery.dataTables.min.css" rel="stylesheet">	
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
	

    


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

            <?php if($tipo_usuario == 2) { ?>

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
            
            <?php } ?>
            
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
                        <a class="collapse-item" href="adicionar.php">Adicionar</a>
                        <a class="collapse-item" href="editarusuario.php">Eliminar</a>
                    </div>
                </div>
            </li>

            

            <!-- Divisor -->
            <hr class="sidebar-divider d-none d-md-block">

            <?php } ?>

            <!-- Mensaje de la barra lateral -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/Visa-Logo-2005.jpg" alt="...">
                <p class="text-center mb-2"><strong>VISA INTERNACIONAL</strong> Desea conocer acerca de VISA</p>
                <a class="btn btn-success btn-sm" href="https://www.visa.com.bo/support/consumer/visa-rules.html">click aqui</a>
            </div>

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

                    
                    <!-- Tabla -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Generar excel en atencion</h6>
                        </div>
                        <div class="card-body">
                        <form class="form-horizontal" method="POST" action="reporteenatencion.php" autocomplete="off">

                                <div class="form-group">
                                   <label for="fecha_inicio" class="col-sm-2 control-label">Fecha inicio</label>
                                   <div class="col-sm-4">
                                       <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required >
                                   </div>                               
                                </div>

                                <div class="form-group">
                                   <label for="fecha_final" class="col-sm-2 control-label">Fecha final</label>
                                   <div class="col-sm-4">
                                       <input type="date" class="form-control" id="fecha_final" name="fecha_final" required >
                                   </div>                               
                                </div>

                                <div class="form-group">
					            <div class="col-sm-offset-2 col-sm-10">
						            <a href="principal.php" class="btn btn-default">Regresar</a>
						            <button type="submit" class="btn btn-primary">Generar</button>
					            </div>
				                </div>
                        </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                

            </div>
            <!-- Fin del contenido principal -->

            <!-- Pie de pagina -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Gacanisa 2022</span>
                    </div>
                </div>
            </footer>
            <!-- Fin del pie de página -->

        </div>
        <!-- Fin del contenido-->

    </div>
    <!-- Fin de la página -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Recuadro de cierre de Sesión-->
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    

</body>

</html>