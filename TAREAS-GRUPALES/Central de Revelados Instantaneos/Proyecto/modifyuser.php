<?php
session_start();
require_once('lib/ConectorBD.php');
require_once('lib/UtilidadesSesion.php');
$resultadoBusqueda = false;
$error = false;
if (isset($_SESSION['apellido1']) == false){
    header("location:login.php"); //Redirecciona la pagina hacia otra pagina.
}

if($_POST){
    if ($_POST['validacion']=='buscar'){
        UtilidadesSesion::guardarEnSesion('cedulaActualizar',$_POST['cedula']);
        $query = 'SELECT p.cedula, p.nombre, p.apellido1, p.apellido2, p.email, p.dob fechaNacimiento, u.usuario_id, u.clave
FROM persona p
JOIN usuario u ON p.usuario_id = u.usuario_id
where p.cedula="'.$_POST['cedula'].'"';
        $arreglo = array();
        $arreglo = ConectorBD::selectQuery($query);
        foreach ($arreglo as $row) {
            $nombre = $row['nombre'];
            $apellido1 = $row['apellido1'];
            $apellido2 = $row['apellido2'];
            $email = $row['email'];
            $fechaNacimiento = $row['fechaNacimiento'];
            $usuario = $row['usuario_id'];
            $clave = $row['clave'];
        }
        if (!isset($nombre)){
            $error = true;
            $sMensajeError = 'Usuario no existente';
        }else {
            $resultadoBusqueda=true;
        }
    } else if ($_POST['validacion']=='actualizar'){
        if ($_POST['clave']= $_POST['confirmacion']){
            $updateUsuario = 'UPDATE usuario SET  clave="'. $_POST['clave'] .'" WHERE usuario_id="'.$_POST['usuario'].'"';
            echo $updateUsuario;
            $updatePersona = 'UPDATE persona SET nombre="'. $_POST['nombre'] .'", apellido1="'. $_POST['apellido1'] .'", apellido2="'. $_POST['apellido2'] .'", dob="'. $_POST['dob'] .'", email="'. $_POST['email'] .'" WHERE cedula="'.$_SESSION['cedulaActualizar'].'"';
            echo $updatePersona;
            ConectorBD::executeQuery($updateUsuario);
            ConectorBD::executeQuery($updatePersona);
            echo '<script>alert("Usuario actualizado satisfactoriamente");</script>';
        } else {
            $bHayError = true;
            $sMensajeError = "Claves no coinciden.";
        }
    }
}
?>
<html>
<head>
    <title>Modify User</title>
</head>
<body>
<header>
    <img src="img/Logo.png" width="7%" height="15%""> Main Page
</header>
<div><?php include('menu.php'); ?></div>
<section>
    <h3>Add User</h3>
    <form method="POST" action="#" name="buscar">
        <table>
            <tr>
                <td>Cedula: <?php if ($error){ echo  "<br>".$sMensajeError; } ?></td>
                <td><input type="text" name="cedula"></td>
                <input type="hidden" name="validacion" value="buscar">
                <td><button type="submit" name="search">Buscar</button></td>
            </tr>
        </table>
    </form>

    <form action="#" method="POST" name="actualizar">
        <input type="hidden" name="validacion" value="actualizar">
        <table>
            <tr>
                <td>Nombre:</td>
                <td><input type="text" name="nombre" <?php if($resultadoBusqueda){ echo 'value="'.$nombre.'""'; } ?> ></td>
            </tr>
            <tr>
                <td>Apellido 1:</td>
                <td><input type="text" name="apellido1" <?php if($resultadoBusqueda){ echo 'value="'.$apellido1.'""'; } ?> ></td>
            </tr>
            <tr>
                <td>Apellido 2:</td>
                <td><input type="text" name="apellido2" <?php if($resultadoBusqueda){ echo 'value="'.$apellido2.'""'; } ?> ></td>
            </tr>
            <tr>
                <td>E-Mail:</td>
                <td><input type="email" name="email" <?php if($resultadoBusqueda){ echo 'value="'.$email.'""'; } ?> ></td>
            </tr>
            <tr>
                <td>Telefono:</td>
                <td><input type="date" name="dob" <?php if($resultadoBusqueda){ echo 'value="'.$fechaNacimiento.'""'; } ?> ></td>
            </tr>
            <tr>
                <td>Usuario:</td>
                <td><input type="text" name="usuario" <?php if($resultadoBusqueda){ echo 'value="'.$usuario.'""'; } ?> ></td>
            </tr>
            <tr>
                <td>Clave temporal:</td>
                <td><input type="password" name="clave" <?php if($resultadoBusqueda){ echo 'value="'.$clave.'""'; } ?> ></td>
            </tr>
            <tr>
                <td>Confirme clave temporal:</td>
                <td><input type="password" name="confirmacion"></td>
            </tr>
            <tr>
                <td><button type="submit" name="update">Actualizar</button></td>
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