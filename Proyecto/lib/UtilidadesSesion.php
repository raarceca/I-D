<?php

class UtilidadesSesion {
    /**
     * Verifica que en la variable de session exista un valor (que haya un usuario logueado),
     * sino lo redirecciona a la pagina anterior con un mensaje de error.
     */
    static function revisarSesionActiva (){
        if (array_key_exists('nombreCompleto', $_SESSION) === false){
            header('Location: formulario-sesiones.php?nosession=1'); //Redirecciona la pagina hacia la pagina anterior.
        }
    }

    /**
     * @param $sLlave Almacena el nombre de la variable de session.
     * @param $sValor Almacena el valor de la variable de session.
     */
    static function guardarEnSesion ($sLlave, $sValor){
        $_SESSION[$sLlave] = $sValor;
    }

    static function eliminarSesion(){
        session_close();
    }
}

?>