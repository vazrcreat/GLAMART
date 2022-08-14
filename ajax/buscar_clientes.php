<?php

    include 'is_logged.php';
    require_once '../config/db.php';
    require_once '../config/conexion.php';

    $action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
    if (isset($_GET['id'])) {
        $id_cliente = intval($_GET['id']);
        $query = mysqli_query($con, "select * from pedidos where id_cliente='".$id_cliente."'");
        $count = mysqli_num_rows($query);
        if ($count == 0) {
            if ($delete1 = mysqli_query($con, "DELETE FROM cliente WHERE id_cliente='".$id_cliente."'")) {
                ?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Aviso!</strong> Datos eliminados exitosamente.
			</div>
			<?php
            } else {
                ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> Lo sentimos, algo ha salido mal. Inténtelo nuevamente.
			</div>
			<?php
            }
        } else {
            ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Error!</strong> No se pudo eliminar éste cliente. Existen pedidos vinculados a éste cliente. 
			</div>
			<?php
        }
    }
    if ($action == 'ajax') {
        $q = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
        $aColumns = ['nombre_cliente']; //Columnas de busqueda
        $sTable = 'cliente';
        $sWhere = '';
        if ($_GET['q'] != '') {
            $sWhere = 'WHERE (';
            for ($i = 0; $i < count($aColumns); ++$i) {
                $sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
            }
            $sWhere = substr_replace($sWhere, '', -3);
            $sWhere .= ')';
        }
        $sWhere .= ' order by nombre_cliente';
        include 'pagination.php'; //include pagination file
        //pagination variables
        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
        $per_page = 3; //how much records you want to show
        $adjacents = 4; //gap between pages after number of adjacents
        $offset = ($page - 1) * $per_page;
        //Count the total number of row in your table*/
        $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
        $row = mysqli_fetch_array($count_query);
        $numrows = $row['numrows'];
        $total_pages = ceil($numrows / $per_page);
        $reload = './clientes.php';
        //main query to fetch the data
        $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
        $query = mysqli_query($con, $sql);
        //loop through fetched data
        if ($numrows > 0) {
            ?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
                    <th style="background-color:#000000;">Nombre</th>
                    <th style="background-color:#000000;">Celular</th>
					<th style="background-color:#000000;">Teléfono</th>
					<th style="background-color:#000000;">Email</th>
					<th style="background-color:#000000;">Region</th>
					<th style="background-color:#000000;">País</th>
					<th style="background-color:#000000;">Código Postal</th>
                    <th style="background-color:#000000;">Ciudad</th>
					<th style="background-color:#000000;">Calle</th>
					<th style="background-color:#000000;">Avenida</th>
					<th style="background-color:#000000;">No. Casa</th>
					<th style="background-color:#000000;">Descripción</th>
					<th style="background-color:#000000;">Agregado</th>
					<th class='text-right' style="background-color:#000000;">Acciones</th>
					
				</tr>
				<?php
                while ($row = mysqli_fetch_array($query)) {
                    $id_cliente = $row['id_cliente'];
                    $nombre_cliente = $row['nombre_cliente'];
                    $celular = $row['celular'];
                    $telefono = $row['telefono'];
                    $email = $row['email'];
                    $region = $row['region'];
                    if ($region == 1) {
                        $region = 'Centroamérica';
                    } else {
                        $region = 'Centroamérica';
                    }
                    $pais = $row['pais'];
                    $cod_postal = $row['cod_postal'];
                    $ciudad = $row['ciudad'];
                    $calle = $row['calle'];
                    $avenida = $row['avenida'];
                    $num_casa = $row['num_casa'];
                    $descripcion = $row['descripcion'];
                    $fecha_adicion = date('d/m/Y', strtotime($row['fecha_adicion'])); ?>
					
                    <input type="hidden" value="<?php echo $nombre_cliente; ?>" id="nombre_cliente<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $celular; ?>" id="celular<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $telefono; ?>" id="telefono<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $email; ?>" id="email<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $region; ?>" id="region<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $pais; ?>" id="pais<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $cod_postal; ?>" id="cod_postal<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $ciudad; ?>" id="ciudad<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $calle; ?>" id="calle<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $avenida; ?>" id="avenida<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $num_casa; ?>" id="num_casa<?php echo $id_cliente; ?>">
                    <input type="hidden" value="<?php echo $descripcion; ?>" id="descripcion<?php echo $id_cliente; ?>">
					
					<tr>
						
                        <td><?php echo $nombre_cliente; ?></td>
                        <td><?php echo $celular; ?></td>
                        <td><?php echo $telefono; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $region; ?></td>
                        <td><?php echo $pais; ?></td>
                        <td><?php echo $cod_postal; ?></td>
                        <td><?php echo $ciudad; ?></td>
                        <td><?php echo $calle; ?></td>
                        <td><?php echo $avenida; ?></td>
                        <td><?php echo $num_casa; ?></td>
                        <td><?php echo $descripcion; ?></td>
                        <td><?php echo $fecha_adicion; ?></td>
                        <td ><span class="pull-right">
                            <a href="#" class='btn btn-default' title='Editar cliente' onclick="obtener_datos('<?php echo $id_cliente; ?>');" data-toggle="modal" data-target="#myModal2"><i class="glyphicon glyphicon-edit"></i></a> 
                            <a href="#" class='btn btn-default' title='Borrar cliente' onclick="eliminar('<?php echo $id_cliente; ?>')"><i class="glyphicon glyphicon-trash"></i> </a></span>
                        </td>
						
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