<?php
include 'conexion.php';



$dni = $_POST['dni'];
if ($dni == '') {
    $reserva = "select RESERVA.ID, CLIENTE.NOMBRE,LUGAR.DESCRIP SALIDA,LLEGADA.DESCRIP LLEGADA,FECHA,HORA
              from RESERVA inner join CLIENTE on RESERVA.IDCLIENTE=CLIENTE.DNI
                           inner join LUGAR on RESERVA.IDSALIDA=LUGAR.ID
                           inner join LLEGADA on RESERVA.IDLLEGADA=LLEGADA.ID";
} else {
    $reserva = "select RESERVA.ID, CLIENTE.NOMBRE,LUGAR.DESCRIP SALIDA,LLEGADA.DESCRIP LLEGADA,FECHA,HORA
              from RESERVA inner join CLIENTE on RESERVA.IDCLIENTE=CLIENTE.DNI
                           inner join LUGAR on RESERVA.IDSALIDA=LUGAR.ID
                           inner join LLEGADA on RESERVA.IDLLEGADA=LLEGADA.ID where IDCLIENTE='$dni'";
}
$tabla = "<table border='1'>";
$resultado = ibase_query($conexion, $reserva);

while ($q = ibase_fetch_assoc($resultado)) {
    $tabla .= '<tr>
				<td>' . $q['NOMBRE'] . '</td>
				<td>' . $q['SALIDA'] . '</td>
				<td>' . $q['LLEGADA'] . '</td>
				<td>' . $q['FECHA'] . '</td>
				<td>' . $q['HORA'] . '</td>
				<td><button id="btnElimina"  onclick="Eliminar(\'' . $q['ID'] . '\',\'' . $q['NOMBRE'] . '\');">ELIMINAR</button></td>
			</tr>';
}

$tabla .= "</table>";

echo $tabla;

// Guardo los datos en un archivo de texto
file_put_contents("eliminados.txt", $tabla);
