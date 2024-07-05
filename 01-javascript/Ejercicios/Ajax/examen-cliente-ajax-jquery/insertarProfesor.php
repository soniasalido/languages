<?php

$dominioPermitido = "https://niguelas.org";
header("Access-Control-Allow-Origin: $dominioPermitido");
header("Access-Control-Allow-Headers: content-type");
header("Access-Control-Allow-Methods: OPTIONS,GET,PUT,POST,DELETE");




 //CONECTAR A UNA BD CON PDO
 $servername = "POAPMYSQL139.dns-servicio.com:3306";
 $dbname = "dbName";
 $user = "dbUser";
 $password = "dbPassword";

try {
    $idProfesor=$_POST['idProfesor'];
    $password=$_POST['password'];
    $tipo=$_POST['tipo'];
    $sede=$_POST['sede'];
    $sedeExamen=$_POST['sedeExamen'];

    $con = new PDO ("mysql:host=$servername; dbname=$dbname",
                          $username, $passwordBD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->query("SET NAMES 'UTF8' ");
    $stmt = $con->prepare("INSERT into profesor (idProfesor, password, tipo, sede, sedeExamen) VALUES (? , ?, ?, ?, ?)");
    $stmt->bindParam(1, $idProfesor);
    $stmt->bindParam(2, $password);
    $stmt->bindParam(3, $tipo);
    $stmt->bindParam(4, $sede);
    $stmt->bindParam(5, $sedeExamen);
    $stmt->execute();

//    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    echo (json_encode($row));

    if ($stmt->execute()==true){
        $result = true;
        echo "<script>alert('OK')</script>";
    }else{
        echo "<script>alert('ERROR')</script>";
        $result = false;
    }

} catch (PDOException $e){
    echo $e->getMessage();
}

echo $result;

//cerrar una conexión:
$conn = null;
$dbh = null;