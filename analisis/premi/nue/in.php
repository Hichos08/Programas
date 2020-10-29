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

  <!-- Start your project here-->  
  <div style="height: 100vh">
    <div class="flex-center flex-column">
      <h1 class="text-hide animated fadeIn mb-4" style="background-image: url('https://mdbootstrap.com/img/logo/mdb-transparent-250px.png'); width: 250px; height: 90px;">MDBootstrap</h1>
      <h5 class="animated fadeIn mb-3">Thank you for using our product. We're glad you're with us.</h5>
      <p class="animated fadeIn text-muted">MDB Team</p>
    </div>
  </div>
  <!-- End your project here-->

<div class="container">
  <!-- Classic tabs -->
<div class="classic-tabs">

  <ul class="nav tabs-cyan" id="myClassicTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link  waves-light active show" id="profile-tab-classic" data-toggle="tab" href="#profile-classic"
        role="tab" aria-controls="profile-classic" aria-selected="true">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light" id="follow-tab-classic" data-toggle="tab" href="#follow-classic" role="tab"
        aria-controls="follow-classic" aria-selected="false">Follow</a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light" id="contact-tab-classic" data-toggle="tab" href="#contact-classic" role="tab"
        aria-controls="contact-classic" aria-selected="false">Contact</a>
    </li>
    <li class="nav-item">
      <a class="nav-link waves-light" id="awesome-tab-classic" data-toggle="tab" href="#awesome-classic" role="tab"
        aria-controls="awesome-classic" aria-selected="false">Be awesome</a>
    </li>
  </ul>
  <div class="tab-content border-right border-bottom border-left rounded-bottom" id="myClassicTabContent">
    <div class="tab-pane fade active show" id="profile-classic" role="tabpanel" aria-labelledby="profile-tab-classic">
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
        sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
        consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui
        dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora
        incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
    </div>
    <div class="tab-pane fade" id="follow-classic" role="tabpanel" aria-labelledby="follow-tab-classic">
      <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
        aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
        quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>
    </div>
    <div class="tab-pane fade" id="contact-classic" role="tabpanel" aria-labelledby="contact-tab-classic">
      <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
        deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non
        provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.
        Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est
        eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas
        assumenda est, omnis dolor repellendus. </p>
    </div>
    <div class="tab-pane fade" id="awesome-classic" role="tabpanel" aria-labelledby="awesome-tab-classic">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
        eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
        deserunt mollit anim id est laborum.</p>
    </div>
  </div>

</div>
<!-- Classic tabs -->


<form class="md-form">
  <div class="file-field">
    <a class="btn-floating peach-gradient mt-0 float-left">
      <i class="fas fa-paperclip" aria-hidden="true"></i>
      <input type="file">
    </a>
    <div class="file-path-wrapper">
      <input class="file-path validate" type="text" placeholder="Upload your file">
    </div>
  </div>
</form>
<form class="md-form">
  <div class="file-field">
    <a class="btn-floating blue-gradient mt-0 float-left">
      <i class="far fa-heart" aria-hidden="true"></i>
      <input type="file">
    </a>
    <div class="file-path-wrapper">
      <input class="file-path validate" type="text" placeholder="Upload your file">
    </div>
  </div>
</form>
<form class="md-form">
  <div class="file-field">
    <a class="btn-floating purple-gradient mt-0 float-left">
      <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
      <input type="file">
    </a>
    <div class="file-path-wrapper">
      <input class="file-path validate" type="text" placeholder="Upload your file">
    </div>
  </div>
</form>

