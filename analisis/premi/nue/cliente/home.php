<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design for Bootstrap</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
</head>
      <body>  



<?php  
 //entry.php  
 session_start();  
 if(!isset($_SESSION["usuario"]))  
 {  
      header("location:login.php?action=login");  
 } 
    
?>



 <?php  

 $user = $_SESSION["usuario"];
 echo $user;
                echo '<h1>Bienvenido -> '.$_SESSION["usuario"].'</h1>';  
                  echo '<h1>Bienvenido -> '.$_SESSION["id_cliente"].'</h1>'; 
                echo ' <a href="logout.php"><button href="logout.php" type="button" class="btn btn-outline-danger waves-effect">Salir</button></a>';
                echo ' <a href="ver.php"><button href="ver.php" type="button" class="btn btn-outline-info waves-effect">ver lista</button></a>'; 
                echo ' <a href="productos.php"><button href="productos.php" type="button" class="btn btn-outline-success waves-effect"> Ver productos </button></a>'; 

                ?>   




                                             <?php
// Primero conectamos siempre a la base de datos mysql
 //Credenciales Mysql
        $Host = 'localhost';
        $Username = 'root';
        $Password = '';
        $dbName = 'chapin';
        
        //Crear conexion con la abse de datos
        $db = new mysqli($Host, $Username, $Password, $dbName);
        
        // Cerciorar la conexion
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        
$query = mysqli_query($db,"SELECT
   
  cliente.id_cliente, 
  cliente.nombre, 
  cliente.apellido, 
  cliente.direccion,
  cliente.correo
FROM
  cliente where cliente.usuario = '$user' ");

                        while($row = mysqli_fetch_array($query)){   
                        
           
 echo "


  <div class='form-group input-group'>
    <div class='input-group-prepend'>
        <span class='input-group-text'> <i class='fa fa-user'></i> </span>
     </div>
        <input type='text' name='id_cliente' size='25' value='$row[id_cliente]'/>
    </div> <!-- form-group// -->
  ";  
                       
                  
 
      }

      ?>

<select class="mdb-select md-form colorful-select dropdown-primary">
      <option>Agencia</option>
  <?php 
 $query = $db -> query ("SELECT * FROM servicio");
          while ($row = mysqli_fetch_array($query)) {

    ?>
      
      <option value="<?php echo $row['codigo_ser']." ".$row['descripcion']?>"><?php echo $row['codigo_ser']." ".$row['descripcion']?></option>
<?php
  }
?>
    </select>


<select class="mdb-select md-form">
  <option value="" disabled selected>Choose your option</option>
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
</select>


<script type="text/javascript">
  
  // Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>
<!-- jQuery -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>

      </body>  
      </html>