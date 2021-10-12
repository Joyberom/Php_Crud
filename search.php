<?php
    require_once "db.php";
    require_once "User.php";
    $user = new User($db);
    if(!$user->isLoggedIn()){
        header("location: login.php"); 
    }
    $currentUser = $user->getUser();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Php POO Buscar Clientes</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    </head>
    <body>

    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner col align-self-center p-5 text-center">

	<h3>Bienvenido<font color="red"><?php echo $currentUser['Nombre'] ?></font>, <a href="logout.php">Logout</a></h3>
        <h1>Lista de Clientes</h1>        
        <a href="index.php"><button type="button">Home</button></a>
        <a href="create.php"><button type="button">Agregar datos</button></a>
        <a href="search.php"><button type="button">Búsqueda de datos</button></a>
        <hr />
		<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<input type="text" name="A" placeholder="Ingrese  Nombre" value="<?php if (isset($_GET['A'])){ echo $_GET['A']; } ?>"/>	
		</form>
  </br>


    <?php
 if (isset($_GET['A'])){
    $A = $_GET['A'];     
    $query = "SElECT * FROM Clientes WHERE Nombre LIKE :A OR Id LIKE :A";    
    $A = "%".$A."%";        
    $stmt = $db->prepare($query);    
    $stmt->bindParam(':A', $A);               
    $stmt->execute();    
    $jml = $stmt->rowCount();     
	if ($jml>0){ 
	 	echo "<table border=\"1\"   class=\"table table-hover table-dark\" >
	 			<tr>
	 			  
	 			  <th>ID</th>
	 			  <th>NOMBRE</th>
	 			  <th>DIRECCION</th>
	 			  <th>TELEFONO</th>
	 			</tr>";
		$no=1;		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         extract($row); 
	 	 echo "<tr>
	 			  
	 			  <td>{$Id}</td>
	 			  <td>{$Nombre}</td>
	 			  <td>{$Direccion}</td>
	 			  <td>{$Telefono}</td>
	 			</tr>";	
		 $no++;	
		}
		echo "</table>"; 		
	} else {
		echo "Buscar <b>$_GET[A]</b> No encontrado";
	}
 }
?>

    </Div>
        </Div>
         </Div>
           </Div>

         <!-- JavaScript files-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
<!-- <script src="vendor/jquery.cookie/jquery.cookie.js"> </script> -->
    <script src="vendor/chart.js/Chart.min.js"></script>
<!--    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>  -->
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
    <script src="js/People.js"></script>
    </body>
</html>


