<?php
session_start();
require_once('lib/ConectorBD.php');
$bHayError = false;

if (isset($_SESSION['apellido1']) == false){
    header("location:login.php"); //Redirecciona la pagina hacia otra pagina.
}

if ($_POST){
    if ($_POST['clave']= $_POST['confirmacion']){
        $insertUsuario = 'INSERT INTO usuario(usuario_id,clave, usuario_estado_id, usuario_tipo_id) VALUES ("'. $_POST['usuario'] .'","'. $_POST['clave'] .'",1,1)';
        ConectorBD::executeQuery($insertUsuario);
        $insertPersona = 'INSERT INTO persona(cedula, nombre, apellido1, apellido2,dob, email, usuario_id) VALUES ("'. $_POST['cedula'] .'","'. $_POST['nombre'] .'","'. $_POST['apellido1'] .'","'. $_POST['apellido2'] .'","'. $_POST['dob'] .'","'. $_POST['email'] .'","'. $_POST['usuario'] .'")';
        ConectorBD::executeQuery($insertPersona);
        echo '<script>alert("Usuario agregado satisfactoriamente");</script>';
    } else {
        $bHayError = true;
        $sMensajeError = "Claves no coinciden.";
    }
}
?>
<html>
    <head>
        <title>Add User</title>
        <link type="text/css"; rel="stylesheet"; href="stylesheet.css"/>
    </head>
    <body>
        <header>
            <img src="img/Logo.png" width="7%" height="15%""> Main Page
        </header>
        <div><?php include('menu.php'); ?></div>
        <section>
            <h3>Add User</h3>
            <form action="#" method="POST">
                <table>
                    <tr>
                        <td>Cedula:</td>
                        <td><input type="text" name="cedula"></td>
                    </tr>
                    <tr>
                        <td>Nombre:</td>
                        <td><input type="text" name="nombre" id="nombre"></td>
                    </tr>
                    <tr>
                        <td>Apellido 1:</td>
                        <td><input type="text" name="apellido1" id="apellido1"></td>
                    </tr>
                    <tr>
                        <td>Apellido 2:</td>
                        <td><input type="text" name="apellido2" id="apellido2"></td>
                    </tr>
                    <tr>
                        <td>E-Mail:</td>
                        <td><input type="email" name="email" id="email"></td>
                    </tr>
                    <tr>
                        <td>Fecha de nacimiento:</td>
                        <td><input type="date" name="dob" id="dob"></td>
                    </tr>
                    <tr>
                        <td>Usuario:</td>
                        <td><input type="text" name="usuario" id="usuario"></td>
                    </tr>
                    <tr>
                        <td>Clave temporal:</td>
                        <td><input type="password" name="clave" id="clave"></td>
                    </tr>
                    <tr>
                        <td>Confirme clave temporal:</td>
                        <td><input type="password" name="confirmacion" id="confirmacion"><?php if ($bHayError){ echo '<br> ' . $sMensajeError; } ?></td>
                    </tr>
                    <tr>
                        <td><button type="submit">Agregar</button></td>
                        <td><button type="reset">Limpiar</button></td>
                    </tr>
                </table>
            </form>
        </section>
        <footer>
            <center>Copyright 2015. Developed by I&D</center>
        </footer>
    </body>
</html>