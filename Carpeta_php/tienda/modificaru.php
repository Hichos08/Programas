

 <!DOCTYPE html>  
 <html>  
   <head>  
           <title>Webslesson Tutorial | PHP Login Registration Form with md5() Password Encryption</title>  
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
 if(!isset($_SESSION["username"]))  
 {  
      header("location:index.php?action=login");  
 } 
    

    $connect = mysqli_connect("localhost", "grupo1", "grupo1", "grupo1");  

if(isset($_POST["submit"])){
//error_reporting(0);


$idpro = $_POST['idpro'];                     
$nombre = mysqli_real_escape_string($connect, $_POST["nombre"]); 
$descripcion = mysqli_real_escape_string($connect, $_POST["descripcion"]); 
$talla = mysqli_real_escape_string($connect, $_POST["talla"]); 
$color = mysqli_real_escape_string($connect, $_POST["color"]); 
$precio = mysqli_real_escape_string($connect, $_POST["precio"]); 
$categoria = mysqli_real_escape_string($connect, $_POST["categoria"]);  
 date_default_timezone_set('America/Guatemala');
                $b = date("Y-m-d H:i:s");

        $insertar = ("UPDATE grupo1.tienda SET nombre='$nombre', descripcion='$descripcion', talla='$talla', color='$color', precio='$precio', categoria='$categoria', fecha='$b' where idpro = '$idpro' ");


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
        }

           
}
 ?>


           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Manejo de sesiones con contraseña encriptada MD5</h3>  
                <br />  
                <?php  
                echo '<h1>Bienvenido -> '.$_SESSION["username"].'</h1>';  
                echo ' <a href="logout.php"><button href="logout.php" type="button" class="btn btn-outline-danger waves-effect">Salir</button></a>';
                echo ' <a href="ver.php"><button href="ver.php" type="button" class="btn btn-outline-info waves-effect">ver lista</button></a>'; 
                echo ' <a href="productos.php"><button href="productos.php" type="button" class="btn btn-outline-success waves-effect"> Ver productos </button></a>';   
                ?>  
           </div>  




<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">
  .form-style input{
  border:0;
  height:50px;
  border-radius:0;
border-bottom:2px solid #ebebeb;  
}
.form-style input:focus{
border-bottom:2px solid #007bff;  
box-shadow:none;
outline:0;
background-color:#ebebeb; 
}
.sideline {
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
    text-align: center;
  color:#ccc;
}
button{
height:50px;  
}
.sideline:before,
.sideline:after {
    content: '';
    border-top: 1px solid #ebebeb;
    margin: 0 20px 0 0;
    flex: 1 0 20px;
}

.sideline:after {
    margin: 0 0 0 20px;
}
</style>


      </body>  
 </html>  
