<?php
    require_once "db.php";
    require_once "User.php";
    $user = new User($db);
    if(!$user->isLoggedIn()){
        header("location: login.php"); 
    }
    $currentUser = $user->getUser();
    $query = $db->prepare("SELECT * FROM Clientes");
    $query->execute();
    $data = $query->fetchAll();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Php POO Lista de Clientes</title>
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
        <hr/>

                
        <table border="1" class="table table-hover table-dark">
            <tr>     
                <th>
                    ID
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Direccion
                </th>
                <th>
                    Telefono
                </th>
                <th>
                    Accion
                </th>
            </tr>
            <?php $no=1; ?>
            <?php foreach ($data as $value): ?>                
                <tr>                 
                    <td>
                        <?php echo $value['Id'] ?>
                    </td>
                    <td>
                        <?php echo $value['Nombre'] ?>
                    </td>
                    <td>
                        <?php echo $value['Direccion'] ?>
                    </td>
                    <td>
                        <?php echo $value['Telefono'] ?>
                    </td>
                    <td>
                        <a href="edit.php?Id=<?php echo $value['Id']?>"><button type="button">Editar</button></a>                        
                        <a href="delete.php?Id=<?php echo $value['Id']?>" onclick="return confirm('Desea eliminar a: <?php echo $value['Nombre']?>?'); " ><button type="button">Eliminar</button></a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </table>

      </div>
        </div>
         </div>
           </div>

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
