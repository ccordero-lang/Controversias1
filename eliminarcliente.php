<?php
    require 'conexion.php';

    session_start();
    if(!isset($_SESSION['id'])){
    header("Location: index.php");
    }

    $nombre = $_SESSION['nombre'];
    $tipo_usuario = $_SESSION['tipo_usuario'];
    
   
    $cod_cli = $_GET['cod_cli'];
    

    $sql = "DELETE FROM tarjetahabiente WHERE cod_cli='$cod_cli'";

    $resultado = $mysqli -> query ($sql);

    
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
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuración
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <div class="container">
                <div class = "form group">
                    <div class = "col-sm-offset-2 col-sm-10" style="text-align:center">
                        <?php if ($resultado){?>
                        <h3>REGISTRO ELIMINADO</H3>
                        <?php } else {?>
                        <h3>ERROR AL ELIMINAR</h3>
                        <?php } ?>
                        <a href="editarcliente.php" class="btn btn-primary">Regresar</a>
                    </div>
                </div>
                </div>
</body>
</html>