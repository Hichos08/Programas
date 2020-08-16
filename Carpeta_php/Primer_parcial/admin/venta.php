




  <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Multiusuarios PHP MySQL: Niveles de Usuarios</title>
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

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
  .login-form {
    width: 340px;
      margin: 20px auto;
  }
    .login-form form {
      margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
  <body>
<?php include("../header.php");?>
  

     
      <center>
        <h1>Pagina Administrativa</h1>
        
        <h3>
        <?php
  session_start();

     if(!isset($_SESSION['admin_login'])) 
        {
          header("location: ../index.php");  
        }

        if(isset($_SESSION['Operario_login']))  
        {
          header("location: ../personal/personal_portada.php"); 
        }


include "conexion.php";
//$connect = mysqli_connect("localhost", "root", "", "php_multilogin"); 

        if(isset($_POST["submit"])){
error_reporting(0);



$cod_animal = mysqli_real_escape_string($connect, $_POST["cod_animal"]); 
$precio_libras = mysqli_real_escape_string($connect, $_POST["peso_libras"]); 
$precio_venta = mysqli_real_escape_string($connect, $_POST["precio_venta"]); 
$edad = mysqli_real_escape_string($connect, $_POST["edad"]); 


date_default_timezone_set('America/Guatemala');
                $b = date("Y-m-d H:i:s");

 $insertar = ("INSERT INTO venta (cod_animal,precio_libras,precio_venta,edad,fecha) values ('$cod_animal','$precio_libras','$precio_venta','$edad','$b')");
 $actualizar = ("UPDATE registro_lechones  SET estado= 'I' where cod_animal = '$cod_animal'");

  $resultado = mysqli_query($connect, $insertar);
  $resultado2 = mysqli_query($connect, $actualizar);

if($resultado and $resultado2){
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

        </h3>
          
      </center>
      <a href="../cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
            <hr>
    </div>
    
    <br><br><br>
    



  <div class="container">
<div class="row">
<div class="col-6 mx-auto p-4 m-5 border-light shadow-sm">
<h3 class="pb-3">VENDER</h3>
<div class="form-style">
<form method="POST" enctype="multipart/form-data">
  <div class="form-group pb-3">    
    <input type="text" placeholder="codigo" class="form-control" id="cod_animal" name="cod_animal">   
  </div>
  <div class="form-group pb-3">    
    <input type="text" placeholder="Peso en Libras" class="form-control" id="peso_libras" name="peso_libras">   
  </div>
    <div class="form-group pb-3">    
    <input type="text" placeholder="Precio en venta" class="form-control" id="precio_venta" name="precio_venta">   
  </div>
    <div class="form-group pb-3">    
    <input type="text" placeholder="Peso en Libras" class="form-control" id="edad" name="edad">   
  </div>
   <div class="pb-2">
  <button type="submit" name="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Registrar</button>
   </div>
</form>

</div>

</div>
</div>
</div>
     
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