	<?php
        if (isset($con)) {
            ?>	
		
			<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Búsqueda de Producto</h4>
				  </div>
				  <div class="modal-body">
					<form class="form-horizontal">
					  <div class="form-group">
						<div class="col-sm-6">
						  <input style="background-color: #280a59; color: white; border: 1px solid #b98eff;" type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
						</div>
						<button  style="background-color: #1C1C1C; color: white; border: 1px solid #1C1C1C;" type="button" class="btn btn-default" onclick="load(1)"><span class='glyphicon glyphicon-search'></span>Buscar</button>
					  </div>
					</form>
					<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div>
					<div class="outer_div" ></div>
				  </div>
				  <div class="modal-footer">
					<button style="border: 1px solid #005761;" type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>					
				  </div>
				</div>
			  </div>
			</div>
	<?php
        }
    ?>