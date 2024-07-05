<?php

 //CONECTAR A UNA BD CON PDO
 $servername = "POAPMYSQL139.dns-servicio.com:3306";
 $dbname = "dbName";
 $user = "dbUser";
 $password = "dbPassword";


 try {
   $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8";
   $dbh = new PDO($dsn, $user, $password);
   $dbh->query("SET NAMES 'UTF8' ");
   $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $stmt = $dbh->prepare("SELECT * FROM tbl_personal");
   $stmt->setFetchMode(PDO::FETCH_ASSOC);

   //Recogemos el parámetro enviado con ajax y lo asociamos a la consulta mysql
   $idUsuario=$_GET['idUsuario'];
   $stmt->bindParam(1, $idUsuario);
   $stmt->execute();

    if($stmt->execute()) {
        // Ciclo PDO que sera en encargado de mostrar los registros de la BD
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

 } catch (PDOException $e){
    echo $e->getMessage();
 }


 //cerrar una conexión:
 $conn = null;
 $dbh = null;