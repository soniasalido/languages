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
    $stmt = $dbh->prepare("SELECT * FROM usuario WHERE idUsuario= ?");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    //Recogemos el parámetro enviado con ajax y lo asociamos a la consulta mysql
    $idUsuario=$_GET['idUsuario'];
    $stmt->bindParam(1, $idUsuario);
    $stmt->execute();



    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo (json_encode($row));

    } catch (PDOException $e){
    echo $e->getMessage();
    }


    //cerrar una conexión:
    $conn = null;
    $dbh = null;