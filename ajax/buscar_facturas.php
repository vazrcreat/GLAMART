<?php

    include 'is_logged.php'; //Archivo verifica que el usario que intenta acceder a la URL esta loguead To Database*/
    require_once '../config/db.php'; //Contiene las variables de configuracion para conectar a la base de datos
    require_once '../config/conexion.php'; //Contiene funcion que conecta a la base de datos

    $action = (isset($_REQUEST['action']) && $_REQUEST['action'] != null) ? $_REQUEST['action'] : '';
    if (isset($_GET['id'])) {
        $codigo_pedido = intval($_GET['id']);
        $del1 = "delete from pedidos where numero_pedido='".$numero_pedido."'";
        $del2 = "delete from detalle_pedido where numero_pedido='".$numero_pedido."'";
        if ($delete1 = mysqli_query($con, $del1) and $delete2 = mysqli_query($con, $del2)) {
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
			  <strong>Error!</strong> No se pudo eliminar los datos.
			</div>
			<?php
        }
    }
    if ($action == 'ajax') {
        // escaping, additionally removing everything that could be (html/javascript-) code
        $q = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
        $aColumns = ['numero_pedido'];
        $sTable = 'pedidos';
        $sWhere = '';
        if ($_GET['q'] != '') {
            $sWhere = 'WHERE (';
            for ($i = 0; $i < count($aColumns); ++$i) {
                $sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
            }
            $sWhere = substr_replace($sWhere, '', -3);
            $sWhere .= ')';
        }
        $sWhere .= ' order by id_pedido desc';
        include 'pagination.php'; //include pagination file
        //pagination variables
        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
        $per_page = 10; //how much records you want to show
        $adjacents = 4; //gap between pages after number of adjacents
        $offset = ($page - 1) * $per_page;
        //Count the total number of row in your table*/
        $count_query = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
        $row = mysqli_fetch_array($count_query);
        $numrows = $row['numrows'];
        $total_pages = ceil($numrows / $per_page);
        $reload = './facturas.php';
        //main query to fetch the data
        $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
        $query = mysqli_query($con, $sql);
        //loop through fetched data
        if ($numrows > 0) {
            echo mysqli_error($con); ?>
			<div class="table-responsive">
			  <table class="table">
				<tr  class="info">
					<th style="background-color:#000000;">#</th>
					<th style="background-color:#000000;">Fecha</th>
                    <th style="background-color:#000000;">ID del Cliente</th>
                    <th style="background-color:#000000;">Tipo Envió</th>
					<th style="background-color:#000000;">Tipo Pago</th>
					<th class='text-right' style="background-color:#000000;">Total</th>
					
				</tr>
				<?php
                while ($row = mysqli_fetch_array($query)) {
                    $id_pedido = $row['id_pedido'];
                    $numero_pedido = $row['numero_pedido'];
                    $fecha = date('d/m/Y', strtotime($row['fecha']));
                    $id_cliente = $row['id_cliente'];
                    $tipo_envio = $row['tipo_envio'];
                    switch ($tipo_envio) {
                        case 'Terrestre':
                            $tipo_envio = 'Terrestre';
                            break;
                        case 'Aéreo':
                            $tipo_envio = 'Aéreo';
                            break;
                        case 'Marítimo':
                            $tipo_envio = 'Marítimo';
                            break;
                    }
                    $tipo_pago = $row['tipo_pago'];
                    switch ($tipo_pago) {
                        case 'Tarjeta Débito':
                            $tipo_pago = 'Tarjeta Débito';
                            break;
                        case 'Tarjeta Credito':
                            $tipo_pago = 'Tarjeta Credito';
                            break;
                        case 'PayPal':
                            $tipo_pago = 'PayPal';
                            break;
                        case 'Transferencia Bancaria':
                            $tipo_pago = 'Transferencia Bancaria';
                            break;
                    }
                    $total_pedido = $row['total_pedido']; ?>
					<tr>
						<td><?php echo $numero_pedido; ?></td>
						<td><?php echo $fecha; ?></td>
                        <td><?php echo $id_cliente; ?></td>
                        <td><?php echo $tipo_envio; ?></td>
                        <td><?php echo $tipo_pago; ?></td>
						<td class='text-right'><?php echo number_format($total_pedido, 2); ?></td>					
                        <td class="text-right">
                            <!--<a href="editar_factura.php?id_pedido=<?php echo $id_pedido; ?>" class='btn btn-default' title='Editar Pedido' >
                                <i class="glyphicon glyphicon-edit"></i>
                            </a> 
                            <a href="#" class='btn btn-default' title='Descargar Comprobante' onclick="imprimir_factura('
                                <?php echo $id_pedido; ?>'"><i class="glyphicon glyphicon-download"></i>
                            </a> 
                            <a href="#" class='btn btn-default' title='Borrar Comprobante' onclick="eliminar('
                                <?php echo $numero_pedido; ?>'"><i class="glyphicon glyphicon-trash"></i>-->
                            </a>
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