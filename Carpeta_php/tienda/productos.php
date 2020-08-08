 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
    <h1><center>lista de productos</center></h1><br>

 <?php  
    
                echo ' <a href="logout.php"><button href="logout.php" type="button" class="btn btn-outline-danger waves-effect">Salir</button></a>';
                echo ' <a href="ver.php"><button href="ver.php" type="button" class="btn btn-outline-info waves-effect">ver lista</button></a>'; 
                echo ' <a href="productos.php"><button href="productos.php" type="button" class="btn btn-outline-success waves-effect"> Ver productos </button></a>';   
                ?>  
<br>
<br>
<center>
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
                        // $idpro=$row['idpro'];  

  echo "  

<div class='card bg-dark text-white'>
   <img class='card-img-top' width='300px'  height='500px' src='data:image/jpg; base64," .base64_encode($imagen) ."' alt='Card image cap' />
  <div class='card-img-overlay'>
    <h5 class='card-title'>".$row['nombre']."</h5>
    <p class='card-text'>".$row['descripcion']."</p>
    <p class='card-text'><b>TALLA: </b>".$row['talla']." <B>PRECIO: </B> ".$row['precio']." </p>
  </div>
</div>
<br>
                            ";     
                        }
                        ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</center>

<style type="text/css">
    .card-title{
        font-size:40px;
    }
      .card-text{
        font-size:30px;
    }
</style>
    </div>
  </body>
</html>








