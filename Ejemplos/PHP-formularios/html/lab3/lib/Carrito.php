<?php

class Carrito {

    var $redirectUrl = 'carrito.php';

    function __construct() {
        $this->revisarCarrito();
    }

    function __destruct() {
        //$this->eliminarDeCarrito();

    }

    function agregarACarrito($idProducto,$iProducto=1) {
        $aTempCarrito = $_SESSION['carrito'];

        if(array_key_exists($idProducto,$aTempCarrito)) {
            $aTempCarrito[$idProducto] += $iProducto;
        }else{
            $aTempCarrito[$idProducto] = $iProducto;
        }

        $_SESSION['carrito'] = $aTempCarrito;
        header("Location: $this->redirectUrl");
    }

    function eliminarDeCarrito() {
        $_SESSION['carrito']=array();
        header("Location: $this->redirectUrl");

    }

    function eliminarProducto($idProducto) {
        $aTempCarrito = $_SESSION['carrito'];
        unset($aTempCarrito[$idProducto]);

        $_SESSION['carrito'] = $aTempCarrito;
        header("Location: $this->redirectUrl");
    }

    function modificarProducto($idProductoModificar,$icantidadNueva) {
        $aTempCarrito = $_SESSION['carrito'];

        $aTempCarrito[$idProductoModificar]=$icantidadNueva;

        $_SESSION['carrito'] = $aTempCarrito;
        header("Location: $this->redirectUrl");
    }

    /**
     * Retorna itemes de carro en el SESSION
     * @return array Itemes carro
     *
     */
    function listadoItemesCarrito() {
        $aCarrito = $_SESSION['carrito'];
        // id, modelo, marca, precio
        $aItemesCarro = array();

        //construye itemes de carro
        foreach($aCarrito as $idModeloTelefono => $sCantidadModelo) {
            $aProducto = ConectorDatos::buscarProductoEspecifico($idModeloTelefono);
            $aProducto['cantidad'] = $sCantidadModelo;
            $aItemesCarro[] = $aProducto;
        }

        return $aItemesCarro;

    }

    function revisarCarrito() {
        if(array_key_exists('carrito',$_SESSION) === false){
            $_SESSION['carrito']=array();
        }
    }
}
?>