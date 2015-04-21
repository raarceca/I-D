<?php
session_start();
require_once('lib/ConectorBD.php');
$query = 'SELECT p.cedula, p.nombre, p.apellido1, p.apellido2, p.email, p.dob fechaNacimiento, u.usuario_id, u.clave
FROM persona p
JOIN usuario u ON p.usuario_id = u.usuario_id';
$arreglo = array();
$arreglo = ConectorBD::selectQuery($query);
?>
<html>
<head>
    <title>Mostrar Usuarios</title>
    <!--<link type="text/css"; rel="stylesheet"; href="stylesheet.css"/>-->
</head>
<body>
<header>
    <img src="img/Logo.png" width="7%" height="15%""> Main Page
</header>
<div><?php include('menu.php'); ?></div>
<section>
    <h3>Listado de Usuarios Activos</h3>
    <table>
        <tr>
            <td> <b>Cedula</b> </td>
            <td> <b>Nombre</b> </td>
            <td> <b>Apellidos</b> </td>
            <td> <b>E-Mail</b> </td>
            <td> <b>Fecha de Nacimiento</b> </td>
            <td> <b>Usuario</b> </td>
        </tr>
    <?php
        foreach ($arreglo as $row) {
            echo '<tr>';
                echo '<td>'.$row['cedula'].'</td>';
                echo '<td>'.$row['nombre'].'</td>';
                echo '<td>'.$row['apellido1'].' '.$row['apellido2'].'</td>';
                echo '<td>'.$row['email'].'</td>';
                echo '<td>'.$row['fechaNacimiento'].'</td>';
                echo '<td>'.$row['usuario_id'].'</td>';
            echo '</tr>';
        }
    ?>
    </table>
</section>
<footer>
    <center>Copyright 2015. Developed by I&D</center>
</footer>
</body>
</html>