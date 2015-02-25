<?php
session_start();
//var_dump($_SESSION);
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorDatos.php");
require_once("lib/Carrito.php");

//revisamos sesion activa
UtilidadesSesion::revisarSesionActiva();
$aTelefonos = ConectorDatos::buscarProductos();

//creamos el carrito
$oCarrito = new Carrito();
if($_POST) {
    if($_POST['accion'] === 'agregar') {
        $oCarrito->agregarACarrito($_POST['idProductoXAgregar']);
    }
}
if($_POST) {
    if($_POST['accionE'] === 'eliminarCarrito') {
        $oCarrito->eliminarDeCarrito();

    }
}
if($_POST) {
    if($_POST['accionEP'] === 'eliminacionProducto') {
        $oCarrito->eliminarProducto($_POST['idProductoEliminar']);
    }
}
if($_POST) {
    if($_POST['accionModificar'] === 'modificarCant') {
        $oCarrito->modificarProducto($_POST['idProductoModificar'],$_POST['icantidadNueva']);
    }
}
?>
<!DOCTYPE html>

<html>
    <head lang="en">
        <meta charset="UTF-8">
        <style>
            div { border: solid 2px dodgerblue;padding: 5px;}
        </style>
    </head>
    <body>
    <div id="header">
        Bienvenido <?php echo $_SESSION['nombreCompleto']; ?>
    </div>
    <div id="Busqueda">
    <form id="buscarProducto" action="productos.php" method="post">

        <li>
            <label for="idProductoBuscado">Digite el nombre del producto: </label>
            <br>
            <input name="accionB" type="hidden" value="buscar">
            <input type="text" name="idProductoBuscado" id="idProductoBuscado" value="" maxlength="30">
        </li>
        <input type="submit" value="Buscar">
    </form>
    </div>

    <div id="Busqueda">
        <form id="Resultado" action="productos.php" method="post">

            <li>
                <?php
                if($_POST) {
                    if($_POST['accionB'] === 'buscar') {
                        $ainfoPB=ConectorDatos::buscarProductoPorNombreModelo($_POST['idProductoBuscado']);
                        echo "***** ID ".$ainfoPB['id']." Marca: ".$ainfoPB['marca']. "  Modelo: ".$ainfoPB['modelo']."  Precio: ".$ainfoPB['precio']."*****";
                        //.$_POST['idProductoBuscado'];


                    }
                }

                ?>
            </li>

        </form>
    </div>
        <div id="productos">
            <?php
                foreach($aTelefonos as $sMarca=>$aProductosMarca) {
                    foreach($aProductosMarca as $sIdProducto=>$aDatosProducto) {
                    ?>
                    <ul class="telefonoEspecifico">
                        <li>Marca:<?php echo $sMarca; ?></li>
                        <li>Modelo: <?php echo $aDatosProducto['modelo']; ?></li>
                        <li>Precio: <?php echo $aDatosProducto['precio']; ?></li>
                        <li>
                            <form id="agregarProducto-<?php echo $sIdProducto; ?>" action="productos.php" method="post">
                                <input name="idProductoXAgregar" type="hidden" value="<?php echo $sIdProducto; ?>">
                                <input name="accion" type="hidden" value="agregar">
                                <input type="submit" value="Agregar a Carrito">
                            </form>

                        </li>
                    </ul>
                <?php
                    }
                }
            ?>
        </div>

    </body>
</html>