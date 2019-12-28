<?php
include 'conexion.php';
$conexion = ibase_connect("C:/laragon/www/reservas/RESERVA.DBA", "sysdba", "masterkey");


$cliente = $_POST['id'];

$p = "select * from CLIENTE where DNI='$cliente'";

$result = ibase_query($conexion, $p);

$encontrado = ibase_fetch_assoc($result);
echo $encontrado['NOMBRE'];
