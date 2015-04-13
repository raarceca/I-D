<?php

class ConectorBD {
    private static $host = "localhost";
    private static $port = "3306";
    private static $user = "root";
    private static $password = "hola123";
    private static $dbh;
    private static $db = "CentralRevelados";


    private function abrirConexion() {
        try {
            return $dbh = new PDO('mysql:host=localhost;dbname=CentralRevelados',self::$user, self::$password);
        } catch (PDOException $e){
            print "Error!: " .$e->getMessage() . "<br>";
            die();
        }
    }

    public static function selectQuery($sQuery) {
        try{
            $bdh = self::abrirConexion();
            return $bdh->query($sQuery);
            /*foreach ($bdh->query($sQuery) as $row){
                print_r($row);
                echo "<br>";
            }*/
        }catch (PDOException $e){
            print "Error!: " .$e->getMessage() . "<br>";
            die();
        }
    }
    public static function executeQuery($sQuery) {
        try{
            $array = array();
            $bdh = self::abrirConexion();
            $bdh->query($sQuery);
        }catch (PDOException $e){
            print "Error!: " .$e->getMessage() . "<br>";
            die();
        }
    }
}

