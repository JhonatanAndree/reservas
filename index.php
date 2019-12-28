<?php
include 'conexion.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilos.css">
    <title>Reservas 2019</title>
</head>

<body>
    <header>
        <div class="encabezado">
            <div class="titulo">
                <h1>Sistema de Reservas de viaje 2019</h1>
            </div>
        </div>
    </header>

    <main>
        <!-- inicia sección formularios -->
        <section id="inicio">
            <div class="contenedor">
                <div class="formularios">

                    <!-- Inicia Formulario Registro -->
                    <div class="registro">
                        <form action="registrar.php" method="POST">
                            <h2>Registro de Cliente</h2>
                            <div>
                                <input type="text" id="dni" name="dni" placeholder="Número de DNI" require>
                            </div>

                            <div>
                                <input type="text" id="nombre" name="nombre" placeholder="Ingrese su Nombre" require>
                            </div>

                            <button type="submit">REGISTRAR CLIENTE</button>
                        </form>
                    </div>

                    <!-- Inicia Formulario de búsqueda -->
                    <div class="buscador">
                        <h2>Buscar</h2>
                        <form class="form-group">
                            <label role="alert">Ingresar DNI Cliente Frecuente</label><br><br>
                            <input type="text" id="dniCliente" placeholder="DNI"><button type="button" class="btn btn-danger" onclick="buscaCliente();">Buscar cliente</button><br><br>
                            <br>
                            <select id="salida">
                                <option value="0">Salida</option>
                                <?php
                                $q = "select * from LUGAR";
                                $resultado = ibase_query($conexion, $q);
                                while ($h = ibase_fetch_assoc($resultado)) {
                                    ?>
                                    <option value="<?php echo $h['ID']; ?>"><?php echo $h['DESCRIP']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select id="llegada">
                                <option value="0">Llegada</option>
                                <?php
                                $q = "select * from LLEGADA";
                                $resultado = ibase_query($conexion, $q);
                                while ($r = ibase_fetch_assoc($resultado)) {
                                    ?>
                                    <option value="<?php echo $r['ID']; ?>"><?php echo $r['DESCRIP']; ?></option>
                                <?php
                                }
                                ?>
                            </select><br><br>
                            <label>Fecha y Hora de Viaje</label><br>
                            <input type="date" id="fecha">
                            <input type="time" id="hora"><br><br>
                            <button type="button" class="btn btn-secondary" onclick="regReserva();" type="button" class="btn btn-light">GUARDAR</button>
                        </form>
                        <input type="text" id="buscaReserva" placeholder="BUSCA"><button id="automatico" type="button" class="btn btn-info" onclick="buscarReserva();">Buscar por DNI / Actualizar
                            Reservas</button><br><br>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sección Tabla -->
        <section id="tabla">
            <div class="contenedor">
                <h1>Reservas</h1>
                <table class="tabla" border="0" align="center" id="TablaProductos">
                    <thead>
                        <tr>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">SALIDA</th>
                            <th scope="col">LLEGADA</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">HORA</th>
                            <th scope="col">BORRAR</th>
                        </tr>
                    </thead>
                    <tbody id="recibir">
                    </tbody>
                </table>
            </div>
        </section>




    </main>


    <script src="jquery.js"></script>
    <script src="funciones.js"></script>
</body>

</html>