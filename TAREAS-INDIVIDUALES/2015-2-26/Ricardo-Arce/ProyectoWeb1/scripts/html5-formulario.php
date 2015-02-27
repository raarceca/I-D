<?php
/**
 * Definicion de variables para las opciones de arreglo.
 */
$sMas = 'Masculino';
$sFem = 'Femenino';
$sInd = "$sMas $sFem";

/**
 * Creacion de arreglo y asignacion de valores
 */
$arrOpciones[0] = 'Masculino';
$arrOpciones = array($sMas, $sFem, $sInd);

/**
 * Mostrar arreglo en pagina
 */
var_dump($arrOpciones);

/**
 * foreach: iterador en cada elemente de un objeto.
 * @param $Opcion se utiliza como controlador del ciclo.
 */
foreach($arrOpciones as $opcion){
    $sPlantilla = '<option value="{opcion}">{opcion}</option>';
        
}

?>