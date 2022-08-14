	<?php
        if (isset($con)) {
            ?>

	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>Editar Usuario</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="editar_usuario" name="editar_usuario">
			<div id="resultados_ajax2"></div>
			<div class="form-group">
				<label for="firstname2" class="col-sm-3 control-label">Nombres</label>
				<div class="col-sm-8">
				  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="firstname2" name="firstname2" placeholder="Primer y segundo nombre del usuario" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ- ]{3,40}" title="El Campo solo admite letras, con un tamaño mínimo: 3 y un tamaño máximo: 40" required>
				  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="hidden" id="mod_id" name="mod_id">
				</div>
			  </div>
			  <div class="form-group">
				<label for="lastname2" class="col-sm-3 control-label">Apellidos</label>
				<div class="col-sm-8">
				  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="lastname2" name="lastname2" placeholder="Primer y segundo apelido del usuario" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ- ]{3,40}" title="El Campo solo admite letras, con un tamaño mínimo: 3 y un tamaño máximo: 40" required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_name2" class="col-sm-3 control-label">Usuario</label>
				<div class="col-sm-8">
				  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="user_name2" name="user_name2" placeholder="Usuario" pattern="[a-zA-Z0-9]{2,64}" title="Nombre de usuario (El campo sólo admite letras y números, 2-64 caracteres)"required>
				</div>
			  </div>
			  <div class="form-group">
				<label for="user_email2" class="col-sm-3 control-label">E-mail</label>
				<div class="col-sm-8">
				  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="email" class="form-control" id="user_email2" name="user_email2" placeholder="E-mail del usuario" required>
				</div>
			  </div>
						 	 
			
		  </div>
		  <div class="modal-footer">
			<button style="border: 1px solid #1C1C1C;" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button style="background-color: #1C1C1C; border: 1px solid #1C1C1C;" type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar Datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
        }
    ?>