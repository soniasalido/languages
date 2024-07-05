<?php


 //CONECTAR A UNA BD CON PDO
 $servername = "POAPMYSQL139.dns-servicio.com:3306";
 $dbname = "dbName";
 $user = "dbUser";
 $password = "dbPassword";



// Conexión Con el método PDO::setAtrtribute
try {
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
    $dbh = new PDO($dsn, $user, $password);
    $dbh->query("SET NAMES 'UTF8' ");

    //Manejo de Excepciones y Opciones con PDO
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



    //*********************************************************************************************
    // FETCH_ASSOC: devuelve un array indexado cuyos keys son el nombre de las columnas.
    $stmt = $dbh->prepare("SELECT * FROM usuario");
    // Especificamos el fetch mode antes de llamar a fetch()
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // Ejecutamos
    $stmt->execute();


    // FORMA 1:  Mostramos los resultados en php
    /*
    while ($row = $stmt->fetch()){
        echo "idUsuario: {$row["idUsuario"]} <br>";
        echo "nombre: {$row["nombre"]} <br><br>";
        echo "apellidos: {$row["apellidos"]} <br><br>";
        echo "telefono: {$row["telefono"]} <br><br>";
        echo "password: {$row["password"]} <br><br>";
    }
    */


    // FORMA 2: Mostramos los resultados en php
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo (json_encode($row));


} catch (PDOException $e){
    echo $e->getMessage();
}


//cerrar una conexión:
$conn = null;
$dbh = null;