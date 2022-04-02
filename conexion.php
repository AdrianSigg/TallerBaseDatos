<?php
//Se pasa el nombre del servidor
$nombreServer = 'DESKTOP-L4BS0N0\SQLEXPRESS';
//Se crea un arreglo con la informacion del nombre de la base de datos, su usario y contraseña
$infoDeConexion = array("Database" => "Residencias", "UID"=>"docente","PWD"=>"1234");
$conexion = sqlsrv_connect($nombreServer, $infoDeConexion);
//Se crea variable para guardar la consulta
$sql = "";

    //Funcion para validar si la conexion fue exitosa
    function validacion($conexion,$infoDeConexion){
        //Si existe conexion devuelve true
        if ($conexion) {
          return true;
        //De otro modo devuelve false
        } else {
          die('No se pudo conectar a la base de datos, revise las credenciales');
          return false;
        }
    }
    
    //Funcion para realizar una consulta
    function consulta($conexion){
        global $sql; 
        //Se asigna a la variable la consulta
        $sql= "SELECT * FROM alumno";
        //Se crea la query
        $stmt = sqlsrv_query($conexion, $sql);
        return $stmt;
    }
?>