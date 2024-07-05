<?php
// Tenemos que incluir el fichero para realizar la conexion
include('BDconect.php');
// Una vez conseguida la conexion ya podemos realizar las consultas SQL

if(isset($_POST['hidden_id']))
{
 $nombres = $_POST['nombres'];
 $direccion = $_POST['direccion'];
 $genero = $_POST['genero'];
 $area = $_POST['area'];
 $edad = $_POST['edad'];
 $estado = $_POST['estado'];
 $id = $_POST['hidden_id'];
 //Actualizacion Multiple usando ciclo FOR
 for($count = 0; $count < count($id); $count++)
 {
  $data = array(
   ':nombres'   => $nombres[$count],
   ':direccion'  => $direccion[$count],
   ':genero'  => $genero[$count],
   ':area' => $area[$count],
   ':edad'   => $edad[$count],
   ':estado'   => $estado[$count],
   ':id'   => $id[$count]
  );
 // La consulta SQL que realizara la actualizacion 
  $query = "
  UPDATE tbl_personal 
  SET nombres=:nombres, direccion=:direccion, genero=:genero, area=:area, edad=:edad, estado=:estado 
  WHERE id = :id";
  $statement = $connect->prepare($query);
  $statement->execute($data);
 }
}

?>
