		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/buscar_clientes.php?action=ajax&page='+page+'&q='+q,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}

	
		
			function eliminar (id)
		{
			var q= $("#q").val();
		if (confirm("¿Realmente deseas eliminar el cliente?")){	
		$.ajax({
        type: "GET",
        url: "./ajax/buscar_clientes.php",
        data: "id="+id,"q":q,
		 beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		  },
        success: function(datos){
		$("#resultados").html(datos);
		load(1);
		}
			});
		}
		}
		
		
	
$( "#guardar_cliente" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_cliente.php",
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

$( "#editar_cliente" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_cliente.php",
			data: parametros,
			 beforeSend: function(objeto){
				//$("#resultados_ajax2").html("Mensaje: Cargando...");
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
			var nombre_cliente = $("#nombre_cliente"+id).val();
			var celular = $("#celular"+id).val();
			var telefono = $("#telefono"+id).val();
			var email = $("#email"+id).val();
			var region = $("#region"+id).val();
			var pais = $("#pais"+id).val();
			var cod_postal = $("#cod_postal"+id).val();
			var ciudad = $("#ciudad"+id).val();
			var calle = $("#calle"+id).val();
			var avenida = $("#avenida"+id).val();
			var num_casa = $("#num_casa"+id).val();
			var descripcion = $("#descripcion"+id).val();
			var mod_id = id;
	
			$("#mod_nombre_cliente").val(nombre_cliente);
			$("#mod_celular").val(celular);
			$("#mod_telefono").val(telefono);
			$("#mod_email").val(email);
			$("#mod_region").val(region);
			$("#mod_pais").val(pais);
			$("#mod_cod_postal").val(cod_postal);
			$("#mod_ciudad").val(ciudad);
			$("#mod_calle").val(calle);
			$("#mod_avenida").val(avenida);
			$("#mod_num_casa").val(num_casa);
			$("#mod_descripcion").val(descripcion);
			$("#mod_id").val(mod_id);
		
		
		}
	
		
		

