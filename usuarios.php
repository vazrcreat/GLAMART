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
    $active_usuarios = 'active';
	$active_pedidos = '';
    $title = 'Usuarios | GLAMART ';
?>
<!DOCTYPE html>

<html lang="en">

  <head>
	<?php include 'cabecera.php'; ?>
	<title><?php echo $title; ?></title>
  </head>

  <body style="background-color:rgb(0, 0, 0); background-image: url(img/imagen5.jpg);background-size:cover;background-repeat: no-repeat;">
 	<?php
    include 'barra_navegacion.php';
    ?> 

	<div >
  		<canvas height="40"></canvas>
	</div>

    <div class="container">
		<div class="panel panel-info" style="border-color: #17202A; color:#b98eff">
			<div class="btn-group pull-right">
				<button type='button' class="btn btn-info" style="background-color: #1C1C1C; color: white; border: 1px solid #1C1C1C;" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus" ></span> Nuevo Usuario</button>
			</div>						

			<div class="panel-heading" style="background-color: #151515; color: #ffffff">				
				<h4><i class='glyphicon glyphicon-search'></i> Usuarios Registrados</h4>
			</div>

			<div class="panel-body">
				<?php
                include 'modal/registro_usuarios.php';
                include 'modal/editar_usuarios.php';
                include 'modal/cambiar_password.php';
                ?>
				<form class="form-horizontal" role="form" id="datos_cotizacion">					
					<div class="form-group row">
						<label for="q" class="col-md-2 control-label">Nombres:</label>
						<div class="col-md-5">
							<input type="text" style="background-color: #280a59; color: white; border: 1px solid #b98eff;" class="form-control" id="q" placeholder="Nombre del usuario" onkeyup='load(1);'>
						</div>					
														
						<div class="col-md-3">
							<button style="border: 1px solid #1C1C1C;" type="button" class="btn btn-default" onclick='load(1);'>
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
	
	<?php
    include 'pie_pagina.php';
    ?>

	<script type="text/javascript" src="js/usuarios.js"></script>
	<script type="text/javascript" src="js/controlador.js"></script>
	
  </body>
</html>

<script>
$( "#guardar_usuario" ).submit(function( event ) {
	$('#guardar_datos').attr("disabled", true);
	
	var parametros = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "ajax/nuevo_usuario.php",
			data: parametros,
			beforeSend: function(objeto){
				$("#resultados_ajax").html("Mensaje: Cargando...");
			},

			success: function(datos){
			$("#resultados_ajax").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
			}
		});
	event.preventDefault();
})

$( "#editar_usuario" ).submit(function( event ) {
	$('#actualizar_datos2').attr("disabled", true);
	
	var parametros = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "ajax/editar_usuario.php",
			data: parametros,
			beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			},
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos2').attr("disabled", false);
			load(1);
			}
		});
	event.preventDefault();
})

$( "#editar_password" ).submit(function( event ) {
	$('#actualizar_datos3').attr("disabled", true);
	
	var parametros = $(this).serialize();
		$.ajax({
			type: "POST",
			url: "ajax/editar_password.php",
			data: parametros,
			beforeSend: function(objeto){
				$("#resultados_ajax3").html("Mensaje: Cargando...");
			},
			success: function(datos){
			$("#resultados_ajax3").html(datos);
			$('#actualizar_datos3').attr("disabled", false);
			load(1);
			}
		});
	event.preventDefault();
})

function get_user_id(id){
	$("#user_id_mod").val(id);
}

function obtener_datos(id){
		var nombres = $("#nombres"+id).val();
		var apellidos = $("#apellidos"+id).val();
		var usuario = $("#usuario"+id).val();
		var email = $("#email"+id).val();
		
		$("#mod_id").val(id);
		$("#firstname2").val(nombres);
		$("#lastname2").val(apellidos);
		$("#user_name2").val(usuario);
		$("#user_email2").val(email);
}
</script>
