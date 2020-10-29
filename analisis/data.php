

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">descripcion</th>
       <th scope="col">id</th>
    </tr>
  </thead>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

       $resultados = mysqli_query($conn,"SELECT id FROM notification_data");
  while($consulta = mysqli_fetch_array($resultados))
  {
  //  $variable=$consulta['description'];
   // echo $variable;
  	echo "
  <tbody>
    <tr>
     <th scope='row'>".$consulta['id']."</th>
     
    </tr>
  </tbody>

";
     }
     echo '</table>';
  
$conn->close();
?>
</body>
</html>