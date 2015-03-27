<?php
require_once("lib/Validation.php");
if($_POST) {
    $arrErrores = array();
    var_dump($_POST);
    
    $valNombre = Validation::noEstaVacio("Nombre",$_POST['nombre']);
    if(is_array($valNombre)){
        $arrErrores[] = $valNombre['mensajeError'];
    }
	# Valida que el campo Nombre contenga sólo texto
    else {
    	$valTexto = Validation::validaTexto("Nombre",$_POST['nombre']);
        if(is_array($valTexto)){
            $arrErrores[] = $valTexto['mensajeError'];
        }
    }

    $valEmail = Validation::noEstaVacio("Email", $_POST['email']);
    if(is_array($valEmail)) {
        $arrErrores[] = $valEmail['mensajeError'];
    }else {
        $valEmailFormato = Validation::esEmail("Email", $_POST['email']);
        if(is_array($valEmailFormato)) {
            $arrErrores[] = $valEmailFormato['mensajeError'];
        }
    }
	
	# Valida que el campo Apellido1 no esté vacío
	$valApellido1 = Validation::noEstaVacio("Apellido1",$_POST['apellido1']);
    if(is_array($valApellido1)){
        $arrErrores[] = $valApellido1['mensajeError'];
    }
    # Valida que el campo Apellido1 contenga sólo texto
    else {
    	$valTexto = Validation::validaTexto("Apellido1",$_POST['apellido1']);
        if(is_array($valTexto)){
            $arrErrores[] = $valTexto['mensajeError'];
        }
    }    

	# Valida que el campo Apellido2 no esté vacío
	$valApellido2 = Validation::noEstaVacio("Apellido2",$_POST['apellido2']);
    if(is_array($valApellido2)){
        $arrErrores[] = $valApellido2['mensajeError'];
    }
	# Valida que el campo Apellido2 contenga sólo texto
	else {
    	$valTexto = Validation::validaTexto("Apellido2",$_POST['apellido2']);
        if(is_array($valTexto)){
            $arrErrores[] = $valTexto['mensajeError'];
        }
    }    

    # Valida que el campo Dirección no esté vacío
	$valDireccion = Validation::noEstaVacio("Direccion",$_POST['direccion']);
    if(is_array($valDireccion)){
        $arrErrores[] = $valDireccion['mensajeError'];
    }
	
	# Valida que el campo Género no esté sin seleccionar
	$valGenero = Validation::validaDropDown("Género",$_POST['genero']);
    if(is_array($valGenero)){
    	$arrErrores[] = $valGenero['mensajeError'];
    }
	
	# Valida que el campo Estado civil no esté sin seleccionar
	$valEstadoCivil = Validation::validaDropDown("Estado civil",$_POST['estadoCivil']);
    if(is_array($valEstadoCivil)){
    	$arrErrores[] = $valEstadoCivil['mensajeError'];
    }	
}

?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    	<div>Ejemplos de validacion</div>
        <div>*Todos los campos son requeridos</div>
        <form name="frmCedula" method="post" action="index.php" >
            <ul>
                <li><label>Nombre: </label> <input type="text" name="nombre"></li>
                <li><label>Apellido1: </label> <input type="text" name="apellido1"></li>
                <li><label>Apellido2: </label> <input type="text" name="apellido2"></li>
                <li><label>Email: </label> <input type="text" name="email"></li>
                <li>
                    <label>Género: </label>
                    <select name="genero">
                        <option value="-1">Seleccionar Uno...</option>
                        <option value="mas">Masculino</option>
                        <option value="fem">Femenino</option>
                    </select>
                    <br/>
                    <br/>
                    <br/>
                </li>
                <li><label>Dirección: </label> <input type="text" name="direccion"></li>                
                <li>
                    <label>Estado civil: </label>
                    <select name="estadoCivil">
                        <option value="-1">Seleccionar Uno...</option>
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                        <option value="viudo">Viudo</option>
                        <option value="unionLibre">Union Libre</option>
                    </select>
                    <br/>
                    <br/>
                    <br/>
                </li>
                <li><input type="submit" value="Enviar Datos"></li>
                <?php if($_POST) { ?>
                <li>

                    <ul class="mensajeError">
                        <?php
                            if(sizeof($arrErrores) > 0){
                                foreach($arrErrores as $strError) {
                                    echo("<li>$strError</li>");
                                }
                            }
                        ?>
                    </ul>

                </li>
                <?php } ?>
            </ul>

        </form>

    </body>
</html>