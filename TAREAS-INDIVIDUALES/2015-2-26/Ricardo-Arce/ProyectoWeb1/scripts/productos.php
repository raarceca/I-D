<?php
/**
 * Session management practice.
 * Start the session on the web browser and server.
 */
session_start();
//Se invocan las clases dentro de lib
require_once("../lib/UtilidadesSesion.php");
require_once("../lib/ConectorDatos.php");
require_once("../lib/Carrito.php");
/**
 * Se verifica la session mediante la clase UtilidadesSesion.php
 */
UtilidadesSesion::revisarSesionActiva();
$aTelefonos = ConectorDatos::buscarProductos();

/**
 * Se crea el carrito
 */
$oCarrito = new Carrito();
if($_POST) {
    if($_POST['accion'] === 'agregar') {
        $oCarrito->agregarACarrito($_POST['idProductoXAgregar']);
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
<div id="productos">
    <table>
        <tr>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Precio</th>
            <th></th>
        </tr>
        <?php
        foreach($aTelefonos as $sMarca=>$aProductosMarca) {
            echo "<tr>";
            foreach($aProductosMarca as $sIdProducto=>$aDatosProducto) {
                ?>
                <td><?php echo $sMarca; ?></td>
                <td><?php echo $aDatosProducto['modelo']; ?></td>
                <td><?php echo $aDatosProducto['precio']; ?></td>
                <td>
                    <form id="agregarProducto-<?php echo $sIdProducto; ?>" action="productos.php" method="post">
                        <input name="idProductoXAgregar" type="hidden" value="<?php echo $sIdProducto; ?>">
                        <input name="accion" type="hidden" value="agregar">
                        <input type="submit" value="Agregar a Carrito">
                    </form>
                </td>
                </tr>
            <?php
            }
        }
        ?>
    </table>
</div>
</body>
</html>