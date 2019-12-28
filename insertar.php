<?php
include 'conexion.php';

// llegada del JSON
$w = file_get_contents("php://input");
$datos = json_decode($w, true);

$cliente = $datos['id'];
$salida = $datos['salida'];
$llegada = $datos['llegada'];
$fecha = $datos['fecha'];
$hora = $datos['hora'];

$q = "insert into RESERVA(ID,IDCLIENTE,IDSALIDA,IDLLEGADA,FECHA,HORA) values((select MAX(ID)+1 from RESERVA ),'$cliente',$salida,$llegada,'$fecha','$hora')";

// file_put_contents("inserta.txt",$q);

$result = ibase_query($conexion, $q);
