	<?php
        if (isset($con)) {
            ?>
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>Editar Cliente</h4>
        </div>
        
        <div class="modal-body">
          <form class="form-horizontal" method="post" id="editar_cliente" name="editar_cliente">
            <div id="resultados_ajax2">
              <div class="col-sm-12">
                
              <div class="form-group">
                  <label>Nombre</label>
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;"type="text" class="form-control" id="mod_nombre_cliente" name="mod_nombre_cliente" placeholder="Nombre Completo Cliente"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-  ]{3,40}" title="El campo solo admite letras, con un tamaño mínimo: 3 y un tamaño máximo: 40" required>
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="hidden" name="mod_id" id="mod_id">
                </div>	

                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label>Celular</label>
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="mod_celular" name="mod_celular"  placeholder="Número de Celular del Cliente"  pattern="[0-9]{8}" title="El campo solo admite números, con un tamaño: 8" required>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label>Teléfono</label>
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="mod_telefono" name="mod_telefono"  placeholder="Número de Teléfono del Cliente"  pattern="[0-9]{8}" title="El campo solo admite números, con un tamaño: 8" >>
                  </div>
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="email" class="form-control" id="mod_email" name="mod_email"  placeholder="E-mail del cliente" >
                </div>

                <div class="form-group">
                  <label>Dirección</label>
                </div>	

                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label>Región</label>
                    <select style="background-color: #280a59; color: white; border: 1px solid #b98eff;" class="form-control" id="mod_region" name="mod_region" required>
                      <option value="" selected>-- Región --</option>
                      <option value="1">Centroamérica</option>
                    </select>
                  </div>	

                  <div class="col-sm-4 form-group">
                    <label>País</label>
                    <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="mod_pais" name="mod_pais"  placeholder="Ej.: Honduras" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-  ]{3,40}" title="El campo solo admite letras, con un tamaño mínimo: 3 y un tamaño máximo: 40" required>
                  </div>	
                  <div class="col-sm-4 form-group">
                    <label>Código Postal</label>
                    <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="mod_cod_postal" name="mod_cod_postal"  placeholder="Ej.: 11101"  pattern="[0-9]{1,5}" title="El campo solo admite números" required>
                  </div>		
                </div>
                
                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label>Ciudad</label>
                    <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="mod_ciudad" name="mod_ciudad"  placeholder="Ej.: Tegucigalpa"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ-  ]{3,40}" title="El campo solo admite letras, con un tamaño mínimo: 3 y un tamaño máximo: 40" required>
                  </div>	
                  <div class="col-sm-4 form-group">
                    <label>Calle</label>
                    <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="mod_calle" name="mod_calle"  placeholder="Ej.: Las Colinas"  pattern="[0-9a-zA-Z- ]{3,50}" title="El campo solo admite letras en mayúsculas/minúsculas y números. Con un tamaño mínimo: 3 y un tamaño máximo: 50" required>
                  </div>	
                  <div class="col-sm-4 form-group">
                    <label>Avenida</label>
                    <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="mod_avenida" name="mod_avenida"  placeholder="Ej.: 7ma"  pattern="[0-9a-zA-Z- ]{3,50}" title="El campo solo admite letras en mayúsculas/minúsculas y números. Con un tamaño mínimo: 3 y un tamaño máximo: 50" required>
                  </div>		
                </div>
                
                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label>No. Casa</label>
                    <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="mod_num_casa" name="mod_num_casa"  placeholder="Ej.: 1812"  pattern="[0-9]{1,50}" title="El campo solo admite números" required>
                  </div>		
                  <div class="col-sm-9 form-group">
                    <label>Descripción</label>
                    <textarea style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="mod_descripcion" name="mod_descripcion"  placeholder="Ej.: Frente a Supermercado X"  pattern=[0-9a-zA-Z]{3,50}" title="El campo solo admite letras en mayúsculas/minúsculas y números. Con un tamaño mínimo: 3 y un tamaño máximo: 50" required></textarea>       
                  </div>	
                </div>
              </div>


            
              <div class="modal-footer">
                <button style="border: 1px solid #1C1C1C;" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button style="background-color: #1C1C1C; border: 1px solid #1C1C1C;"type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar Datos</button>
              </div>
            </div>
           </form>
        </div>  
      </div>
	  </div>
	</div>
	<?php
        }
    ?>