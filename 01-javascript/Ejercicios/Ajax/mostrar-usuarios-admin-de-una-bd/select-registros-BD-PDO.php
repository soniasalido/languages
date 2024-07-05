<?php


//**************************************************************************
//DA ERROR AL MOSTRAR EL CAMPO DE COORDENADA. HAY ALGUN TIPO DE INCOMPATIBILIDAD CON JSON



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
    $stmt = $dbh->prepare("SELECT * FROM  administrador");
    // Especificamos el fetch mode antes de llamar a fetch()
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // Ejecutamos
    $stmt->execute();



    /*
    // FORMA 1:  Mostramos los resultados en php
    while ($row = $stmt->fetch()){
        echo "idUsuario: {$row["idRegistro"]} <br>";
        echo "nombre: {$row["idUsuario"]} <br><br>";
        echo "apellidos: {$row["fecha"]} <br><br>";
        echo "telefono: {$row["modificacionTimestamp"]} <br><br>";
        echo "password: {$row["registroTimestamp"]} <br><br>";
        echo "password: {$row["horaRegistro"]} <br><br>";
        echo "password: {$row["coordenadasRegistro"]} <br><br>";
        echo "password: {$row["nota"]} <br><br>";
        echo "password: {$row["tipoRegistro"]} <br><br>";
    }
    */


    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // FORMA 2: Mostramos los resultados en php


    echo json_encode($row);


} catch (PDOException $e){
    echo $e->getMessage();
}


//cerrar una conexión:
$conn = null;
$dbh = null;