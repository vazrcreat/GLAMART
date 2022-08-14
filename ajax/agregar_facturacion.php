<?php

include 'is_logged.php';
$session_id = session_id();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_POST['cantidad'])) {
    $cantidad = $_POST['cantidad'];
}
if (isset($_POST['precio_venta'])) {
    $precio_venta = $_POST['precio_venta'];
}

    require_once '../config/db.php';
    require_once '../config/conexion.php';

if (!empty($id) and !empty($cantidad) and !empty($precio_venta)) {
    $insert_tmp = mysqli_query($con, "INSERT INTO tmp (id_producto,cantidad_tmp,precio_tmp,session_id) VALUES ('$id','$cantidad','$precio_venta','$session_id')");
}
if (isset($_GET['id'])) {
    $id_tmp = intval($_GET['id']);
    $delete = mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='".$id_tmp."'");
}

?>
<table class="table">
<tr>
	<th class='text-center'>CÓDIGO</th>
	<th class='text-center'>CANT.</th>
	<th>DESCRIPCIÓN</th>
	<th class='text-right'>PRECIO UNIT.</th>
	<th class='text-right'>PRECIO TOTAL</th>
	<th></th>
</tr>
<?php
    $sumador_total = 0;
    $sql = mysqli_query($con, "select * from producto, tmp where producto.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
    while ($row = mysqli_fetch_array($sql)) {
        $id_tmp = $row['id_tmp'];
        $codigo_producto = $row['codigo_producto'];
        $cantidad = $row['cantidad_tmp'];
        $nombre = $row['nombre'];

        $precio_venta = $row['precio_tmp'];
        $precio_venta_f = number_format($precio_venta, 2);
        $precio_venta_r = str_replace(',', '', $precio_venta_f);
        $precio_total = $precio_venta_r * $cantidad;
        $precio_total_f = number_format($precio_total, 2);
        $precio_total_r = str_replace(',', '', $precio_total_f);
        $sumador_total += $precio_total_r; ?>
		<tr>
			<td class='text-center'><?php echo $codigo_producto; ?></td>
			<td class='text-center'><?php echo $cantidad; ?></td>
			<td class="text-center"><?php echo $nombre; ?></td>
			<td class='text-right'><?php echo $precio_venta_f; ?></td>
			<td class='text-right'><?php echo $precio_total_f; ?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp; ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
    }
    $subtotal = number_format($sumador_total, 2, '.', '');
    $total_iva = ($subtotal * 15) / 100;
    $total_iva = number_format($total_iva, 2, '.', '');
    $total_factura = $subtotal + $total_iva;

?>
<tr>
	<td class='text-right' colspan=4>SUBTOTAL $</td>
	<td class='text-right'><?php echo number_format($subtotal, 2); ?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>IVA (<?php echo 15; ?>)% $</td>
	<td class='text-right'><?php echo number_format($total_iva, 2); ?></td>
	<td></td>
</tr>
<tr>
	<td class='text-right' colspan=4>TOTAL $</td>
	<td class='text-right'><?php echo number_format($total_factura, 2); ?></td>
	<td></td>
</tr>

</table>
