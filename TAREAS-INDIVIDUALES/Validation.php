<?php
/**
 * Created by PhpStorm.
 * User: estudiante
 * Date: 23/03/15
 * Time: 06:41 PM
 */

class Validation {

    static $validationErrors;
    /* no lo necesitamos
    function __construct() {

    }
    */

    /**
     * Revisar si el $contenido viene vacío
     * @param $contenido El contenido a validar
     */
    static function noEstaVacio($nombreCampo,$contenido) {
        $contenido = str_replace(" ","",$contenido);
        if(!$contenido || strlen($contenido) === 0){

            return array('resultado'=>false,
                'mensajeError' => "El campo $nombreCampo está vacío",
                'campoDelError' => $nombreCampo
            );

        }
        return true;
    }

    static function esAlfanumerico($nombreCampo,$contenido) {
        if(ctype_alnum($contenido)){
            return true;
        }else{
            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo no es alphanumerico.",
                'campoDelError' => $nombreCampo
            );
        }

    }

    static function tieneXLongitud($nombreCampo,$contenido) {
        $length=0;
        if (!self::noEstaVacio($nombreCampo,$contenido)){
            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo no está vacío.",
                'campoDelError' => $nombreCampo
            );

        }else{
            $length=strlen(utf8_decode($contenido));
            return array('resultado'=>true,
                'mensajeError' => "La longitud de $nombreCampo es $length.",
                'campoDelError' => $nombreCampo
            );
        }


    }

    static function esNumerico($nombreCampo,$contenido) {
        if (!is_numeric($contenido)){
            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo no es numérico.",
                'campoDelError' => $nombreCampo
            );

        }
        return true;
    }

    /**
     * Validando si el email es válido
     * @param $nombreCampo Nombre del campo en el formulario para display
     * @param $contenido  Contenido que ingresamos en el input del formulario
     */
    static function esEmail($nombreCampo,$contenido) {
        $bEsEmail = filter_var($contenido,FILTER_VALIDATE_EMAIL);
        echo 'valor de $bEsEmail ';
        var_dump($bEsEmail);
        if($bEsEmail === false){
            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo es inválido.",
                'campoDelError' => $nombreCampo
            );

        }
        return true;
    }

    static function esSoloAlfa($nombreCampo,$contenido) {
        if (!self::noEstaVacio($nombreCampo,$contenido)){
            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo está vacío.",
                'campoDelError' => $nombreCampo
            );
        }
        if(ctype_alpha($contenido)){
           return true;
        }else{
            return array('resultado'=>false,
                'mensajeError' => "El formato del campo $nombreCampo no es alpha completamente.",
                'campoDelError' => $nombreCampo
            );
        }


    }

}
