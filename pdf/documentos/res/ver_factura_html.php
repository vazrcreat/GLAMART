<style type="text/css">
    table { vertical-align: top; }
    tr    { vertical-align: top; }
    td    { vertical-align: top; }
    .midnight-blue{
        background:#f7dc1c;
        padding: 4px 4px 4px;
        color:white;
        font-weight:bold;
        font-size:12px;
    }
    .silver{
        background:white;
        padding: 3px 4px 3px;
    }
    .clouds{
        background:#ecf0f1;
        padding: 3px 4px 3px;
    }
    .border-top{
        border-top: solid 1px #bdc3c7;
        
    }
    .border-left{
        border-left: solid 1px #bdc3c7;
    }
    .border-right{
        border-right: solid 1px #bdc3c7;
    }
    .border-bottom{
        border-bottom: solid 1px #bdc3c7;
    }
    table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
    }
</style>

<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo 'UNAH'; echo  $anio = date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 100px; heigth: 100px;" src="../../img/logo.png" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo NOMBRE_EMPRESA; ?></span>
				<br><?php echo DIRECCION_EMPRESA; ?><br> 
				Teléfono: <?php echo TELEFONO_EMPRESA; ?><br>
				Email: <?php echo EMAIL_EMPRESA; ?><br>
				RTN: <?php echo RTN_EMPRESA; ?>
                
            </td>
			<td style="width: 25%;text-align:right">
			Pedido Nº <?php echo $numero_pedido; ?>
			</td>
			
        </tr>
    </table>
    <br>
    

	
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
           <td style="width:50%;" class='midnight-blue'>FACTURAR A</td>
        </tr>
		<tr>
           <td style="width:50%;" >
			<?php
                $sql_cliente = mysqli_query($con, "select * from cliente where id_cliente='$id_cliente'");
                $rw_cliente = mysqli_fetch_array($sql_cliente);
                echo $rw_cliente['nombre_cliente'];
            ?>
			
		   </td>
        </tr>
        
   
    </table>
    
       <br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
		    <td style="width:25%;" class='midnight-blue'>FECHA</td>
		    <td style="width:40%;" class='midnight-blue'>FORMA DE PAGO</td>
		    <td style="width:25%;" class='midnight-blue'>FORMA DE ENVIO</td>

        </tr>
		<tr>
		  <td style="width:25%;"><?php echo date('d/m/Y'); ?></td>
		   <td style="width:40%;" >
                <?php
                if ($tipo_envio == 'Terrestre') {
                    echo 'Terrestre';
                } elseif ($tipo_envio == 'Aéreo') {
                    echo 'Aéreo';
                } elseif ($tipo_envio == 'Marítimo') {
                    echo 'Marítimo';
                }
                ?>
		   </td>
           <td style="width:40%;" >
                <?php
                if ($tipo_pago == 'Tarjeta Débito') {
                    echo 'Tarjeta Débito';
                } elseif ($tipo_pago == 'Tarjeta Crédito') {
                    echo 'Tarjeta Crédito';
                } elseif ($tipo_pago == 'PayPal') {
                    echo 'PayPal';
                } elseif ($tipo_pago == 'Transferencias Bancaria') {
                    echo 'Transferencia Bancaria';
                }
                ?>
		   </td>

        </tr>
		
        
   
    </table>
	<br>
  
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-blue'>CANT.</th>
            <th style="width: 60%" class='midnight-blue'>DESCRIPCIÓN</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO UNIT.</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO TOTAL</th>
            
        </tr>

<?php
$nums = 1;
$sumador_total = 0;
$sql = mysqli_query($con, "select * from producto, tmp where products.id_producto=tmp.id_producto and tmp.session_id='".$session_id."'");
while ($row = mysqli_fetch_array($sql)) {
    $id_tmp = $row['id_tmp'];
    $id_producto = $row['id_producto'];
    $codigo_producto = $row['codigo_producto'];
    $cantidad = $row['cantidad_tmp'];
    $nombre = $row['nombre'];

    $precio_venta = $row['precio_tmp'];
    $precio_venta_f = number_format($precio_venta, 2); //Formateo variables
    $precio_venta_r = str_replace(',', '', $precio_venta_f); //Reemplazo las comas
    $precio_total = $precio_venta_r * $cantidad;
    $precio_total_f = number_format($precio_total, 2); //Precio total formateado
    $precio_total_r = str_replace(',', '', $precio_total_f); //Reemplazo las comas
    $sumador_total += $precio_total_r; //Sumador
    if ($nums % 2 == 0) {
        $clase = 'clouds';
    } else {
        $clase = 'silver';
    } ?>

        <tr>
            <td class='<?php echo $clase; ?>' style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase; ?>' style="width: 60%; text-align: left"><?php echo $nombre; ?></td>
            <td class='<?php echo $clase; ?>' style="width: 15%; text-align: right"><?php echo $precio_venta_f; ?></td>
            <td class='<?php echo $clase; ?>' style="width: 15%; text-align: right"><?php echo $precio_total_f; ?></td>
            
        </tr>

	<?php
    //Insert en la tabla detalle_cotizacion
    $insert_detail = mysqli_query($con, "INSERT INTO detalle_pedido VALUES ('','$numero_pedido','$id_producto','$cantidad','$precio_venta_r')");

    ++$nums;
}
    $subtotal = number_format($sumador_total, 2, '.', '');
    $total_iva = ($subtotal * ISV) / 100;
    $total_iva = number_format($total_iva, 2, '.', '');
    $total_factura = $subtotal + $total_iva;
?>
	  
        <tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">SUBTOTAL &#36; </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($subtotal, 2); ?></td>
        </tr>
		<tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">IVA (<?php echo ISV; ?>)% &#36; </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_iva, 2); ?></td>
        </tr><tr>
            <td colspan="3" style="widtd: 85%; text-align: right;">TOTAL &#36; </td>
            <td style="widtd: 15%; text-align: right;"> <?php echo number_format($total_factura, 2); ?></td>
        </tr>
    </table>
	
	
	
	<br>
	<div style="font-size:11pt;text-align:center;font-weight:bold">Gracias por su compra!</div>

</page>

<?php
$fecha = date('Y-m-d H:i:s');
$insert = mysqli_query($con, "INSERT INTO pedidos VALUES ('','$numero_pedido','$fecha','$id_cliente','$tipo_envio','$tipo_pago','$total_factura')");
$delete = mysqli_query($con, "DELETE FROM tmp WHERE session_id='".$session_id."'");
