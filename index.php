<?php
    require "conexion.php";

    session_start();
    
    if ($_POST){
    
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
   
    $sql = "SELECT id, password, nombre, tipo_usuario FROM usuarios WHERE usuario = '$usuario'";
    $resultado = $mysqli->query ($sql);
    $num = $resultado->num_rows;

    if($num>0){
        $row = $resultado-> fetch_assoc();
        $password_bd =$row['password'];
        $pass_c = sha1($password);

        if($password_bd == $pass_c){

            $_SESSION['id'] = $row['id'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

            header ("Location: principal.php");

        }else{
            $incorrecto = "La contraseña es incorrecta";
        }


    }else {
    $incorrecto= "NO existe usuario";

    }

    }


?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Controversias - Login</title>
    
    <!-- Archivo manifiesto-->
    <link rel="manifest" href="./manifest.json" >
    <script>
        if("serviceWorker" in navigator){
            navigator.serviceWorker.register("sw.js");
        }
    </script>

    <!-- Fuentes personalizadas para esta planilla-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <!-- Estilos personalizados para esta plantilla-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Fila exterior -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Fila anidada dentro de cuerpo de tarjeta -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15 rem;" src="img/Banco Union Logos.png" alt="...">
                                        <h1 class="h4 text-gray-900 mb-4">ACCESO AL SISTEMA DE CONTROVERSIAS</h1>
                                    </div>
                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                        <div class="form-group">
                                                <label class="small mb-1" >Usuario</label> 
                                                <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="usuario"
                                                placeholder="Ingrese su usuario">
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Contraseña</label>
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        
                                        <!--<div class="form-group">
                                            
                                            <input type="text" class="captcha" name="captcha_code"
                                                id="captcha_code">
                                            <span class="input-group-addon"><img src="captcha_gen.php" id="captcha_image"/>
                                            <br><label class="small mb-1">Escriba los carácteres de la imagen</label>
                                        </div>-->

                                        <div class = "form group">
                                            <div class = "col-sm-offset-2 col-sm-12" style="text-align:center">
                                            <?php if ($_POST){
                                            echo $incorrecto;
                                            } else {?>
                                            
                                            <?php } ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Ingresar
                                            </button>
                                        </div>
                                        
                                    
                                        
                                        
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
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