<?php
$mysqli = new mysqli("POAPMYSQL139.dns-servicio.com:3306", dbUser", "dbPassword", "dbName");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT * FROM profesor WHERE tipo = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['especialidad']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($idProfesor, $nombre, $apellidos, $telefono, $password, $tipo);
$stmt->fetch();


echo "<table>";
echo "<tr>";
echo "<th>CustomerID</th>";
echo "<td>" . $idProfesor . "</td>";
echo "<th>CompanyName</th>";
echo "<td>" . $nombre . "</td>";
echo "<th>ContactName</th>";
echo "<td>" . $apellidos . "</td>";
echo "<th>Address</th>";
echo "<td>" . $telefono . "</td>";
echo "<th>City</th>";
echo "<td>" . $password . "</td>";
echo "<th>PostalCode</th>";
echo "<th>Country</th>";
echo "<td>" . $tipo . "</td>";
echo "</tr>";
echo "</table>";

$stmt->close();
?>