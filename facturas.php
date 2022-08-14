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
    $title = 'Nuevo Pedido | GLAMART';

?>
<!DOCTYPE html>

<html lang="en" >
	<head>
		<?php include 'cabecera.php'; ?>
		<title><?php echo $title; ?></title>
	</head>
  <body style="background-color:rgb(0, 0, 0); background-image: url(img/imagen2.jpg);background-size:cover;background-repeat: no-repeat;">
	<?php
    include 'barra_navegacion.php';
    ?>  

	<div >
  		<canvas height="40"></canvas>
	</div>

    <div class="container" >
		<div class="panel panel-info" style="border-color: #17202A; color:#280a59">
			<div class="panel-heading" style="background-color: #151515; color: #ffffff">
				<h4><i class='glyphicon glyphicon-edit'></i>Nuevo Pedido</h4>
			</div>
			<div class="panel-body">
				<?php
                include 'modal/buscar_productos.php';
                ?>

				<form class="form-horizontal" role="form" id="datos_factura" >
					<div class="form-group row">
						<label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
						<div class="col-md-3">
							<input style="background-color: #280a59; color: white; border: 1px solid #b98eff" type="text" class="form-control input-sm" id="nombre_cliente" placeholder="Selecciona un cliente" required>
							<input style="background-color: #280a59; color: white; border: 1px solid #b98eff" id="id_cliente" type='hidden'>	
						</div>
						<label for="email" class="col-md-1 control-label">Tipo de Envío</label>
						<div class="col-md-3">
							<select style="background-color: #280a59; color: white; border: 1px solid #b98eff;;"class='form-control input-sm' id="tipo_envio">
								<option value="Terrestre">Terrestre</option>
								<option value="Aéreo">Aéreo</option>
								<option value="Marítimo">Marítimo</option>
							</select>
						</div>
						<label for="tel2" class="col-md-1 control-label">Fecha</label>
						<div class="col-md-2">
							<input style="background-color: #280a59; color: white; border: 1px solid #b98eff;;"type="text" class="form-control input-sm" id="fecha" value="<?php echo date('d/m/Y'); ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
											
						<label for="email" class="col-md-1 control-label">Pago</label>
						<div class="col-md-3">
							<select style="background-color: #280a59; color: white; border: 1px solid #b98eff;;"class='form-control input-sm' id="tipo_pago">
								<option value="Tarjeta Débito">Tarjeta Débito</option>
								<option value="Tarjeta Crédito">Tarjeta Crédito</option>
								<option value="PayPal">PayPal</option>
								<option value="Transferencia Bancaria">Transferencia Bancaria</option>
							</select>
					</div>
						
					<div class="col-md-12">
						<div class="pull-right">
							<button style="background-color: #1C1C1C; color: white; border: 1px solid #1C1C1C;" type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
							<span class="glyphicon glyphicon-search"></span> Agregar productos
							</button>
							<button style="background-color: #1C1C1C; color: white; border: 1px solid #1C1C1C;" type="submit" class="btn btn-default">
							<span class="glyphicon glyphicon-print"></span> Imprimir
							</button>
						</div>	
					</div>
				</form>	
				
				<div id="resultados" class='col-md-12' style="margin-top:10px"></div>
			</div>
		</div>		
		<div class="row-fluid">
			<div class="col-md-12">	

			</div>	
		 </div>
	</div>
	<hr>

	
	<?php
    include 'pie_pagina.php';
    ?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/nueva_factura.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script>
		$(function() {
			console.log($("#nombre_cliente").val());
						$("#nombre_cliente").autocomplete({
							source: "./ajax/autocomplete/clientes.php",
							minLength: 2,
							select: function(event, ui) {
								console.log(ui);
								event.preventDefault();
								$('#id_cliente').val(ui.item.id_cliente);
								$('#nombre_cliente').val(ui.item.nombre_cliente);
							 }
						});
						 
						
					});
					
	$("#nombre_cliente" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
							$("#id_cliente" ).val("");
						}
						if (event.keyCode==$.ui.keyCode.DELETE){
							$("#nombre_cliente" ).val("");
							$("#id_cliente" ).val("");
						}
			});	
	</script>
  </body>
</html>