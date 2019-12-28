<?php
//Eliminar producto
include 'conexion.php';

$c = file_get_contents("php://input");
$datos = json_decode($c, true);

$codigo = $datos['id'];
$consulta = "delete from RESERVA where ID=$codigo";
ibase_query($conexion, $consulta);
