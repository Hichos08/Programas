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
session_start();

        if(!isset($_SESSION['admin_login']))  
        {
          header("location: ../index.php");  
        }

        if(isset($_SESSION['Operario_login']))  
        {
          header("location: ../personal/personal_portada.php"); 
        }
 ?>

 <br>
 <br>
    <h1><CENTER>COMPRAS LECHONES</CENTER></h1><br>


<center>
      <a href="../cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
 </center><br><br>
<br>
<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">precio compra</th>
      <th scope="col">Peso Libras</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Edad</th>
      <th scope="col">Estado</th>
     <th scope="col"> <center>Fecha venta</center></th>
    </tr>
  </thead>
   <tbody>
                                                    <?php
include "conexion.php";
        
$query = mysqli_query($connect,"SELECT * FROM registro_lechones WHERE estado = 'A' ");

                        while($row = mysqli_fetch_array($query)){   

  echo "
                            <tr>
                                <td>".$row['cod_animal']."</td>
                                <td>".$row['precio_compra']."</td>
                                <td>".$row['peso_libras']."</td>
                                <td>".$row['descripcion']."</td>
                                <td>".$row['edad']."</td>
                                <td>".$row['estado']."</td>
                                <td><center>$row[fecha]</center></td>
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