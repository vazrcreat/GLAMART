<?php
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit('Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !');
} elseif (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once 'libraries/password_compatibility_library.php';
}

// include the configs / constants for the database connection
require_once 'config/db.php';

// load the login class
require_once 'classes/Login.php';

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
    header('location: principal.php');
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    ?>
  <!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no"/>
  <meta name="description" content="">
  <meta name="author" content="">
  
  <title>Login | GLAMART</title>
    <?php include 'cabecera.php'; ?>


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/grayscale.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="css/login.css" type="text/css" rel="stylesheet" media="screen,projection"/>
 

  </head>

  <body id="page-top">
    <header class=""  autofocus="">
      <div class="container d-flex h-100 align-items-center">
        <div class="mx-auto text-center">
          <h1 class="mx-auto my-0 text-uppercase"></h1>
          <h2 class="text-white-50 mx-auto mt-2 mb-5"></h2>          
        </div>
        <div>    
        </div>
      </div>
    </header>

    

    <!-- About Section -->
    <section id="login" class="text-center">

      <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/usuario.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form" class="form-signin">
              <?php
        // show potential errors / feedback (from login object)
        if (isset($login)) {
            if ($login->errors) {
                ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>Error!</strong> 
            
            <?php
            foreach ($login->errors as $error) {
                echo $error;
            } ?>
            </div>
            <?php
            }
            if ($login->messages) {
                ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>Aviso!</strong>
            <?php
            foreach ($login->messages as $message) {
                echo $message;
            } ?>
            </div> 
            <?php
            }
        } ?>
      
                <span id="reauth-email" class="reauth-email"></span>
                <input class="form-control" style="border-radius: 80px 20px; background-color:#1C1C1C; border-width:1px" placeholder="Usuario" name="user_name" type="text" value="" required>
                <input class="form-control" style="border-radius: 80px 20px; background-color:#1C1C1C; border-width:1px" placeholder="Contrase??a" name="user_password" type="password" value="" autocomplete="off" required>
                
                <button type="submit" class="boton boton-ingresar" style="border-radius: 80px 20px; border-width:1px" name="login" id="submit">Iniciar Sesi??n</button>
            </form>
        </div>
      </div>
    </section>
  

   
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/grayscale.min.js"></script>


  </body>
  </html>

  <?php
}
