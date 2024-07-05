<?php


 //CONECTAR A UNA BD CON PDO
 $servername = "POAPMYSQL139.dns-servicio.com:3306";
 $dbname = "dbName";
 $user = "dbUser";
 $password = "dbPassword";



// Conexión Con el método PDO::setAtrtribute
try {
    $dsn = "mysql:host=$servername;dbname=$dbname";
    $dbh = new PDO($dsn, $user, $password);

    //Manejo de Excepciones y Opciones con PDO
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    //*********************************************************************************************
    // FETCH_ASSOC: devuelve un array indexado cuyos keys son el nombre de las columnas.
    echo "FETCH_ASSOC ---->";
    $stmt = $dbh->prepare("SELECT * FROM usuario");
    // Especificamos el fetch mode antes de llamar a fetch()
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    // Ejecutamos
    $stmt->execute();
    // Mostramos los resultados
    while ($row = $stmt->fetch()){
        echo "idUsuario: {$row["idUsuario"]} <br>";
        echo "nombre: {$row["nombre"]} <br><br>";
        echo "apellidos: {$row["apellidos"]} <br><br>";
        echo "telefono: {$row["telefono"]} <br><br>";
        echo "password: {$row["password"]} <br><br>";
    }


    //*********************************************************************************************
    // FETCH_OBJ: devuelve un objeto anónimo con nombres de propiedades que corresponden a las columnas.
    echo "FETCH_OBJ ---->";
    $stmt = $dbh->prepare("SELECT * FROM registro");
    // Ejecutamos
    $stmt->execute();
    // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
        echo "idRegistro: " . $row->idRegistro . "<br>";
        echo "idUsuario: " . $row->idUsuario . "<br>";
        echo "Fecha: " . $row->fecha . "<br>";
        echo "Modificación: " . $row->modificacionTimestamp . "<br>";
        echo "Registro: " . $row->registroTimestamp . "<br>";
        echo "Hora: " . $row->horaRegistro . "<br>";
        echo "Coordenadas: " . $row->coordenadasRegistro . "<br>";
        echo "Notas: " . $row->nota . "<br>";
        echo "Tipo de Registro: " . $row->tipoRegistro . "<br>";
    }


    //*********************************************************************************************
    // FETCH_BOUND: Asigna los valores de las columnas a las variables establecidas con el método PDOStatement::bindColumn
    // Preparamos
    echo "FETCH_BOUND ---->";
    $stmt = $dbh->prepare("SELECT idUsuario, nombre FROM usuario");
    // Ejecutamos
    $stmt->execute();
    // bindColumn
    $stmt->bindColumn(1, $idUsuario);
    $stmt->bindColumn('nombre', $nombre);
    while ($row = $stmt->fetch(PDO::FETCH_BOUND)) {
        $cliente = "IdUsuario: " . $idUsuario . " - Nombre: " . $nombre;
        echo $cliente . "<br>";
    }


    //*********************************************************************************************
    // FETCHALL(): devuelve un array con todas las filas devueltas por la base de datos con las que poder iterar.
    // fetchAll() con PDO::FETCH_ASSOC
    echo "FETCHALL() con PDO::FETCH_ASSOC ---->";
    $stmt = $dbh->prepare("SELECT * FROM usuario");
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($usuarios as $usuario){
        echo $usuario['idUsuario'] . "<br>";
        echo $usuario['nombre'] . "<br>";
        echo $usuario['apellidos'] . "<br>";
        echo $usuario['telefono'] . "<br>";
        echo $usuario['password'] . "<br>";
    }

    // fetchAll() con PDO::FETCH_OBJ
    echo "FETCHALL() con con PDO::FETCH_OBJ ---->";
    $stmt = $dbh->prepare("SELECT * FROM usuario");
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_OBJ);
    foreach ($usuarios as $usuario){
        echo $usuario -> idUsuario . "<br>";
        echo $usuario -> nombre . "<br>";
        echo $usuario -> apellidos . "<br>";
        echo $usuario -> telefono . "<br>";
        echo $usuario -> password . "<br>";
    }


    //*********************************************************************************************
    // PDOStatement::fetchColumn(). Devuelve una única columna de la siguiente fila de un conjunto de resultados.
    // La columna se indica con un integer, empezando desde cero. Si no se proporciona valor, obtiene la primera columna.
    echo "PDOStatement::fetchColumn()  ---->";
    $stmt = $dbh->prepare("SELECT * FROM usuario");
    $stmt->execute();
    while ($row = $stmt->fetchColumn(2)){
        echo "Apellidos: $row <br>";
    }



    //*********************************************************************************************
    // PDOStatement::rowCount(). Devuelve el número de filas afectadas por la última sentencia SQL:
    echo "PDOStatement::rowCount()  ---->";
    $stmt = $dbh->prepare("SELECT * FROM registro");
    $stmt->execute();
    echo $stmt->rowCount();



    //*********************************************************************************************
    // FETCH_CLASS: asigna los valores de las columnas a propiedades de una clase. Creará las propiedades si éstas no existen.
    /* Las propiedades del objeto se establecen ANTES de llamar al constructor. Si hay nombres de columnas que no tienen una
    propiedad creada para cada una, se crean como public. Si los datos necesitan una transformación antes de que salgan
    de la base de datos, se puede hacer automáticamente cada vez que se crea un objeto:
    */

    class Usuarios
    {
        public $idUsuario;
        public $nombre;
        public $apellidos;
        public $telefono;
        public $password;
        public function __construct($otros = ''){
            $this->idUsuario = strtoupper($this->idUsuario);
            $this->nombre = strtoupper($this->nombre);
            $this->apellidos = mb_substr($this->apellidos, 0, 10);
            $this->telefono = mb_substr($this->telefono, 0, 9);
            $this->password = mb_substr($this->password, 0, 50);
        }
        // ....Código de la clase....
    }


    $stmt = $dbh->prepare("SELECT * FROM usuario");
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Clientes');
    $stmt->execute();
    while ($objeto = $stmt->fetch()){
        echo $objeto->idUsuario . " -> ";
        echo $objeto->nombre . " -> ";
        echo $objeto->apellidos . "<br>";
        echo $objeto->telefono . "<br>";
        echo $objeto->password . "<br>";
    }

} catch (PDOException $e){
    echo $e->getMessage();
}

$dbh = null;