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
    <?php  
                echo '<center><h1>Bienvenido -> '.$_SESSION["username"].'</h1> 
                 <a href="logout.php"><button href="logout.php" type="button" class="btn btn-outline-danger waves-effect">Salir</button></a></center>';  
                ?>  
<br>
<form action="modificaru.php" method="POST">
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
        

$idpro = $_GET['idpro'];  
$query = mysqli_query($db,"SELECT * FROM grupo1.tienda WHERE idpro = '$idpro'");
                        while($row = mysqli_fetch_array($query)){   
                         $imagen=$row['imagen'];  
                         $idpro=$row['idpro'];  

  echo "
<div class='container'>
<div class='row'>
<div class='col-6 mx-auto p-4 m-5 border-light shadow-sm'>
<h3 class='pb-3'>Registro de Productos</h3>
<div class='form-style'>
<form method='POST' enctype='multipart/form-data'>
  <div class='form-group pb-3'>    
    <input type='text' class='form-control' id='idpro' name='idpro' value='$row[idpro]'>   
  </div>
  <div class='form-group pb-3'>    
    <input type='text' class='form-control' id='nombre' name='nombre' value='$row[nombre]'>   
  </div>
  <div class='form-group pb-3'>    
    <input type='text' class='form-control' id='descripcion' name='descripcion' value='$row[descripcion]'>   
  </div>
  <div class='form-group pb-3'>    
    <input type='text'  class='form-control' id='talla' name='talla' value='$row[talla]'>   
  </div>
  <div class='form-group pb-3'>    
    <input type='text'  class='form-control' id='color' name='color' value='$row[color]'>   
  </div>
  <div class='form-group pb-3'>    
    <input type='text' class='form-control' id='precio' name='precio' value='$row[precio]'>   
  </div>
  <div class='form-group pb-3'>    
    <input type='text' placeholder='categoria' class='form-control' id='categoria' name='categoria' value='$row[categoria]'>
  </div>


  <div class='d-flex align-items-center justify-content-between'>
<div class='d-flex align-items-center'></div>
</div>
   <div class='pb-2'>
  <button type='submit' name='submit' class='btn btn-dark w-100 font-weight-bold mt-2'> ACTUALIZAR </button>
   </div> 
</form>

</div>

</div>
</div>
</div>
                            ";     
                        }
                        ?>
</form>
     <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  </body>
</html>
