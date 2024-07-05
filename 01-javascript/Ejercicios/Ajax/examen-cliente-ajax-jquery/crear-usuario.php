<?php

    $dominioPermitido = "http://localhost:3000";
    header("Access-Control-Allow-Origin: $dominioPermitido");
    header("Access-Control-Allow-Headers: content-type");
    header("Access-Control-Allow-Methods: OPTIONS,GET,PUT,POST,DELETE");


    $servername = "POAPMYSQL139.dns-servicio.com:3306";
    $database = "8648519_chatMedaac";
    $user = "dbUser";
    $password = "dbPassword";

$idProfesor=$_POST['idProfesor'];
$apellidos=$_POST['apellidos'];
$password=$_POST['password'];
$tipo=$_POST['tipo'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->query("SET NAMES 'UTF8' ");
        $stmt = $conn->prepare("INSERT into profesor (idProfesor, apellidos, password, tipo) VALUES (? , ?, ?, ?)");
        $stmt->bindParam(1, $idProfesor);
        $stmt->bindParam(2, $apellidos);
        $stmt->bindParam(3, $password);
        $stmt->bindParam(4, $tipo);
        $stmt->execute();


        //Verificamos que el insert haya realizado
        if ($stmt){
            //echo '<script>alert("Proceso realizado con EXITO. Usuario añadido a la BD")</script>';
    	    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	    echo (json_encode($row));
            return true;
        }else{
            echo '<script>alert("ERROR. Usuario NO añadido a la BD")</script>';
            return false;            
        }

    } catch (PDOException $e) {
	echo '<script>alert("ERROR. Usuario NO añadido a la BD")</script>';
	echo $e->getMessage();        
    }

    $conn = null;
    //cerrar una conexión:
    $dbh = null;
