
 <!DOCTYPE html>  


 <html>  
      <head>  
           <title>sesion MD5</title>  
 <title>Webslesson Tutorial | PHP Login Registration Form with md5() Password Encryption</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  



<?php  
 $connect = mysqli_connect("localhost", "root", "", "chapin");  
 
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["usuario"]) && empty($_POST["contra"]))  
      {  
                     echo"
<script type='text/javascript'>
Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: 'Complete todos los campos',
  showConfirmButton: false,
  timer: 1500
})
</script>
  ";  
      }  
      else  
      {  
           $usuario = mysqli_real_escape_string($connect, $_POST["usuario"]);  
           $contra = mysqli_real_escape_string($connect, $_POST["contra"]);  
         
           $query = "SELECT
  asesor.usuario, 
  asesor.contra, 
  usuarios.id_rol
FROM
  asesor
  INNER JOIN
  usuarios
  ON 
    asesor.id_asesor = usuarios.id_asesor where asesor.usuario = '$usuario' AND asesor.contra = '$contra'  AND id_rol = 4";







           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {
                session_start(); 
                $_SESSION['usuario'] = $usuario;  
                header("location:home.php");  
               
           }  
           else  
           {  
                            echo"
<script type='text/javascript'>
Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: 'Complete todos los campos',
  showConfirmButton: false,
  timer: 1500
})
</script>
  "; 
           }  
      }  
 }  
 ?>  





           <br /><br />  
           <div class="container" style="width:500px;">  
                <h3 align="center">Manejo de Sesiones en Login</h3>  
                <br />  
                <?php  
                if(isset($_GET["action"]) == "login")  
                {  
                ?>  
                <h3 align="center">Login</h3>  
                <br />  
                <form method="post">  
                     <label>Usuario</label>  
                     <input type="text" name="usuario" class="form-control" />  
                     <br />  
                     <label>Contraseña</label>  
                     <input type="password" name="contra" class="form-control" />  
                     <br />  
                    <button  type="submit" name="login" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Iniciar Sesion</button>
                   
                     <br />  
                     <p align="center"><a href="index.php">Register</a></p>  
                </form>  
                <?php       
                }  
                else  
                {  
                ?>  
                <h3 align="center">Register</h3>  
                <br />  
                <form method="post">  
                     <label>Usuario</label>  
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Contraseña</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  

<br>

                     <button  type="submit" name="register" value="Registrar"  class="btn btn-secondary waves-effect"> <i class="fas fa-pencil-alt"></i> Registrar</button>
  
                     <br />  

                     <p align="center"><a href="login.php?action=login">Login</a></p>  
                </form>  
                <?php  
                }  
                ?>  
           </div>  
      </body>  
 </html>  
