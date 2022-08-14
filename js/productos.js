$(document).ready(function () {
	load(1);
});

function load(page) {
	var q = $("#q").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url: './ajax/buscar_productos.php?action=ajax&page=' + page + '&q=' + q,
		beforeSend: function (objeto) {
			$('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
		},
		success: function (data) {
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');

		}
	})
}



function eliminar(id) {
	var q = $("#q").val();
	if (confirm("¿Realmente deseas eliminar el producto?")) {
		$.ajax({
			type: "GET",
			url: "./ajax/buscar_productos.php",
			data: "id=" + id, "q": q,
			beforeSend: function (objeto) {
				$("#resultados").html("Mensaje: Cargando...");
			},
			success: function (datos) {
				$("#resultados").html(datos);
				load(1);
			}
		});
	}
}

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


  
		   
  



