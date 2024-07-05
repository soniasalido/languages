<?php


 //CONECTAR A UNA BD CON PDO
 $servername = "POAPMYSQL139.dns-servicio.com:3306";
 $dbname = "dbName";
 $user = "dbUser";
 $password = "dbPassword";


// Conexión Con un array de opciones
try {
    $dsn = "mysql:host=$servername;dbname=$dbname";

    //El modo de error se puede aplicar con el método PDO::setAttribute o mediante un array de opciones al instanciar PDO:
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    $dbh = new PDO($dsn, $user, $password);

    //Manejo de Excepciones y Opciones con PDO
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //EJECUCIÓN DE SENTENCIAS: PREPARE -> [BIND] -> EXECUTE
    // PREPARE
    $stmt = $dbh->prepare("INSERT INTO usuario VALUES (?, ?, ?, ?, ?)");

    // BIND
    $idUsuario = "sonianiwe";
    $nombre = "Sonia";
    $apellidos = "Salido";
    $telefono = "667642660";
    $passwordUsuario = "sonia";
    $stmt->bindParam(1, $idUsuario);
    $stmt->bindParam(2, $nombre);
    $stmt->bindParam(3, $apellidos);
    $stmt->bindParam(4, $telefono);
    $stmt->bindParam(5, $passwordUsuario);

    // EXECUTE
    $stmt->execute();



    //Transacciones con PDO --> PDO::beginTransaction()
    /*
     * Cuando tenemos que ejecutar varias sentencias de vez, como INSERT, es preferible utilizar transacciones ya que
     * agrupa todas las acciones y permite revertirlas todas en caso de que haya algún error.

    try {
    $dbh->beginTransaction();
    $dbh->query("INSERT INTO Clientes (nombre, ciudad) VALUES ('Leila Birdsall', 'Madrid')");
    $dbh->query("INSERT INTO Clientes (nombre, ciudad) VALUES ('Brice Osterberg', 'Teruel')");
    $dbh->query("INSERT INTO Clientes (nombre, ciudad) VALUES ('Latrisha Wagar', 'Valencia')");
    $dbh->query("INSERT INTO Clientes (nombre, ciudad) VALUES ('Hui Riojas', 'Madrid')");
    $dbh->query("INSERT INTO Clientes (nombre, ciudad) VALUES ('Frank Scarpa', 'Barcelona')");
    $dbh->commit();
    echo "Se han introducido los nuevos clientes";
    } catch (Exception $e){
        echo "Ha habido algún error";
        $dbh->rollback();
    }
     */



} catch (PDOException $e){
    echo $e->getMessage();
}


$dbh = null;