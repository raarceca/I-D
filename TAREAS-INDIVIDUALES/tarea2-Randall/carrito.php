<?php
session_start();
var_dump($_SESSION);
require_once("lib/UtilidadesSesion.php");
require_once("lib/ConectorDatos.php");
require_once("lib/Carrito.php");

//revisamos sesion activa
UtilidadesSesion::revisarSesionActiva();

$oCarrito = new Carrito();

$aProductosCarro = $oCarrito->listadoItemesCarrito();

?>
<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <style>
            div { border: solid 2px darkred;padding: 5px;}
        </style>
    </head>
    <body>
        <div id="header">
            Bienvenido <?php echo $_SESSION['nombreCompleto']; ?>
        </div>
        <div>Productos agregados</div>
        <div id="productosDeCarrito">
            <hr>
            <?php foreach($aProductosCarro as $aDatosProducto) { ?>
                <ul>
                    <li>Producto:<?php echo $aDatosProducto['modelo']; ?></li>
                    <li>Marca:<?php echo $aDatosProducto['marca']; ?></li>
                    <li>Precio:<?php echo $aDatosProducto['precio']; ?></li>
                    <li>Cantidad:<?php echo $aDatosProducto['cantidad']; ?></li>
                    <li>Total:<?php echo $aDatosProducto['precio']*$aDatosProducto['cantidad']; ?></li>
                    <li>
                    <form id="eliminacionProducto" action="productos.php" method="post">
                        <input name="idProductoEliminar" type="hidden" value="<?php echo $aDatosProducto['id']; ?>">
                        <input name="accionEP" type="hidden" value="eliminacionProducto">
                        <input type="submit" value="EliminacionProducto">
                    </form>

                    </li>
                    <li>
                        <form id="modificacionProducto" action="productos.php" method="post">
                            <input name="idProductoModificar" type="hidden" value="<?php echo $aDatosProducto['id']; ?>">
                            <input type="number" name="icantidadNueva" id="icantidadNueva" value="" maxlength="10">
                            <input name="accionModificar" type="hidden" value="modificarCant">
                            <input type="submit" value="Modificar">
                        </form>

                    </li>


                </ul>


            <?php
            }
            ?>
        </div>
        <div id="EliminacionCompleta">

            <form id="eliminarCarrito" action="productos.php" method="post">
                <input name="accionE" type="hidden" value="eliminarCarrito">
                <input type="submit" value="Eliminar Carrito Completo">
            </form>
        </div>
        <div id="backProductos">

            <form id="backProductos" action="productos.php" method="post">
                <input name="abackProductos" type="hidden" value="backProductos">
                <input type="submit" value="ir a Productos">
            </form>
        </div>
    </body>
</html>
