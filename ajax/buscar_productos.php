<?php

    include 'is_logged.php';
    require_once '../config/db.php';
    require_once '../config/conexion.php';

    $action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
    if (isset($_GET['id'])) {
        $id_producto = intval($_GET['id']);

        if ($delete1 = mysqli_query($con, "DELETE FROM producto WHERE id_producto='".$id_producto."'")) {
            ?>
			Datos eliminados exitosamente.
			
				<?php
        }
    }

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

        $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
        $query = mysqli_query($con, $sql);

        if ($numrows > 0) {
            ?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
				<th style="background-color:#000000;">Código</th>
                <th style="background-color:#000000;">Prenda</th>
                <th style="background-color:#000000;">Marca</th>
                <th style="background-color:#000000;">Material</th>
                <th style="background-color:#000000;">Talla</th>
                <th style="background-color:#000000;">Categoría</th>
                <th style="background-color:#000000;">Cantidad</th>	
                <th style="background-color:#000000;">Existencia</th>
                <th style="background-color:#000000;">Agregado</th>
                <th class='text-right' style="background-color:#000000;">Precio Compra</th>
                <th class='text-right' style="background-color:#000000;">Precio Venta</th>
                <th class='text-right' style="background-color:#000000;">Promoción</th>
                <th class='text-right' style="background-color:#000000;">Descuento</th>
                <th class='text-right' style="background-color:#000000;">Acciones</th>
					
				</tr>
				<?php
                while ($row = mysqli_fetch_array($query)) {
                    $id_producto = $row['id_producto'];
                    $codigo_producto = $row['codigo_producto'];
                    $nombre = $row['nombre'];
                    $marca = $row['marca'];
                    $material = $row['material'];
                    $talla = $row['talla'];
                    $categoria = $row['categoria'];
                    switch ($categoria) {
                        case 'Mujer':
                        $categoria = 'Mujer';
                        break;
                        case 'Hombre':
                        $categoria = 'Hombre';
                        break;
                        case 'UNISEX':
                        $categoria = 'UNISEX';
                        break;
                    }
                    $cantidad = $row['cantidad'];
                    $existencia = $row['existencia'];
                    switch ($existencia) {
                        case 'Disponible':
                        $existencia = 'Disponible';
                        break;
                        case 'No Disponible':
                        $existencia = 'No Disponible';
                        break;
                    }
                    $fecha_adicion = date('d/m/Y', strtotime($row['fecha_adicion']));
                    $precio_compra = $row['precio_compra'];
                    $precio_venta = $row['precio_venta'];
                    $promocion = $row['promocion'];
                    $descuento = $row['descuento']; ?>
					
					<input type="hidden" value="<?php echo $codigo_producto; ?>" id="codigo_producto<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $nombre; ?>" id="nombre<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $marca; ?>" id="marca<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $material; ?>" id="material<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $talla; ?>" id="talla<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $categoria; ?>" id="categoria<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo number_format($cantidad, 2, '.', ''); ?>" id="cantidad<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $existencia; ?>" id="existencia<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo number_format($precio_compra, 2, '.', ''); ?>" id="precio_compra<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo number_format($precio_venta, 2, '.', ''); ?>" id="precio_venta<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo number_format($promocion, 2, '.', ''); ?>" id="promocion<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo number_format($descuento, 2, '.', ''); ?>" id="descuento<?php echo $id_producto; ?>">
					
					<tr>						
                        <td><?php echo $codigo_producto; ?></td>
                        <td ><?php echo $nombre; ?></td>
                        <td ><?php echo $marca; ?></td>
                        <td ><?php echo $material; ?></td>
                        <td ><?php echo $talla; ?></td>
                        <td ><?php echo $categoria; ?></td>
                        <td ><?php echo $cantidad; ?></td>
                        <td><?php echo $existencia; ?></td>
                        <td><?php echo $fecha_adicion; ?></td>
                        <td>$<span class=''><?php echo number_format($precio_compra, 2); ?></span></td>
                        <td>$<span class=''><?php echo number_format($precio_venta, 2); ?></span></td>
                        <td>$<span class=''><?php echo number_format($promocion, 2); ?></span></td>
                        <td>$<span class=''><?php echo number_format($descuento, 2); ?></span></td>
                        
                        <td ><span class="">						
						<a href="#" class='btn btn-default' title='Editar producto' onclick="obtener_datos('<?php echo $id_producto; ?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
						<a href="#" class='btn btn-default' title='Borrar producto' onclick="eliminar('<?php echo $id_producto; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span>
                        </td>
					</tr>
					<?php
                } ?>
				<tr>
					<td colspan=7><span class="pull-right"><?php
                        echo paginate($reload, $page, $total_pages, $adjacents); ?></span>
                    </td>
				</tr>
			  </table>
			</div>
			<?php
        }
    }
?>