	<?php
        if (isset($con)) {
            ?>

	<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>Agregar Nuevo Cliente</h4>
        </div>

        <div class="modal-body">
          <form class="form-horizontal" method="post" id="guardar_cliente" name="guardar_cliente">
            <div id="resultados_ajax">

              <div class="col-sm-12">
                <div class="form-group">
                  <label>Nombre</label>
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;"type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre Completo del Cliente"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ- ]{3,40}" title="El campo solo admite letras, con un tamaño mínimo: 3 y un tamaño máximo: 40" required>
                </div>	
                                
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <label>Celular</label>
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="celular" name="celular"  placeholder="Número de Celular del Cliente"  pattern="[0-9]{8}" title="El campo solo admite números, con un tamaño: 8" required>
                  </div>
                  <div class="col-sm-6 form-group">
                    <label>Teléfono</label>
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="telefono" name="telefono"  placeholder="Número de Teléfono del Cliente"  pattern="[0-9]{8}" title="El campo solo admite números, con un tamaño: 8">
                  </div>
                </div>										
                
                <div class="form-group">
                  <label>Email</label>
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="email" class="form-control" id="email" name="email"  placeholder="E-mail del cliente" required>
                </div>
                
                <div class="form-group">
                  <label>Dirección</label>
                </div>	

                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label>Región</label>
                    <select style="background-color: #280a59; color: white; border: 1px solid #b98eff;" class="form-control" id="region" name="region" required>
                      <option value=""selected>-- Región --</option>
                      <option value="1">Centroamérica</option>
                    </select>
                  </div>	
                  <div class="col-sm-4 form-group">
                    <label>País</label>
                    <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="pais" name="pais"  placeholder="Ej.: Honduras"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ- ]{3,40}" title="El campo solo admite letras, con un tamaño mínimo: 3 y un tamaño máximo: 40" required>
                  </div>	
                  <div class="col-sm-4 form-group">
                    <label>Código Postal</label>
                    <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="cod_postal" name="cod_postal"  placeholder="Ej.: 11101"  pattern="[0-9]{1,5}" title="El campo solo admite números" required>
                  </div>		
                </div>
                
                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label>Ciudad</label>
                    <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="ciudad" name="ciudad"  placeholder="Ej.: Tegucigalpa"  pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ- ]{3,40}" title="El campo solo admite letras, con un tamaño mínimo: 3 y un tamaño máximo: 40" required>
                  </div>	
                  <div class="col-sm-4 form-group">
                    <label>Calle</label>
                    <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="calle" name="calle"  placeholder="Ej.: Las Colinas"  pattern="[0-9a-zA-Z- ]{3,50}" title="El campo solo admite letras en mayúsculas/minúsculas y números. Con un tamaño mínimo: 3 y un tamaño máximo: 50" required>
                  </div>	
                  <div class="col-sm-4 form-group">
                    <label>Avenida</label>
                    <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="avenida" name="avenida"  placeholder="Ej.: 7ma"  pattern="[0-9a-zA-Z- ]{3,50}" title="El campo solo admite letras en mayúsculas/minúsculas y números. Con un tamaño mínimo: 3 y un tamaño máximo: 50" required>
                  </div>		
                </div>
                
                <div class="row">
                  <div class="col-sm-4 form-group">
                    <label>No. Casa</label>
                    <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="num_casa" name="num_casa"  placeholder="Ej.: 1812"  pattern="[0-9]{1,50}" title="El campo solo admite números" required>
                  </div>		
                  <div class="col-sm-9 form-group">
                    <label>Descripción</label>
                    <textarea style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="descripcion" name="descripcion"  placeholder="Ej.: Frente a Supermercado X"  pattern="[0-9a-zA-Z]{3,50}" title="El campo solo admite letras en mayúsculas/minúsculas y números. Con un tamaño mínimo: 3 y un tamaño máximo: 50" required></textarea>       
                  </div>	
                </div>
              </div>

              <div class="modal-footer">
                <button style="border: 1px solid #1C1C1C;" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button style="background-color: #1C1C1C; border: 1px solid #1C1C1C;" type="submit" class="btn btn-primary" id="guardar_datos">Guardar Datos</button>
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