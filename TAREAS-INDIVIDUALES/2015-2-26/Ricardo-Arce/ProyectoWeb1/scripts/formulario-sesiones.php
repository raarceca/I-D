<?php
/**
 * Session management practice.
 * Start the session on the web browser and server.
 */
session_start();
/**
 * $bHayError: Se define una variable para control de errores.
 * $sMensajeError: Almacena los mensajes de error del sitio.
 */
$bHayError = false;
//Se invoca a la clase UtilidadesSesion
require_once("../lib/UtilidadesSesion.php");
/**
 * Se crea un arreglo estatico para verificar la autenticacion en el formulario
 */
$arrAuth = array(
    "user" => "cperez",
    "password" => "cperez",
    "nombreCompleto" => "Carlos Perez",
    "edad" => 30
);

if(array_key_exists('nosession', $_GET)){
    $bHayError = true;
    $sMensajeError = '<br> Usuario necesita autenticacion.';
}

/**
 * Comparacion de la autenticacion en el formulario
 */
if ($_POST){ //Verifica que se uso el POST como metodo en el formulario
    if ($arrAuth['user'] === $_POST['username']){ //Verifica que el usuario ingresado y en el arreglo sea iguales
        if ($arrAuth['password'] === $_POST['password']){ //Verifica que el password ingresado y en el arreglo sea iguales
            /**
             * Se guarda la informacion del usuario en variables de session para mantenerlas durante toda la session
             */
            UtilidadesSesion::guardarEnSesion('nombreCompleto', $arrAuth['nombreCompleto']);
            UtilidadesSesion::guardarEnSesion('edad', $arrAuth['edad']);
            header("location:productos.php"); //Redirecciona la pagina hacia otra pagina.
        } else {
            $sMensajeError = "Usuario o clave incorrectas.";
            $bHayError = true;
        }
    } else {
        $sMensajeError = "Usuario o clave incorrectas.";
        $bHayError = true;
    }
}

/**
 * Conditions to identify the form method and show results.
 */
/*
if($_POST){
    var_dump($_POST);
} elseif ($_GET){
    var_dump ($_GET);
} elseif ($_REQUEST){
    var_dump ($_REQUEST);
}*/

?>
<html>
<head>
    <title>Formulario con Sesiones y autenticacion</title>
</head>
<body>
    <h1> Formulario</h1>
    <form method='POST' action='#'>
        <label for="username">Username: </label> <input type="text" name="username"><br>
        <label for="password">Password: </label> <input type="password" name="password"><br>
        <?php if ($bHayError){ echo $sMensajeError . "<br>"; } ?>
        <button type="submit">Login</button>
    </form>
</body>
</html>