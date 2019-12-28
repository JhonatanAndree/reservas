<?php
include 'conexion.php';
$dni = $_POST["dni"];
$nombre = $_POST["nombre"];

//Insertar datos en cliente
$insertCliente = "INSERT INTO CLIENTE(DNI,NOMBRE) VALUES ('$dni','$nombre')";

// //Validar datos repetidos
// $verifica_dni = ibase_query($conexion, "SELECT * FROM CLIENTE WHERE DNI = '$dni'");
// if (ibase_num_fields($verifica_dni) > 0) {
//     // echo "<script>alert ('El DNI ya se encuentra registrado')</script>";
//     echo '<script language="javascript">alert("El usuario ya se encuentra registrado");window.location.href="index.php"</script>';
//     exit;
// }



//Ejecutar
$resultado = ibase_query($conexion, $insertCliente);

if (!$resultado) {
    echo 'Error al registrarse';
} else {
    echo '<script language="javascript">alert("Nuevo usuario registrado exitosamente");window.location.href="index.php"</script>';
}
