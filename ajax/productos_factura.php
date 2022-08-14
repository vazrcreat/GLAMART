<?php

    include 'is_logged.php';
    require_once '../config/db.php';
    require_once '../config/conexion.php';

    $action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
    if ($action == 'ajax') {
        $q = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
        $aColumns = ['codigo_producto', 'nombre'];
        $sTable = 'producto';
        $sWhere = '';
        if ($_GET['q'] != '') {
            $sWhere = 'WHERE (';
            for ($i = 0; $i < count($aColumns); ++$i) {
                $sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
            }
            $sWhere = substr_replace($sWhere, '', -3);
            $sWhere .= ')';
        }
        $sWhere .= ' order by id_producto desc';
        include 'pagination.php'; //include pagination file

        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
        $per_page = 10;
        $adjacents = 4;
        $offset = ($page - 1) * $per_page;

        $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
        $row = mysqli_fetch_array($count_query);
        $numrows = $row['numrows'];
        $total_pages = ceil($numrows / $per_page);
        $reload = './productos.php';

        $sql = 'SELECT * FROM  producto order by id_producto desc LIMIT 0,10';
        $query = mysqli_query($con, $sql);

        if (10 > 0) {
            ?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="warning">
					<th style="background-color:#000000; color:#b98eff;">Código</th>
					<th style="background-color:#000000; color:#b98eff;">Producto</th>
					<th style="background-color:#000000; color:#b98eff;"><span class="pull-right">Cantidad</span></th>
					<th style="background-color:#000000; color:#b98eff;"><span class="pull-right">Precio</span></th>
					<th class='text-center' style="width: 36px; background-color:#000000; color:#b98eff;">Agregar</th>
				</tr>
				<?php
            while ($row = mysqli_fetch_array($query)) {
                $id_producto = $row['id_producto'];
                $codigo_producto = $row['codigo_producto'];
                $nombre = $row['nombre'];
                $precio_venta = $row['precio_venta'];
                $precio_venta = number_format($precio_venta, 2, '.', ''); ?>
					<tr>
						<td><?php echo $codigo_producto; ?></td>
						<td><?php echo $nombre; ?></td>
						<td class='col-xs-1'>
						<div class="pull-right">
						<input type="text" class="form-control" style="text-align:right" id="cantidad_<?php echo $id_producto; ?>"  value="1" >
						</div></td>
						<td class='col-xs-2'><div class="pull-right">
						<input type="text" class="form-control" style="text-align:right" id="precio_venta_<?php echo $id_producto; ?>"  value="<?php echo $precio_venta; ?>" >
						</div></td>
						<td class='text-center'><a  style="background-color: #1C1C1C; color: white; border: 1px solid #1C1C1C;" class='btn btn-info'href="#" onclick="agregar('<?php echo $id_producto; ?>')"><i class="glyphicon glyphicon-plus"></i></a></td>
					</tr>
					<?php
            } ?>

				 <tr>
					<td colspan=7><span class="pull-right"><?php
                     echo paginate($reload, $page, $total_pages, $adjacents); ?></span></td>
				</tr>
			  </table>
			</div>
			<?php
        }
    }
?>