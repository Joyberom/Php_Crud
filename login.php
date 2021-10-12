<?php
    require_once "db.php";
    require_once "User.php";
    $user = new User($db);
    if($user->isLoggedIn()){
        header("location: index.php"); 
    }
    if(isset($_POST['Enviar'])){
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        if($user->login($email, $password)){
            header("location: index.php");
        }else{
            $error = $user->getLastError();
        }
    }
 ?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Php POO</title>
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
    <body class="">
    <div class="page login-page">
      <div class="container">
        <div class="form-outer text-center d-flex align-items-center">
          <div class="form-inner col align-self-center p-5 text-center">
            <div class="logo text-uppercase"><span>ADSI </span><strong class="text-primary"> 2104630</strong></div>
            <p>Bienvenido al Sistema de  Gestión de Clientes. <br>
             Ingrese sus Datos Para Acceder al Aplicativo.</p>
            <div class="container">
            <form class="login-form" method="post">
                    </fieldset>  
              <?php if (isset($error)): ?>
                  <div class="error">
                      <?php echo $error ?>
                  </div>
              <?php endif; ?>
              <h1>Iniciar sesión...</h1>
              <hr>
              <input type="Email" name="Email" placeholder="Email" required/><br>
              <br>
              <input type="Password" name="Password" placeholder="password" required/><br>
              <br>
              <button type="submit" name="Enviar">login</button>
              <p class="message">No tienes una cuenta? <a href="register.php">Registrate </a></p>
              </fieldset>  
            </form>   
            </div>
          <div class="copyrights text-center">
            <p>Design by <a class="text-primary">JOYBER - 2104630 </a></p>
            <!-- href=""   -->
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
