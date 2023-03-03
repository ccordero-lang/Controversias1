<?php

    include 'plantilla.php';
    require 'conexion.php';
    //session_start();
    //if(!isset($_SESSION['id'])){
    //header("Location: index.php");
    //}

    //$nombre = $_SESSION['nombre'];
    //$tipo_usuario = $_SESSION['tipo_usuario'];

    $cod_cli = $_GET['cod_cli'];

        
    $sql= "SELECT * FROM controversias WHERE cod_cli = $cod_cli ";
    $resultado = $mysqli ->query($sql);

    $sql_1= "SELECT * FROM tarjetahabiente WHERE cod_cli = $cod_cli";
    $resultado_1 = $mysqli ->query($sql_1);


    $pdf = new PDF('P', 'mm', 'letter');
    $pdf->AliasNbPages();
	$pdf->AddPage();
    
    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(140,8, 'Informacion del tarjetahabiente',1,0,'C',1);
	$pdf->Ln(10);

    $pdf->SetFont('Arial','',10);
    while ($row = $resultado_1->fetch_assoc()){

    
    $pdf->Cell(60, 8, "Codigo del cliente:                     " . $row['cod_cli'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Nombre:                                     " . $row['nombre']." " .$row['apellido'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Tipo de doc. de identidad:         " . $row['tipo_doc'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Numero de documento:             " . $row['num_doc'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Direccion:                                   " . $row['direccion'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Telefono:                                    " . $row['telefono'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "email:                                         " . $row['email'], 0, 0, '');
    $pdf->Ln(15);
    }

    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(140,8, 'Informacion de la controversia',1,0,'C',1);
	$pdf->Ln(10);
    
    $pdf->SetFont('Arial','',10);

    while ($row_1 = $resultado->fetch_assoc()){

    
    $pdf->Cell(60, 8, "Flujo:                                          " . $row_1['flujo'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Codigo del cliente:                     " . $row_1['cod_cli'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Nombre del tarjetahabiente:      " . $row_1['nombre_cliente'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Departamento:                           " . $row_1['departamento'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Nombre del creador:                  " . $row_1['nombre_creador'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Número de tarjeta:                   " . $row_1['numero_tarjeta'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Comercio:                                  " . $row_1['comercio'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Cant. transacciones                   " . $row_1['num_transaccion'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Monto en disputa                       " . $row_1['monto_disputa'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Moneda                                      " . $row_1['moneda'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Fecha de confirmacion               " . $row_1['fecha_confirmacion'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Fecha de finalizacion                 " . $row_1['fecha_finalizacion'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Estado                                        " . $row_1['estado'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "CITE                                           " . $row_1['cite'], 0, 0, '');
    $pdf->Ln(8);
    $pdf->Cell(60, 8, "Detalle                                        " . $row_1['detalle'], 0, 0, '');
    $pdf->Ln(8);
    }

    $pdf -> Output();


     
?>