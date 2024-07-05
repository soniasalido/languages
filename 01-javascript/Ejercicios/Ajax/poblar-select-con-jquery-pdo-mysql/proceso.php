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

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $dbh->prepare("SELECT nombre FROM profesor");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();

    $row = $stmt->fetchAll();
    $response = array();

    foreach($row as $user){
        $response[] = array(
            "idProfesor" => $user['idProfesor'],
            "nombre" => $user['nombre'],
            "apellidos" => $user['apellidos'],
            "telefono" => $user['telefono'],
            "password" => $user['password'],
            "tipo" => $user['tipo'],
        );
    }

    echo json_encode($response);
    exit();

} catch (PDOException $e){
    echo $e->getMessage();
}

