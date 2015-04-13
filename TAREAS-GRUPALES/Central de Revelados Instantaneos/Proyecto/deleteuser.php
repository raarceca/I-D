<?php
session_start();
require_once('lib/ConectorBD.php');
$bHayError = false;

if (isset($_SESSION['apellido1']) == false){
    header("location:login.php"); //Redirecciona la pagina hacia otra pagina.
}
//123456789
if ($_POST){

    $queryBusquedaUsuarioID = 'SELECT * from persona where cedula="'. $_POST['cedula'] .'"';
    $usuarioPersona = ConectorBD::selectQuery($queryBusquedaUsuarioID);

    foreach ($usuarioPersona as $row){
        $usuario = $row['usuario_id'];
    }
    if (isset($usuario)){
        $queryUsuario = 'DELETE FROM usuario where usuario_id="'.$usuario.'"';
        $queryPersona = 'DELETE FROM persona WHERE cedula="'.$_POST['cedula'].'"';
        ConectorBD::executeQuery($queryPersona);
        ConectorBD::executeQuery($queryUsuario);
        echo '<script>alert("Usuario eliminado satisfactoriamente");</script>';
    } else {
        $sMensajeError = 'Usuario no existente';
        $bHayError = true;
    }
}
?>
<html>
<head>
    <title>Delete User</title>
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
                <td>Cedula:<?php if ($bHayError){ echo "<br>" . $sMensajeError; } ?></td>
                <td><input type="text" name="cedula" id="cedula"></td>
                <td><button type="submit" name="delete">Delete</button></td>
            </tr>
        </table>
    </form>
</section>
<footer>
    <center>Copyright 2015. Developed by I&D</center>
</footer>
</body>
</html>