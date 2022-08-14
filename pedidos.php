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
    $active_clientes = '';
    $active_usuarios = '';
	$active_pedidos = 'active';
    $title = 'Pedidos | GLAMART ';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'cabecera.php'; ?>
    <title><?php echo $title; ?></title>
  </head>
  <body style="background-color:rgb(0, 0, 0);background-image: url(img/imagen3.jpg);background-size:cover;background-repeat: no-repeat;">
	<?php
    include 'barra_navegacion.php';
    ?>
	<div >
  		<canvas height="40"></canvas>
	</div>
    <div class="container">
	<div class="panel panel-info" style="border-color: #17202A; color:#b98eff">
		<div class="btn-group pull-right">
			<button type='button' class="btn btn-info" style="background-color: #1C1C1C; color: white; border: 1px solid #1C1C1C;" onclick="location.href='facturas.php'""><span class="glyphicon glyphicon-plus" ></span>Nuevo Pedido</button>
		</div>	

		<div class="panel-heading"style="background-color: #151515; color: #ffffff">
		    <h4><i class='glyphicon glyphicon-search'></i>Pedidos Clientes</h4>
		</div>
		<div class="panel-body">
		
			<?php
            ?>
		
			
			<form class="form-horizontal" role="form" id="datos_cotizacion">
		
				<div class="form-group row">
					<label for="q" class="col-md-2 control-label">Pedidos</label>
					<div class="col-md-5">
					<input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="q" placeholder="Código o nombre del producto" onkeyup='load(1);'>
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
	<hr>

	<?php
    include 'pie_pagina.php';
    ?>
	<script type="text/javascript" src="js/facturas.js"></script>
	<script type="text/javascript" src="js/controlador.js"></script>
  </body>
</html>

<script>
	$( "#guardar_producto" ).submit(function( event ) {
	$('#guardar_datos').attr("disabled", true);
	
   var parametros = $(this).serialize();
	   $.ajax({
			  type: "POST",
			  url: "ajax/nuevo_producto.php",
			  data: parametros,
			   beforeSend: function(objeto){
				  $("#resultados_ajax_productos").html("Mensaje: Cargando...");
				},
			  success: function(datos){
			  $("#resultados_ajax_productos").html(datos);
			  $('#guardar_datos').attr("disabled", false);
			  load(1);
			}
	  });
	event.preventDefault();
  })
  
  $( "#editar_producto" ).submit(function( event ) {
	$('#actualizar_datos').attr("disabled", true);
	
   var parametros = $(this).serialize();
	   $.ajax({
			type: "POST",
			url: "ajax/editar_producto.php",
			data: parametros,
			beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			},
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		}
	  });
	event.preventDefault();
  })
  
	function obtener_datos(id){
		var numero_pedido = $("#numero_pedido"+id).val();
		var id_cliente = $("#id_cliente"+id).val();
		var tipo_envio = $("#tipo_envio"+id).val();
		var tipo_pago = $("#tipo_pago"+id).val();
		var total_pedido = $("#total_pedido"+id).val();
		var mod_id = id;

		$("#numero_pedido").val(numero_pedido);
		$("#id_cliente").val(id_cliente);
		$("tipo_envio").val(tipo_envio);
		$("tipo_pago").val(tipo_pago);
		$("#total_pedido").val(total_pedido);
		$("#mod_id").val(mod_id);

		}
</script>
