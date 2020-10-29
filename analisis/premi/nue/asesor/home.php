
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








      </body>  
 </html>  
