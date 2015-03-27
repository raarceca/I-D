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
                'mensajeError' => "El campo $nombreCampo está vacío.",
                'campoDelError' => $nombreCampo
            );
        }
        return true;
    }
		 
	/**	 	
	 * Valida que una opción del dropdown sea seleccionada
	 * @param $nombreCampo Nombre del campo en el formulario para display
     * @param $contenido Contenido que ingresamos en el input del formulario
	 */
	static function validaDropDown($nombreCampo,$contenido){
    	if($contenido == -1){
        	return array('resultado'=>false,
                         'mensajeError'=> "El campo $nombreCampo está sin seleccionar.",
                         'campoDelError'=> $nombreCampo);
        } 
        else {
        	return true;
        }
    }
	
	/**	 	
	 * Valida que  el campo evaluado contenga sólo texto
	 * @param $nombreCampo Nombre del campo en el formulario para display
     * @param $contenido Contenido que ingresamos en el input del formulario
	 */
	static function validaTexto($nombreCampo,$contenido) {
		if (!preg_match("/^[a-zA-Z ]*$/",$contenido)) {
        	return array('resultado'=>false,
            		     'mensajeError' => "El campo $nombreCampo no permite numeros o caracteres especiales.",
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
}