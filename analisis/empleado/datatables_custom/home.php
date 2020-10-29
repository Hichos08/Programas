


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>Tutorial DataTables</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
           
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
      
  </head>
    
  <body> 



<?php  
 //entry.php  
 session_start();  
 if(!isset($_SESSION["usuario"]))  
 {  
      header("location:login.php?action=login");  
 } 
    
?>

 <?php  
                echo '<h1>Bienvenido -> '.$_SESSION["usuario"].'</h1>';  
                echo ' <a href="logout.php"><button href="logout.php" type="button" class="btn btn-outline-danger waves-effect">Salir</button></a>';
                echo ' <a href="ver.php"><button href="ver.php" type="button" class="btn btn-outline-info waves-effect">ver lista</button></a>'; 
                echo ' <a href="productos.php"><button href="productos.php" type="button" class="btn btn-outline-success waves-effect"> Ver productos </button></a>';   
                ?>   



    
     
   <!--Ejemplo tabla con DataTables-->
    <div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                  <th>ID ORDEN</th>
                                <th>ID SERVICIO</th>
                                <th>ID ASESOR</th>
                                <th>FECHA ORDEN</th>
                                <th>NOMBRE</th>
                                <th>APELLIDO</th> 
                                <th>DIRECCION</th> 
                                 <th>CORREO</th>
                                 <th>TELEFONO</th> 
                                <th>DEPARTAMENTO</th>  
                               <th>MUNICIPIO</th> 
                               <th>CODIGO SERVICIO</th>
                               <th>DESCRIPCION</th>   
                                <th>ACTUALIZAR</th>
                               

                              

                            </tr>
                        </thead>
                         <tbody>
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
    orden_trabajo.id_orden, 
    orden_trabajo.id_servicio, 
    orden_trabajo.id_asesor, 
    orden_trabajo.fecha_orden, 
    cliente.nombre, 
    cliente.apellido, 
    cliente.direccion, 
    cliente.correo, 
    cliente.telefono, 
    cliente.departamento, 
    cliente.municipio, 
    servicio.codigo_ser, 
    servicio.descripcion
FROM
    orden_trabajo
    INNER JOIN
    cliente
    ON 
        orden_trabajo.id_cliente = cliente.id_cliente
    INNER JOIN
    servicio
    ON 
        orden_trabajo.id_servicio = servicio.id_servicio");

                        while($row = mysqli_fetch_array($query)){   
                        if($row['id_asesor'] == null) {            
  echo "
                            <tr class='table-danger'>
                               <td>".$row['id_orden']."</td>
                                <td>".$row['id_servicio']."</td>
                                <td>".$row['id_asesor']."</td>
                                 <td>".$row['fecha_orden']."</td>
                                 <td>".$row['nombre']."</td>
                                <td>".$row['apellido']."</td> 
                                 <td>".$row['direccion']."</td> 
                               <td>".$row['correo']."</td> 
                              <td>".$row['telefono']."</td> 
                              <td>".$row['departamento']."</td>
                              <td>".$row['municipio']."</td>
                              <td>".$row['codigo_ser']."</td>
                              <td>".$row['descripcion']."</td>
                                <td><a href='modificaru.php?id_orden=$row[id_orden]'>Actualizar</a></td>
                            </tr>
                            ";  

}elseif($row['id_asesor']>=1){

echo "
                            <tr class='table-success'>
                               <td>".$row['id_orden']."</td>
                                <td>".$row['id_servicio']."</td>
                                <td>".$row['id_asesor']."</td>
                                 <td>".$row['fecha_orden']."</td>
                                 <td>".$row['nombre']."</td>
                                <td>".$row['apellido']."</td> 
                                 <td>".$row['direccion']."</td> 
                               <td>".$row['correo']."</td> 
                              <td>".$row['telefono']."</td> 
                              <td>".$row['departamento']."</td>
                              <td>".$row['municipio']."</td>
                              <td>".$row['codigo_ser']."</td>
                              <td>".$row['descripcion']."</td>
                                <td><a href='modificaru.php?id_orden=$row[id_orden]'>Actualizar</a></td>
                            </tr>
                            ";  

}

 }
                        ?>
                        </tbody>   
                    
                       </table>                   
                    </div>
                </div>
        </div>  
    </div>  



    <br>
    <br>
    <BR>
    <BR>


    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>  
    <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="main.js"></script>  
    
    
  </body>
</html>
