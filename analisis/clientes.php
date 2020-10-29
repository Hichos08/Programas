<!DOCTYPE html>
<html lang="en">
<head>
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
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>




 <?php  

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
      ?>



<select class="mdb-select md-form colorful-select dropdown-primary">
      <option>Agencia</option>
  <?php 
 $query = $db -> query ("SELECT * FROM servicio");
          while ($row = mysqli_fetch_array($query)) {

    ?>
      
      <option value="<?php echo $row['codigo_ser']." ".$row['descripcion']?>"><?php echo $row['codigo_ser']." ".$row['descripcion']?></option>
<?php
  }
?>
    </select>

<script type="text/javascript">
  // Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>

<script type="text/javascript">
  $(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>

  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

</body>
</html>

