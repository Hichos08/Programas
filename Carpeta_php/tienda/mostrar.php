<!doctype html>
<html>
<head>
<title>Salida de prueba </title>
</head>
<body>
<?php
$servername = "localhost";
$username = "grupo1";
$password = "grupo1";
$db = "grupo1";

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("Fallo conectarse por: " . mysqli_connect_error());
}
$sql = "SELECT * FROM bi;";
$result = $conn->query($sql);
echo "<table>";
echo "<tr><th>correo</th></tr>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["username"].</td><td>";
    }
} else {
   echo "0 registros";
}
echo "</table>";
$conn->close();
?>
</body>
</html>
