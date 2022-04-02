<?php require 'conexion.php';
validacion($conexion, $infoDeConexion);
$res = consulta($conexion);

if ($res == false) {
    die(print_r(sqlsrv_errors(), true));
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion a una base de datos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="contenedor">
        <header>
            <div class="nombrePagina">
                <h3>Proyecto Final</h3>
            </div>

            <nav class="menu">
                <a href="http://localhost/BD/index.php">Inicio</a>
                <a href="http://localhost/BD/resultado.php">Ir a consulta</a>
                <a href="http://localhost/BD/enunciado.php">Enunciado</a>
                <a href="http://localhost/BD/modeloER.php">Modelo entidad relacion</a>
                <a href="http://localhost/BD/modeloR.php">Modelo Relacional</a>
            </nav>
        </header>

        <div class="cons">
            <h1><?php echo 'Conexion establecida a la base de datos: ' . $infoDeConexion['Database']; ?></h1>
            <h2><?php echo 'Conectado al usuario: '. $infoDeConexion['UID'];?></h2>
            <h2><?php echo 'La consulta realizada fue: ' ?> <p class="consulta"><?php echo $sql ?></p>
            </h2>
        </div>

        <table class="tabla">
            <tr>
                <th>No_control</th>
                <th>Nombre_alum</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Semestre</th>
                <th>Creditos</th>
            </tr>

            <?php

            validacion($conexion, $infoDeConexion);
            $res = consulta($conexion);

            if ($res == false) {
                die(print_r(sqlsrv_errors(), true));
            }

            while ($fin = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $fin['No_control'] . "<br>" ?></td>
                    <td><?php echo $fin['Nombre_alum'] . "<br>" ?></td>
                    <td><?php echo $fin['Telefono'] . "<br>" ?></td>
                    <td><?php echo $fin['Correo'] . "<br>" ?></td>
                    <td><?php echo $fin['Semestre'] . "<br>" ?></td>
                    <td><?php echo $fin['Creditos'] . "<br>" ?></td>
                </tr>
            <?php
            } ?>

        </table>

        <footer>
            <div class="autor">
                <p>Integrantes: <br><br>
                    Luis Adrian Casillas Ornelas <br>
                    Leonardo Missael Hernandez Calvillo<br>
                    Luis Brandon Torres Rocha</p>
            </div>
        </footer>
</body>

</html>