
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
 $connect = mysqli_connect("localhost", "root", "", "md5db");  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  
      header("location:entry.php");  
 }  
 if(isset($_POST["register"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
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
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $query = "INSERT INTO users (username, password) VALUES('$username', '$password')";  
           if(mysqli_query($connect, $query))  
           {  
                         echo"
<script type='text/javascript'>
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1500
})
</script>
  ";
           }  
      }  
 }  

 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
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
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
                header("location:entry.php");  
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
                     <input type="text" name="username" class="form-control" />  
                     <br />  
                     <label>Contraseña</label>  
                     <input type="password" name="password" class="form-control" />  
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

                     <p align="center"><a href="index.php?action=login">Login</a></p>  
                </form>  
                <?php  
                }  
                ?>  
           </div>  
      </body>  
 </html>  
