<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>

         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    <title></title>
  </head>
  <body>

    <?php  
 //entry.php  
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
 header("location:index.php?action=login");  
 } 
 ?>

 <br>
 <br>
    <h1><CENTER>PRODUCTOS GUARDADOS</CENTER></h1><br>


<center>
  <?php  
    
                echo ' <a href="logout.php"><button href="logout.php" type="button" class="btn btn-outline-danger waves-effect">Salir</button></a>';
                echo ' <a href="ver.php"><button href="ver.php" type="button" class="btn btn-outline-info waves-effect">ver lista</button></a>'; 
                echo ' <a href="productos.php"><button href="productos.php" type="button" class="btn btn-outline-success waves-effect"> Ver productos </button></a>';   
                ?> 
 </center><br><br>
<br>
<div class="container-fluid">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">talla</th>
      <th scope="col">color</th>
      <th scope="col">precio</th>
      <th scope="col">Categoria</th>
      <th scope="col">Imagen</th>
      <th scope="col">fecha</th>
      <th scope="col">Editar</th>
       <th scope="col">Eliminar</th>
    </tr>
  </thead>
   <tbody>
                                                    <?php
// Primero conectamos siempre a la base de datos mysql
 //Credenciales Mysql
        $Host = 'localhost';
        $Username = 'grupo1';
        $Password = 'grupo1';
        $dbName = 'grupo1';
        
        //Crear conexion con la abse de datos
        $db = new mysqli($Host, $Username, $Password, $dbName);
        
        // Cerciorar la conexion
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        
$query = mysqli_query($db,"SELECT * FROM grupo1.tienda");

                        while($row = mysqli_fetch_array($query)){   
                         $imagen=$row['imagen'];  
                         $idpro=$row['idpro'];  

  echo "
                            <tr>
                                <td>".$row['nombre']."</td>
                                <td>".$row['descripcion']."</td>
                                <td>".$row['talla']."</td>
                                <td>".$row['color']."</td>
                                <td>".$row['precio']."</td>
                                <td>".$row['categoria']."</td>
                                <td><img width='100px'  height='100px' src='data:image/jpg; base64," .base64_encode($imagen) ."'></td>
                                <td>".$row['fecha']."</td>
                                <td><a href='actualizarpro.php?idpro=$row[idpro]'><i class='fas fa-spinner fa-pulse'></i> Actualizar</a></td>
                                <td><a href='eliminar.php?idpro=$row[idpro]'><i class='fas fa-trash-alt fa-pulse'></i> Eliminar</a></td>

                            </tr>
                            ";     
                        }
                        ?>
                        </tbody>   
                    
                       </table>   


</div>
     <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  </body>
</html>