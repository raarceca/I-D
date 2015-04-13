<?php
/**
 * Comparacion de la autenticacion en el formulario
 */
require_once('lib/ConectorBD.php');

$query = 'SELECT * from persona where cedula="123"';


$arreglo = ConectorBD::selectQuery($query);

foreach ($arreglo as $row){
    print_r($row);
    if ($row['usuario_id']=='riarce'){
        echo 'Usuarios coinciden';
    }
    echo "<br>";
}
?>