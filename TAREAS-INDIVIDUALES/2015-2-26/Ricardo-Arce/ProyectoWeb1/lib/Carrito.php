<?php
/**
 * Created by Ricardo Arce Campos.
 * Date: 16/02/15
 * Time: 07:21 PM
 */

class Carrito {

    var $redirectURL = '../scripts/carrito.php';

    function __construct(){
        $this->revisarCarrito();
    }

    function __destruct(){

    }

    /**
     * Limpia el contenido completo del arreglo de carrito.
     */
    function limpiarCarrito(){
        $_SESSION['carrito']=array();
        header("Location:../scripts/carrito.php");
    }
    /**
     * Funcion para agregar productos al carrito.
     * @param $idProducto, almacena el id del productoa guardar al carrito
     * @param int $iProducto, guarda la cantidad de items
     */
    function agregarACarrito($idProducto,$iProducto=1) {
        $aTempCarrito = $_SESSION['carrito'];

        /**
         * Verifica si dentro del arreglo ya existe el producto.
         * Si existe, incrementa, sino lo agrega
         */
        if(array_key_exists($idProducto,$aTempCarrito)) {
            $aTempCarrito[$idProducto] += $iProducto;
        }else{
            $aTempCarrito[$idProducto] = $iProducto;
        }

        $_SESSION['carrito'] = $aTempCarrito;
        header("Location:$this->redirectURL");
    }

    /**
     * Elimina un producto en especifico del carrito
     * @param $idProducto ID del producto que se desea eliminar del arreglo del carrito
     */
    function eliminarDeCarrito($idProducto) {
        $aTempCarrito = $_SESSION['carrito'];

        /**
         * Verifica si dentro del arreglo ya existe el producto.
         * Si existe, incrementa, sino lo agrega
         */
        if(array_key_exists($idProducto,$aTempCarrito)) {
            unset($aTempCarrito[$idProducto]);
        }

        $_SESSION['carrito'] = $aTempCarrito;
        header("Location:../scripts/carrito.php");
    }

    /**
     * Retorna itemes de carro en el SESSION
     * @return array Itemes carro
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

    /**
     * revisa si existe la variable session llamada carrito y si no existe, crea una de tipo arreglo.
     */
    function revisarCarrito() {
        if(array_key_exists('carrito',$_SESSION) === false){
            $_SESSION['carrito']=array();
        }
    }

    /**
     * Actualiza la cantidad de items de un mismo producto y actualiza el registrp en el arreglo carrito
     * @param $idProducto Se obtiene el id del producto que se desea actualizar
     * @param $nuevaCantidad se necesita la nueva cantidad del producto
     */
    function actualizarCantidad ($idProducto, $nuevaCantidad){
        $aTempCarrito = $_SESSION['carrito'];
        if(array_key_exists($idProducto,$aTempCarrito)) {
            $aTempCarrito[$idProducto] = $nuevaCantidad;
        }

        $_SESSION['carrito'] = $aTempCarrito;
        header("Location:../scripts/carrito.php");
    }

}

?>