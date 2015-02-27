<?php
session_start();
//var_dump($_SESSION);

require_once("../lib/UtilidadesSesion.php");
require_once("../lib/ConectorDatos.php");
require_once('../lib/Carrito.php');

/**
 * Se verifica la session mediante la clase UtilidadesSesion.php
 */
UtilidadesSesion::revisarSesionActiva();

$oCarrito = new Carrito();
$mensaje='';
$aProductosCarro = $oCarrito->listadoItemesCarrito();

if($_POST){
    if (isset($_POST['Actualizar'])) {
        /**
         * Llama un metodo creado en la clase Carrito que actualiza la cantidad de productos en el
         * arreglo carrito.
         */
        Carrito::actualizarCantidad($_POST['idProducto'],$_POST['nuevaCantidad']);
    } elseif (isset($_POST['Eliminar'])){
        Carrito::eliminarDeCarrito($_POST['idProducto']);
    }elseif (isset($_POST['limpiarCarrito'])){
        Carrito::limpiarCarrito();
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <style>
        div { border: solid 1px grey;padding: 5px;}
    </style>
</head>
<body>
<div id="header">
    Bienvenido <?php echo $_SESSION['nombreCompleto']; ?>
</div>
<div id="menu">
    <a href="productos.php">Productos</a> <a href="carrito.php"> Carrito</a>
</div>
<div>Productos agregados</div>
<div id="productosDeCarrito">
    <hr>
    <table>
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach($aProductosCarro as $aDatosProducto) { //var_dump($aDatosProducto); ?>
            <tr>
                <td><?php echo $aDatosProducto['marca']; ?></td>
                <td><?php echo $aDatosProducto['id'] . ')' . $aDatosProducto['modelo']; ?></td>
                <td><?php echo $aDatosProducto['precio']; ?></td>
                <form  id="actualizarCantidad" action="carrito.php" method="post">
                    <input type="hidden" name="idProducto" value="<?php echo $aDatosProducto['id'] ?>">
                    <td><input type="number" name="nuevaCantidad" min="1" max="100" value="<?php echo $aDatosProducto['cantidad']; ?>"> </td>
                    <td><input type="submit" id="Actualizar" name='Actualizar' value="Actualizar"></td>
                </form>
                <td>
                    <form id="eliminardeCarrito" action="" method="post">
                        <input type="hidden" name="idProducto" value="<?php echo $aDatosProducto['id'] ?>">
                        <td><input type="submit" id="Eliminar" name="Eliminar" value="Eliminar"></td>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <form id="limpiaCarrito"action="carrito.php" method="post">
        <input type="submit" id="limpiarCarrito" name="limpiarCarrito" value="Limpiar Carrito">
    </form>
</div>
</body>
</html>
