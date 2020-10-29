
 <!DOCTYPE html>  
 <html>  
   <head>  
           <title>Webslesson Tutorial | PHP Login Registration Form with md5() Password Encryption</title> 

           <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design for Bootstrap</title> 
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
  

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="../css/style.css">



      </head> 
      <body>  




<?php  
 //entry.php  
 session_start();  
 if(!isset($_SESSION["usuario"]))  
 {  
      header("location:login.php?action=login");  
 } 


//include "../config/conexion.php";
$connect = mysqli_connect("localhost", "root", "", "chapin"); 
error_reporting(0);

$id_cliente = $_POST['id_cliente'];
$id_servicio = $_POST['id_servicio'];





        if(isset($_POST["submit"])){

        $insertar = "CALL  sp_servicio('$id_cliente','$id_servicio')";


  $resultado = mysqli_query($connect, $insertar);

if($resultado){
                                    echo"
<script type='text/javascript'>
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Registro completo',
  showConfirmButton: false,
  timer: 1500
})
</script>
  ";
  //header("Location:mostrar_telefonos.php");
        }
  else

{
  echo"
<script type='text/javascript'>
Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: 'ERROR',
  showConfirmButton: false,
  timer: 1500
})
</script>
  ";
}
           
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

<div class="container">
 <div class="row">
   <div class="col-md-3"></div>

  <div class="col-md-6">
<!-- Material form subscription -->
<div class="card">

    <h5 class="card-header info-color white-text text-center py-4">
        <strong>Subscribe</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5">

        <!-- Form -->
        <form class="text-center" style="color: #757575;"  method="POST">

            <p>Join our mailing list. We write rarely, but only the best content.</p>

            <p>
                <a href="" target="_blank">See the last newsletter</a>
            </p>


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

<div class='md-form mt-3'>
                <input type='text' id='id_cliente' name='id_cliente' class='form-control' value='$row[id_cliente]'>
                <label for='materialSubscriptionFormPasswords'>Name</label>
            </div>
  ";  
                       
                  
 
      }

      ?>
            
      <select class="browser-default custom-select" name="id_servicio">
      <option>Servicio a solicitar</option>
  <?php 
 $query = $db -> query ("SELECT * FROM servicio");
          while ($row = mysqli_fetch_array($query)) {

    ?>

      <option value="<?php echo $row['id_servicio']?>"><?php echo $row['id_servicio']." ". $row['codigo_ser']." ".$row['descripcion']?></option>
<?php
  }
?>
    </select>

            <!-- Sign in button -->
            <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit" name="submit">Sign in</button>

        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form subscription -->
</div>
 <div class="col-md-3"></div>
</div>
</form>
</div>


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