<?php

    session_start();
    if (!isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] != 1) {
        header('location: login.php');
        exit;
    }
        require_once 'config/db.php';
        require_once 'config/conexion.php';

    $active_facturas = '';
    $active_productos = 'active';
    $active_clientes = '';
    $active_usuarios = '';
	$active_pedidos = '';
    $title = 'Catalogo | GLAMART ';
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
			<button type='button' class="btn btn-info" style="background-color: #1C1C1C; color: white; border: 1px solid #1C1C1C;" data-toggle="modal" data-target="#nuevoProducto"><span class="glyphicon glyphicon-plus" ></span>Nuevo Producto</button>
		</div>	

		<div class="panel-heading"style="background-color: #151515; color: #ffffff">
		    <h4><i class='glyphicon glyphicon-search'></i>Productos en Catalogo</h4>
		</div>
		<div class="panel-body">
		
			<?php
            include 'modal/registro_productos.php';
            include 'modal/editar_productos.php';
            ?>
		
			
			<form class="form-horizontal" role="form" id="datos_cotizacion">
		
				<div class="form-group row">
					<label for="q" class="col-md-2 control-label">Producto</label>
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
	<script type="text/javascript" src="js/productos.js"></script>
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
		var mod_id = id;
		var codigo_producto = $("#codigo_producto"+id).val();
		var nombre = $("#nombre"+id).val();
		var marca = $("#marca"+id).val();
		var material = $("#material"+id).val();
		var talla = $("#talla"+id).val();
		var categoria = $("#categoria"+id).val();
		var cantidad = $("#cantidad"+id).val();
		var existencia = $("#existencia"+id).val();
		var precio_compra = $("#precio_compra"+id).val();
		var precio_venta = $("#precio_venta"+id).val();
		var promocion = $("#promocion"+id).val();
		var descuento = $("#descuento"+id).val();
		var mod_id = id;

		$("#mod_codigo_producto").val(codigo_producto);
		$("#mod_nombre").val(nombre);
		$("#mod_marca").val(marca);
		$("#mod_material").val(material);
		$("#mod_talla").val(talla);
		$("#mod_categoria").val(categoria);
		$("#mod_cantidad").val(cantidad);
		$("#mod_existencia").val(existencia);
		$("#mod_precio_compra").val(precio_compra);
		$("#mod_precio_venta").val(precio_venta);
		$("#mod_promocion").val(promocion);
		$("#mod_descuento").val(descuento);
		$("#mod_id").val(mod_id);

		}
</script>