<br>
<button class="btn btn-warning"><i class="fas fa-magic mr-1"></i> Left</button>
<button class="btn btn-default">Right <i class="fas fa-magic ml-1"></i></button>
<a class="btn btn-info btn-lg" id="alert-target">Click me!</a>
<?php
$a = 5;
if($a==5){
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
?>

</div>



<?php  
 //entry.php  
 session_start();  
 if(!isset($_SESSION["usuario"]))  
 {  
      header("location:login.php?action=login");  
 } 
    
?>



 <?php  

 $user = $_SESSION["usuario"];
 echo $user;
                echo '<h1>Bienvenido -> '.$_SESSION["usuario"].'</h1>';  
                  echo '<h1>Bienvenido -> '.$_SESSION["id_cliente"].'</h1>'; 
                echo ' <a href="logout.php"><button href="logout.php" type="button" class="btn btn-outline-danger waves-effect">Salir</button></a>';
                echo ' <a href="ver.php"><button href="ver.php" type="button" class="btn btn-outline-info waves-effect">ver lista</button></a>'; 
                echo ' <a href="productos.php"><button href="productos.php" type="button" class="btn btn-outline-success waves-effect"> Ver productos </button></a>'; 

                ?>   




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
   
  cliente.id_cliente, 
  cliente.nombre, 
  cliente.apellido, 
  cliente.direccion,
  cliente.correo
FROM
  cliente where cliente.usuario = '$user' ");

                        while($row = mysqli_fetch_array($query)){   
                        
           
 echo "


  <div class='form-group input-group'>
    <div class='input-group-prepend'>
        <span class='input-group-text'> <i class='fa fa-user'></i> </span>
     </div>
        <input type='text' name='id_cliente' size='25' value='$row[id_cliente]'/>
    </div> <!-- form-group// -->
  ";  
                       
                  
 
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

<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Name

      </th>
      <th class="th-sm">Position

      </th>
      <th class="th-sm">Office

      </th>
      <th class="th-sm">Age

      </th>
      <th class="th-sm">Start date

      </th>
      <th class="th-sm">Salary

      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Tiger Nixon</td>
      <td>System Architect</td>
      <td>Edinburgh</td>
      <td>61</td>
      <td>2011/04/25</td>
      <td>$320,800</td>
    </tr>
    <tr>
      <td>Garrett Winters</td>
      <td>Accountant</td>
      <td>Tokyo</td>
      <td>63</td>
      <td>2011/07/25</td>
      <td>$170,750</td>
    </tr>
    <tr>
      <td>Ashton Cox</td>
      <td>Junior Technical Author</td>
      <td>San Francisco</td>
      <td>66</td>
      <td>2009/01/12</td>
      <td>$86,000</td>
    </tr>
    <tr>
      <td>Cedric Kelly</td>
      <td>Senior Javascript Developer</td>
      <td>Edinburgh</td>
      <td>22</td>
      <td>2012/03/29</td>
      <td>$433,060</td>
    </tr>
    <tr>
      <td>Airi Satou</td>
      <td>Accountant</td>
      <td>Tokyo</td>
      <td>33</td>
      <td>2008/11/28</td>
      <td>$162,700</td>
    </tr>
    <tr>
      <td>Brielle Williamson</td>
      <td>Integration Specialist</td>
      <td>New York</td>
      <td>61</td>
      <td>2012/12/02</td>
      <td>$372,000</td>
    </tr>
    <tr>
      <td>Herrod Chandler</td>
      <td>Sales Assistant</td>
      <td>San Francisco</td>
      <td>59</td>
      <td>2012/08/06</td>
      <td>$137,500</td>
    </tr>
    <tr>
      <td>Rhona Davidson</td>
      <td>Integration Specialist</td>
      <td>Tokyo</td>
      <td>55</td>
      <td>2010/10/14</td>
      <td>$327,900</td>
    </tr>
    <tr>
      <td>Colleen Hurst</td>
      <td>Javascript Developer</td>
      <td>San Francisco</td>
      <td>39</td>
      <td>2009/09/15</td>
      <td>$205,500</td>
    </tr>
    <tr>
      <td>Sonya Frost</td>
      <td>Software Engineer</td>
      <td>Edinburgh</td>
      <td>23</td>
      <td>2008/12/13</td>
      <td>$103,600</td>
    </tr>
    <tr>
      <td>Jena Gaines</td>
      <td>Office Manager</td>
      <td>London</td>
      <td>30</td>
      <td>2008/12/19</td>
      <td>$90,560</td>
    </tr>
    <tr>
      <td>Quinn Flynn</td>
      <td>Support Lead</td>
      <td>Edinburgh</td>
      <td>22</td>
      <td>2013/03/03</td>
      <td>$342,000</td>
    </tr>
    <tr>
      <td>Charde Marshall</td>
      <td>Regional Director</td>
      <td>San Francisco</td>
      <td>36</td>
      <td>2008/10/16</td>
      <td>$470,600</td>
    </tr>
    <tr>
      <td>Haley Kennedy</td>
      <td>Senior Marketing Designer</td>
      <td>London</td>
      <td>43</td>
      <td>2012/12/18</td>
      <td>$313,500</td>
    </tr>
    <tr>
      <td>Tatyana Fitzpatrick</td>
      <td>Regional Director</td>
      <td>London</td>
      <td>19</td>
      <td>2010/03/17</td>
      <td>$385,750</td>
    </tr>
    <tr>
      <td>Michael Silva</td>
      <td>Marketing Designer</td>
      <td>London</td>
      <td>66</td>
      <td>2012/11/27</td>
      <td>$198,500</td>
    </tr>
    <tr>
      <td>Paul Byrd</td>
      <td>Chief Financial Officer (CFO)</td>
      <td>New York</td>
      <td>64</td>
      <td>2010/06/09</td>
      <td>$725,000</td>
    </tr>
    <tr>
      <td>Gloria Little</td>
      <td>Systems Administrator</td>
      <td>New York</td>
      <td>59</td>
      <td>2009/04/10</td>
      <td>$237,500</td>
    </tr>
    <tr>
      <td>Bradley Greer</td>
      <td>Software Engineer</td>
      <td>London</td>
      <td>41</td>
      <td>2012/10/13</td>
      <td>$132,000</td>
    </tr>
    <tr>
      <td>Dai Rios</td>
      <td>Personnel Lead</td>
      <td>Edinburgh</td>
      <td>35</td>
      <td>2012/09/26</td>
      <td>$217,500</td>
    </tr>
    <tr>
      <td>Jenette Caldwell</td>
      <td>Development Lead</td>
      <td>New York</td>
      <td>30</td>
      <td>2011/09/03</td>
      <td>$345,000</td>
    </tr>
    <tr>
      <td>Yuri Berry</td>
      <td>Chief Marketing Officer (CMO)</td>
      <td>New York</td>
      <td>40</td>
      <td>2009/06/25</td>
      <td>$675,000</td>
    </tr>
    <tr>
      <td>Caesar Vance</td>
      <td>Pre-Sales Support</td>
      <td>New York</td>
      <td>21</td>
      <td>2011/12/12</td>
      <td>$106,450</td>
    </tr>
    <tr>
      <td>Doris Wilder</td>
      <td>Sales Assistant</td>
      <td>Sidney</td>
      <td>23</td>
      <td>2010/09/20</td>
      <td>$85,600</td>
    </tr>
    <tr>
      <td>Angelica Ramos</td>
      <td>Chief Executive Officer (CEO)</td>
      <td>London</td>
      <td>47</td>
      <td>2009/10/09</td>
      <td>$1,200,000</td>
    </tr>
    <tr>
      <td>Gavin Joyce</td>
      <td>Developer</td>
      <td>Edinburgh</td>
      <td>42</td>
      <td>2010/12/22</td>
      <td>$92,575</td>
    </tr>
    <tr>
      <td>Jennifer Chang</td>
      <td>Regional Director</td>
      <td>Singapore</td>
      <td>28</td>
      <td>2010/11/14</td>
      <td>$357,650</td>
    </tr>
    <tr>
      <td>Brenden Wagner</td>
      <td>Software Engineer</td>
      <td>San Francisco</td>
      <td>28</td>
      <td>2011/06/07</td>
      <td>$206,850</td>
    </tr>
    <tr>
      <td>Fiona Green</td>
      <td>Chief Operating Officer (COO)</td>
      <td>San Francisco</td>
      <td>48</td>
      <td>2010/03/11</td>
      <td>$850,000</td>
    </tr>
    <tr>
      <td>Shou Itou</td>
      <td>Regional Marketing</td>
      <td>Tokyo</td>
      <td>20</td>
      <td>2011/08/14</td>
      <td>$163,000</td>
    </tr>
    <tr>
      <td>Michelle House</td>
      <td>Integration Specialist</td>
      <td>Sidney</td>
      <td>37</td>
      <td>2011/06/02</td>
      <td>$95,400</td>
    </tr>
    <tr>
      <td>Suki Burks</td>
      <td>Developer</td>
      <td>London</td>
      <td>53</td>
      <td>2009/10/22</td>
      <td>$114,500</td>
    </tr>
    <tr>
      <td>Prescott Bartlett</td>
      <td>Technical Author</td>
      <td>London</td>
      <td>27</td>
      <td>2011/05/07</td>
      <td>$145,000</td>
    </tr>
    <tr>
      <td>Gavin Cortez</td>
      <td>Team Leader</td>
      <td>San Francisco</td>
      <td>22</td>
      <td>2008/10/26</td>
      <td>$235,500</td>
    </tr>
    <tr>
      <td>Martena Mccray</td>
      <td>Post-Sales support</td>
      <td>Edinburgh</td>
      <td>46</td>
      <td>2011/03/09</td>
      <td>$324,050</td>
    </tr>
    <tr>
      <td>Unity Butler</td>
      <td>Marketing Designer</td>
      <td>San Francisco</td>
      <td>47</td>
      <td>2009/12/09</td>
      <td>$85,675</td>
    </tr>
    <tr>
      <td>Howard Hatfield</td>
      <td>Office Manager</td>
      <td>San Francisco</td>
      <td>51</td>
      <td>2008/12/16</td>
      <td>$164,500</td>
    </tr>
    <tr>
      <td>Hope Fuentes</td>
      <td>Secretary</td>
      <td>San Francisco</td>
      <td>41</td>
      <td>2010/02/12</td>
      <td>$109,850</td>
    </tr>
    <tr>
      <td>Vivian Harrell</td>
      <td>Financial Controller</td>
      <td>San Francisco</td>
      <td>62</td>
      <td>2009/02/14</td>
      <td>$452,500</td>
    </tr>
    <tr>
      <td>Timothy Mooney</td>
      <td>Office Manager</td>
      <td>London</td>
      <td>37</td>
      <td>2008/12/11</td>
      <td>$136,200</td>
    </tr>
    <tr>
      <td>Jackson Bradshaw</td>
      <td>Director</td>
      <td>New York</td>
      <td>65</td>
      <td>2008/09/26</td>
      <td>$645,750</td>
    </tr>
    <tr>
      <td>Olivia Liang</td>
      <td>Support Engineer</td>
      <td>Singapore</td>
      <td>64</td>
      <td>2011/02/03</td>
      <td>$234,500</td>
    </tr>
    <tr>
      <td>Bruno Nash</td>
      <td>Software Engineer</td>
      <td>London</td>
      <td>38</td>
      <td>2011/05/03</td>
      <td>$163,500</td>
    </tr>
    <tr>
      <td>Sakura Yamamoto</td>
      <td>Support Engineer</td>
      <td>Tokyo</td>
      <td>37</td>
      <td>2009/08/19</td>
      <td>$139,575</td>
    </tr>
    <tr>
      <td>Thor Walton</td>
      <td>Developer</td>
      <td>New York</td>
      <td>61</td>
      <td>2013/08/11</td>
      <td>$98,540</td>
    </tr>
    <tr>
      <td>Finn Camacho</td>
      <td>Support Engineer</td>
      <td>San Francisco</td>
      <td>47</td>
      <td>2009/07/07</td>
      <td>$87,500</td>
    </tr>
    <tr>
      <td>Serge Baldwin</td>
      <td>Data Coordinator</td>
      <td>Singapore</td>
      <td>64</td>
      <td>2012/04/09</td>
      <td>$138,575</td>
    </tr>
    <tr>
      <td>Zenaida Frank</td>
      <td>Software Engineer</td>
      <td>New York</td>
      <td>63</td>
      <td>2010/01/04</td>
      <td>$125,250</td>
    </tr>
    <tr>
      <td>Zorita Serrano</td>
      <td>Software Engineer</td>
      <td>San Francisco</td>
      <td>56</td>
      <td>2012/06/01</td>
      <td>$115,000</td>
    </tr>
    <tr>
      <td>Jennifer Acosta</td>
      <td>Junior Javascript Developer</td>
      <td>Edinburgh</td>
      <td>43</td>
      <td>2013/02/01</td>
      <td>$75,650</td>
    </tr>
    <tr>
      <td>Cara Stevens</td>
      <td>Sales Assistant</td>
      <td>New York</td>
      <td>46</td>
      <td>2011/12/06</td>
      <td>$145,600</td>
    </tr>
    <tr>
      <td>Hermione Butler</td>
      <td>Regional Director</td>
      <td>London</td>
      <td>47</td>
      <td>2011/03/21</td>
      <td>$356,250</td>
    </tr>
    <tr>
      <td>Lael Greer</td>
      <td>Systems Administrator</td>
      <td>London</td>
      <td>21</td>
      <td>2009/02/27</td>
      <td>$103,500</td>
    </tr>
    <tr>
      <td>Jonas Alexander</td>
      <td>Developer</td>
      <td>San Francisco</td>
      <td>30</td>
      <td>2010/07/14</td>
      <td>$86,500</td>
    </tr>
    <tr>
      <td>Shad Decker</td>
      <td>Regional Director</td>
      <td>Edinburgh</td>
      <td>51</td>
      <td>2008/11/13</td>
      <td>$183,000</td>
    </tr>
    <tr>
      <td>Michael Bruce</td>
      <td>Javascript Developer</td>
      <td>Singapore</td>
      <td>29</td>
      <td>2011/06/27</td>
      <td>$183,000</td>
    </tr>
    <tr>
      <td>Donna Snider</td>
      <td>Customer Support</td>
      <td>New York</td>
      <td>27</td>
      <td>2011/01/25</td>
      <td>$112,000</td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <th>Name
      </th>
      <th>Position
      </th>
      <th>Office
      </th>
      <th>Age
      </th>
      <th>Start date
      </th>
      <th>Salary
      </th>
    </tr>
  </tfoot>
</table>
<style type="text/css">
  table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
  bottom: .5em;
}
</style>
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



  <!--Blue select-->
<select class="mdb-select md-form colorful-select dropdown-primary">
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
  <option value="4">Option 4</option>
  <option value="5">Option 5</option>
</select>


<select class="mdb-select md-form">
  <option value="" disabled selected>Choose your option</option>
  <option value="1">Option 1</option>
  <option value="2">Option 2</option>
  <option value="3">Option 3</option>
</select>


<!--/Blue select-->
<script type="text/javascript">
  
  // Material Select Initialization
$(document).ready(function() {
$('.mdb-select').materialSelect();
});
</script>
</body>
</html>

