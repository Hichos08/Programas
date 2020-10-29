<!DOCTYPE html>
<html>
<head>
	<title></title>
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
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="../css/style.css">




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha512-f8gN/IhfI+0E9Fc/LKtjVq4ywfhYAVeMGKsECzDUHcFJ5teVwvKTqizm+5a84FINhfrgdvjX8hEJbem2io1iTA==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" integrity="sha512-hwwdtOTYkQwW2sedIsbuP1h0mWeJe/hFOfsvNKpRB3CkRxq8EW7QMheec1Sgd8prYxGm1OM9OZcGW7/GUud5Fw==" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js" integrity="sha512-MqEDqB7me8klOYxXXQlB4LaNf9V9S0+sG1i8LtPOYmHqICuEZ9ZLbyV3qIfADg2UJcLyCm4fawNiFvnYbcBJ1w==" crossorigin="anonymous"></script>
</head>
<?php
include "../in.php";
?>




	     <?php
//include "../config/conexion.php";
$connect = mysqli_connect("localhost", "root", "", "chapin"); 
error_reporting(0);

$codigo_ser = $_POST['codigo_ser'];
$descripcion = $_POST['descripcion'];




        if(isset($_POST["submit"])){
        error_reporting(0);
        $insertar = "CALL sp_servicios('$codigo_ser','$descripcion')";


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






<body>

<style type="text/css">
	.border-light {
    border-color: var(--orange) !important;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid var(--orange);
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>

	<br><br>
	<div class="container">
<!-- Default form register -->
<form class="text-center border border-light p-5" method="POST">

    <p class="h4 mb-4">Registro de Servicios</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="codigo_ser" name="codigo_ser" class="form-control" placeholder="codigo especialidad">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="descripción">
        </div>
       
    </div>



    <button class="btn btn-info my-4 btn-block" type="submit" name="submit">Registrar</button>

    <!-- Social register -->
    <p>Siguenos en nuestras redes sociales</p>

    <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
    <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

    <hr>

    <!-- Terms of service -->
    <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="" target="_blank">terms of service</a>

</form>
<!-- Default form register -->

</div>
<!-- jQuery -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
</body>
</html>