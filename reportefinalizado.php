<?php

     

    require 'conexion.php';

    $fecha_inicio = $mysqli->real_escape_string($_POST['fecha_inicio']);
    $fecha_final = $mysqli->real_escape_string($_POST['fecha_final']);

    $sql= "SELECT * FROM controversias WHERE fecha_confirmacion >= '$fecha_inicio' AND estado = 'FINALIZADO'";
    $resultado = $mysqli ->query($sql);

    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\{SpreadSheet,IOFactory};
    
   


    $excel=new Spreadsheet();
    $hojaActiva=$excel->getActiveSheet();
    $hojaActiva->setTitle("Controversias");

    $hojaActiva->setCellValue('A1','ID');
    $hojaActiva->setCellValue('B1','FLUJO');
    $hojaActiva->setCellValue('C1','NOMBRE');
    $hojaActiva->setCellValue('D1','DEPARTAMENTO');
    $hojaActiva->setCellValue('E1','CREADOR');
    $hojaActiva->setCellValue('F1','TARJETA');
    $hojaActiva->setCellValue('G1','COMERCIO');
    $hojaActiva->setCellValue('H1','# TRANSACCIONES');
    $hojaActiva->setCellValue('I1','MONTO');
    $hojaActiva->setCellValue('J1','MONEDA');
    $hojaActiva->setCellValue('K1','FECHA CONFIRMACIÓN');
    $hojaActiva->setCellValue('L1','FECHA FINALIZACIÓN');
    $hojaActiva->setCellValue('M1','ESTADO');
    $hojaActiva->setCellValue('N1','CITE');
    $hojaActiva->setCellValue('O1','DETALLE');

    $fila=2;
    
    while($rows=$resultado->fetch_assoc()){
        $hojaActiva->setCellValue('A'.$fila,$rows['id']);
        $hojaActiva->setCellValue('B'.$fila,$rows['flujo']);
        $hojaActiva->setCellValue('C'.$fila,$rows['nombre_cliente']);
        $hojaActiva->setCellValue('D'.$fila,$rows['departamento']);
        $hojaActiva->setCellValue('E'.$fila,$rows['nombre_creador']);
        $hojaActiva->setCellValue('F'.$fila,'  '.$rows['numero_tarjeta']);
        $hojaActiva->setCellValue('G'.$fila,$rows['comercio']);
        $hojaActiva->setCellValue('H'.$fila,$rows['num_transaccion']);
        $hojaActiva->setCellValue('I'.$fila,$rows['monto_disputa']);
        $hojaActiva->setCellValue('J'.$fila,$rows['moneda']);
        $hojaActiva->setCellValue('K'.$fila,$rows['fecha_confirmacion']);
        $hojaActiva->setCellValue('L'.$fila,$rows['fecha_finalizacion']);
        $hojaActiva->setCellValue('M'.$fila,$rows['estado']);
        $hojaActiva->setCellValue('N'.$fila,$rows['cite']);
        $hojaActiva->setCellValue('O'.$fila,$rows['detalle']);
        $fila++;

    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Mi excel.xlsx"');
    header('Cache-Control: max-age=0');
    
    $writer = IOFactory::createWriter($excel, 'Xlsx');
    $writer->save('php://output');
    



     
?>


                        