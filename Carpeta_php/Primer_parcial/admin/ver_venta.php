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
    <h1><CENTER>VENTAS DEL DIA</CENTER></h1><br>


<center>
      <a href="../cerrar_sesion.php"><button class="btn btn-danger text-left"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cerrar Sesion</button></a>
 </center><br><br>
<br>
<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Codigo</th>
       <th scope="col">Descripcion</th>
      <th scope="col">precio Libras</th>
      <th scope="col">Precio Venta</th>
      <th scope="col">Edad</th>
     <th scope="col"> <center>Fecha venta</center></th>
    </tr>
  </thead>
   <tbody>
                                                    <?php
include "conexion.php";
        
$query = mysqli_query($connect,"SELECT
  *, 
  venta.cod_animal, 
  registro_lechones.descripcion, 
  venta.precio_libras, 
  venta.precio_venta, 
  venta.edad, 
  venta.fecha
FROM
  registro_lechones
  INNER JOIN
  venta
  ON 
    registro_lechones.cod_animal = venta.cod_animal ");

                        while($row = mysqli_fetch_array($query)){   

  echo "
                            <tr>
                                <td>".$row['cod_animal']."</td>
                                <td>".$row['descripcion']."</td>
                                <td>".$row['precio_libras']."</td>
                                <td>".$row['precio_venta']."</td>
                                <td>".$row['edad']."</td>
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