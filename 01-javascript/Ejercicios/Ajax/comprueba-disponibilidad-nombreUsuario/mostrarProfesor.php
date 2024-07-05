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

    $stmt = $dbh->prepare("SELECT * FROM profesor WHERE tipo= ?");
    $tipo=$_GET['tipo'];
    $stmt->bindParam(1, $tipo);
    $stmt->execute();


    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo (json_encode($row));


} catch (PDOException $e){
    echo "<script>console.log($e->getMessage())</script>";
}

//cerrar una conexión:
$conn = null;
$dbh = null;