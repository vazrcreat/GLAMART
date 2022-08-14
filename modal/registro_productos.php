	<?php
        if (isset($con)) {
            ?>
	
	<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i>Agregar Nuevo Producto</h4>
        </div>

        <div class="modal-body">
          <form class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto">
            <div id="resultados_ajax_productos">

              <div class="form-group">
                <label for="codigo_producto" class="col-sm-3 control-label">Código</label>
                <div class="col-sm-8">
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;"type="text" class="form-control" id="codigo_producto" name="codigo_producto" placeholder="Código Producto" pattern="[0-9]{1,50}" title="El campo solo admite números" required>
                </div>
              </div>
              
              <div class="form-group">
                <label for="nombre" class="col-sm-3 control-label">Nombre</label>
                <div class="col-sm-8">
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Producto" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ- ]{3,40}" title="El campo solo admite letras, con un tamaño mínimo: 3 y un tamaño máximo: 40" required>
                </div>
              </div>

              <div class="form-group">
                <label for="marca" class="col-sm-3 control-label">Marca</label>
                <div class="col-sm-8">
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="marca" name="marca" placeholder="Marca del Producto" pattern="[0-9a-zA-Z]{3,50}" title="El campo solo admite letras en mayúsculas/minúsculas y números. Con un tamaño mínimo: 3 y un tamaño máximo: 50" required>
                </div>
              </div>

              <div class="form-group">
                <label for="material" class="col-sm-3 control-label">Material</label>
                <div class="col-sm-8">
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="material" name="material" placeholder="Tipo de Material del Producto" pattern="[0-9a-zA-Z]{3,50}" title="El campo solo admite letras en mayúsculas/minúsculas y números. Con un tamaño mínimo: 3 y un tamaño máximo: 50" required>
                </div>
              </div>
              
              <div class="form-group">
                <label for="talla" class="col-sm-3 control-label">Talla</label>
                <div class="col-sm-8">
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="talla" name="talla" placeholder="Número de Talla del Producto" pattern="[0-9a-zA-Z]{1,50}" title="El campo solo admite letras en mayúsculas/minúsculas y números. Con un tamaño mínimo: 3 y un tamaño máximo: 50" required>
                </div>
              </div>
              
              <div class="form-group">
                <label for="categoria" class="col-sm-3 control-label">Categoría</label>
                <div class="col-sm-8">
                  <select style="background-color: #280a59; color: white; border: 1px solid #b98eff;" class="form-control" id="categoria" name="categoria" required>
                    <option value="" selected>-- Categoría del Producto --</option>
                    <option value="Mujer">Mujer</option>
                    <option value="Hombre">Hombre</option>
                    <option value="UNISEX">UNISEX</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="cantidad" class="col-sm-3 control-label">Cantidad</label>
                <div class="col-sm-8">
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad del Producto" pattern="[0-9]{1,50}" title="El campo solo admite números enteros" required>
                </div>
              </div>
              
              <div class="form-group">
                <label for="existencia" class="col-sm-3 control-label">Existencia</label>
                <div class="col-sm-8">
                  <select style="background-color: #280a59; color: white; border: 1px solid #b98eff;" class="form-control" id="existencia" name="existencia" required>
                    <option value="" selected>-- Existencia --</option>
                    <option value="Disponible" >Disponible</option>
                    <option value="No Disponible">No Disponible</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label for="precio_compra" class="col-sm-3 control-label">Precio Compra</label>
                <div class="col-sm-8">
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="precio_compra" name="precio_compra" placeholder="Precio de Compra del Producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="El campo solo admite números con 0 ó 2 decimales" maxlength="8">
                </div>
              </div>

              <div class="form-group">
                <label for="precio_venta" class="col-sm-3 control-label">Precio Venta</label>
                <div class="col-sm-8">
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="precio_venta" name="precio_venta" placeholder="Precio de Venta del Producto" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="El campo solo admite números con 0 ó 2 decimales" maxlength="8">
                </div>
              </div>

              <div class="form-group">
                <label for="promocion" class="col-sm-3 control-label">Promoción</label>
                <div class="col-sm-8">
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="promocion" name="promocion" placeholder="Promoción del Producto" pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="El campo solo admite números con 0 ó 2 decimales" maxlength="8">
                </div>
              </div>

              <div class="form-group">
                <label for="descuento" class="col-sm-3 control-label">Descuento</label>
                <div class="col-sm-8">
                  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="descuento" name="descuento" placeholder="Descuento del Producto" pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="El campo solo admite números con 0 ó 2 decimales" maxlength="8">
                </div>
              </div>         
            </div>
            
            <div class="modal-footer">
                <button style="border: 1px solid #1C1C1C;" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button style="background-color: #1C1C1C; border: 1px solid #1C1C1C;" type="submit" class="btn btn-primary" id="guardar_datos">Guardar Datos</button>
            </div>
          </form>
        </div>  
      </div>
	  </div>
	</div>
	<?php
        }
    ?>