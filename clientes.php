<?php

    session_start();
    if (!isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] != 1) {
        header('location: login.php');
        exit;
    }

    require_once 'config/db.php';
    require_once 'config/conexion.php';

    $active_facturas = '';
    $active_productos = '';
    $active_clientes = 'active';
    $active_usuarios = '';
	$active_pedidos = '';
    $title = 'Clientes | GLAMART ';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'cabecera.php'; ?>
    <title><?php echo $title; ?></title>
  </head>
  <body style="background-color:rgb(0, 0, 0); background-image: url(img/imagen4.jpg);background-size:cover;background-repeat: no-repeat;">
	<?php
    include 'barra_navegacion.php';
    ?>
	<div >
  		<canvas height="40"></canvas>
	</div>
    <div class="container">
		<div class="panel panel-info" style="border-color: #17202A; color:#b98eff">
			
			<div class="btn-group pull-right">
				<button type='button' class="btn btn-info" style="background-color: #1C1C1C; color: white; border: 1px solid #1C1C1C;" data-toggle="modal" data-target="#nuevoCliente"><span class="glyphicon glyphicon-plus" ></span> Nuevo Cliente</button>
			</div>		

			<div class="panel-heading" style="background-color: #151515; color: #ffffff">				
				<h4><i class='glyphicon glyphicon-search'></i> Clientes Registrados</h4>
			</div>
		
			<div class="panel-body">
				<?php
                    include 'modal/registro_clientes.php';
                    include 'modal/editar_clientes.php';
                ?>
				<form class="form-horizontal" role="form" id="datos_cotizacion">					
					<div class="form-group row">
						<label for="q" class="col-md-2 control-label">Cliente</label>
						<div class="col-md-5">
							<input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="q" placeholder="Nombre del cliente" onkeyup='load(1);'>
						</div>
						<div class="col-md-3">
							<button type="button" class="btn btn-default" style="border: 1px solid #1C1C1C;" onclick='load(1);'>
								<span class="glyphicon glyphicon-search" ></span>Buscar</button>
							<span id="loader"></span>
						</div>								
					</div>
				</form>
				
				<div id="resultados"></div>
				<div class='outer_div'></div>

			</div>				
		</div>
	</div>
		 
	</div>
	
	<?php
    include 'pie_pagina.php';
    ?>
	
	<script type="text/javascript" src="js/clientes.js"></script>
	<script type="text/javascript" src="js/controlador.js"></script>
  </body>
</html>
