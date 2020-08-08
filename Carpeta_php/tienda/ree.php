<?php
  $connect = mysqli_connect("localhost", "grupo1", "grupo1", "grupo1");  

if(isset($_POST["submit"])){
//error_reporting(0);


     $nombre = mysqli_real_escape_string($connect, $_POST["nombre"]); 
$descripcion = mysqli_real_escape_string($connect, $_POST["descripcion"]); 
$talla = mysqli_real_escape_string($connect, $_POST["talla"]); 
$color = mysqli_real_escape_string($connect, $_POST["color"]); 
$precio = mysqli_real_escape_string($connect, $_POST["precio"]); 
$categoria = mysqli_real_escape_string($connect, $_POST["categoria"]);        
   $revisar = getimagesize($_FILES["image"]["tmp_name"]);
  if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        $insertar = ("INSERT INTO grupo1.tienda (nombre, descripcion, talla, color, precio, categoria, imagen, fecha) values ('$nombre','$descripcion','$talla','$color','$precio','$categoria','$imgContenido',now())");


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
           
}
 ?>