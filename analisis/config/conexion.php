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