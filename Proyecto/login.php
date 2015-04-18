<?php
/**
 * Comparacion de la autenticacion en el formulario
 */
require_once('lib/ConectorBD.php');
require_once('lib/UtilidadesSesion.php');
$bHayError = false;

if ($_POST){ //Verifica que se uso el POST como metodo en el formulario
    //$query = 'SELECT * from usuario where usuario="'.$_POST['username'] . '" and clave="'.$_POST['password'].'"';
    $query = 'SELECT p.cedula, p.nombre, p.apellido1, p.apellido2, p.email, p.dob fechaNacimiento, u.usuario_id, u.clave
FROM persona p
JOIN usuario u ON p.usuario_id = u.usuario_id
where u.usuario_id="'.$_POST['username'] . '" and clave="'.$_POST['password'].'"';
    $arreglo = array();
    $arreglo = ConectorBD::selectQuery($query);

    foreach ($arreglo as $row){
        if ($row['usuario_id'] === $_POST['username']){ //Verifica que el usuario ingresado y en el arreglo sea iguales
            if ($row['clave'] === $_POST['password']){ //Verifica que el password ingresado y en el arreglo sea iguales
                /**
                 * Se guarda la informacion del usuario en variables de session para mantenerlas durante toda la session
                 */
                session_start();
                UtilidadesSesion::guardarEnSesion('nombreUsuario', $row['nombre']);
                UtilidadesSesion::guardarEnSesion('apellido1',$row['apellido1']);
                UtilidadesSesion::guardarEnSesion('apellido2',$row['apellido2']);
                header("location:main.php"); //Redirecciona la pagina hacia otra pagina.
            } else {
                $sMensajeError = "Usuario o clave incorrectas.";
                $bHayError = true;
            }
        } else {
            $sMensajeError = "Usuario o clave incorrectas.";
            $bHayError = true;
        }
    }
}
?>
<style>
    body{
        margin-left: 25%;
        margin-right: 25%;
    }
    section{
        height: 75%;
    }
</style>
<html>
<head>
    <title>Login</title>
    <!--<link type="text/css"; rel="stylesheet"; href="stylesheet.css"/>-->
</head>
<body>
    <header>
        <center><img src="img/Logo.png" width="20%" height="30%""/></center>
    </header>

    <section>
        <center>
            <h1> Formulario</h1>
            <form method='POST' action='#'>
                <table>
                    <tr>
                        <td><label for="username">Usuario: </label></td>
                        <td><input type="text" name="username"><br></td>
                    </tr>
                    <tr>
                        <td><label for="password">Clave: </label></td>
                        <td><input type="password" name="password"><br></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit">Entrar</button></td>
                    </tr>
                    <tr>
                        <td><?php if ($bHayError){ echo $sMensajeError . "<br>"; } ?></td>
                    </tr>
                </table>
            </form>
        </center>
    </section>


    <footer>
        <center>Copyright 2015. Developed by I&D</center>
    </footer>

</body>
</html>