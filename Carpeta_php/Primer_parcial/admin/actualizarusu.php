<!DOCTYPE html>
<html>
<head>
	<title></title>
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
</head>
<body>
	<a href="../cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
            <hr>
<?php 
include "conexion.php";


 session_start();

        if(!isset($_SESSION['admin_login']))  
        {
          header("location: ../index.php");  
        }

        if(isset($_SESSION['Operario_login']))  
        {
          header("location: ../personal/personal_portada.php"); 
        }
        
        if(isset($_SESSION['admin_login']))
        {
     
            echo $_SESSION['admin_login'];
        }


        if(isset($_POST["submit"])){
error_reporting(0);

$id = $_GET['id'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$role = $_POST['role'];

       
    $insertar = ("UPDATE mainlogin SET username='$usuario', password ='$password', role='$role'
    	WHERE id='$id'");


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


$id = $_GET['id'];  
$query = mysqli_query($connect,"SELECT * FROM mainlogin WHERE id = '$id'");
                        while($row = mysqli_fetch_array($query)){   

echo"

<div class='container'>
<div class='row'>
<div class='col-6 mx-auto p-4 m-5 border-light shadow-sm'>
<h3 class='pb-3'>ACTUALIZAR USUARIO</h3>
<div class='form-style'>
<form method='POST'>
  <div class='form-group pb-3'>    
    <input type='text' class='form-control' id='usuario' name='usuario' value='$row[username]'>   
  </div>
   <div class='form-group pb-3'>    
   <select class='form-control' name='role'>
          <option name='role' id='role' selected='selected'>$row[role]</option>
          <option value='admin'>admin</option>
          <option value='Operario'>Operario</option>
      </select>
    </div>
  <div class='form-group pb-3'>    
    <input type='text'  class='form-control' id='password' name='password' value='$row[password]'>   
  </div>
   <div class='pb-2'>
  <button type='submit' name='submit' class='btn btn-dark w-100 font-weight-bold mt-2'>Registrar</button>
   </div>
</form>

</div>

</div>
</div>
</div>
";
                        	}

?>

  
     
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