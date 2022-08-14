<?php

    session_start();
    if (!isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] != 1) {
        header('location: login.php');
        exit;
    }

    require_once 'config/db.php';
    require_once 'config/conexion.php';
    $active_facturas = 'active';
    $active_productos = '';
    $active_clientes = '';
    $active_usuarios = '';
    $active_pedidos = '';
    $title = 'Página Principal | GLAMART ';

?>

<!DOCTYPE html>

<html lang="es">

<head>
	<?php include 'cabecera.php'; ?>
    
     <title><?php echo $title; ?></title>
     <link href="css/carousel.css" rel="stylesheet">

</head>

<body >
	<?php
    include 'barra_navegacion.php';
    ?>  
	
  	<div >
  		<canvas height="40"></canvas>
    </div>

    <div class="container" >  
      <div id="myCarousel" class="carousel slide" data-ride="carousel" >

        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>

        </ol>

        <div class="carousel-inner" autofocus="">
          <div class="item active">
            <img src="./img/carousel1.png" alt="Los Angeles" style="width:100%;">
          </div>

          <div class="item">
            <img src="./img/carousel2.png" alt="Chicago" style="width:100%;">
          </div>
        
          <div class="item">
            <img src="./img/carousel3.png" alt="New york" style="width:100%;">
          </div>

          <div class="item">
            <img src="./img/carousel4.png" alt="New york" style="width:100%;">
          </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only"></span>
        </a>
      </div>
    </div>

<script>
  
</script>

	<?php
    include 'pie_pagina.php';
    ?>
	
</body>
</html>