<?php
    include 'is_logged.php';
    if (empty($_POST['mod_id'])) {
        $errors[] = 'ID vacío';
    } elseif (empty($_POST['mod_codigo_producto'])) {
        $errors[] = 'Código del producto vacío.';
    } elseif (empty($_POST['mod_nombre'])) {
        $errors[] = 'Nombre del producto vacío.';
    } elseif (empty($_POST['mod_marca'])) {
        $errors[] = 'Marca del producto vacío.';
    } elseif (empty($_POST['mod_material'])) {
        $errors[] = 'Material del producto vacío.';
    } elseif (empty($_POST['mod_talla'])) {
        $errors[] = 'Talla del producto vacío.';
    } elseif ($_POST['mod_categoria'] == '') {
        $errors[] = 'Seleccione la categoría del producto.';
    } elseif (empty($_POST['mod_cantidad'])) {
        $errors[] = 'Cantidad del producto vacío.';
    } elseif ($_POST['mod_existencia'] == '') {
        $errors[] = 'Seleccione la existencia del producto.';
    } elseif (empty($_POST['mod_precio_compra'])) {
        $errors[] = 'Precio de compra del producto vacío.';
    } elseif (empty($_POST['mod_precio_venta'])) {
        $errors[] = 'Precio de venta del producto vacío.';
    } elseif (empty($_POST['mod_promocion'])) {
        $errors[] = 'Promoción del producto vacío.';
    } elseif (empty($_POST['mod_descuento'])) {
        $errors[] = 'Descuento del producto vacío.';
    } elseif (
            !empty($_POST['mod_id']) &&
            !empty($_POST['mod_codigo_producto']) &&
            !empty($_POST['mod_nombre']) &&
            !empty($_POST['mod_marca']) &&
            !empty($_POST['mod_material']) &&
            !empty($_POST['mod_talla']) &&
            $_POST['mod_categoria'] != '' &&
            !empty($_POST['mod_cantidad']) &&
            $_POST['mod_existencia'] &&
            !empty($_POST['mod_precio_compra']) &&
            $_POST['mod_precio_venta'] != '' &&
            !empty($_POST['mod_promocion']) &&
            !empty($_POST['mod_descuento'])
        ) {
        require_once '../config/db.php';
        require_once '../config/conexion.php';

        $codigo_producto = mysqli_real_escape_string($con, (strip_tags($_POST['mod_codigo_producto'], ENT_QUOTES)));
        $nombre = mysqli_real_escape_string($con, (strip_tags($_POST['mod_nombre'], ENT_QUOTES)));
        $marca = mysqli_real_escape_string($con, (strip_tags($_POST['mod_marca'], ENT_QUOTES)));
        $material = mysqli_real_escape_string($con, (strip_tags($_POST['mod_material'], ENT_QUOTES)));
        $talla = mysqli_real_escape_string($con, (strip_tags($_POST['mod_talla'], ENT_QUOTES)));
        $categoria = mysqli_real_escape_string($con, (strip_tags($_POST['mod_categoria'], ENT_QUOTES)));
        $cantidad = intval($_POST['mod_cantidad']);
        $existencia = mysqli_real_escape_string($con, (strip_tags($_POST['mod_existencia'], ENT_QUOTES)));
        $fecha_adicion = date('Y-m-d H:i:s');
        $precio_compra = floatval($_POST['mod_precio_compra']);
        $precio_venta = floatval($_POST['mod_precio_venta']);
        $promocion = floatval($_POST['mod_promocion']);
        $descuento = floatval($_POST['mod_descuento']);
        $id_producto = $_POST['mod_id'];

        $sql = "UPDATE producto SET codigo_producto='".$codigo_producto."', nombre='".$nombre."', marca='".$marca."', material='".$material."', talla='".$talla."', categoria='".$categoria."', cantidad='".$cantidad."', existencia='".$existencia."', fecha_adicion='".$fecha_adicion."', precio_compra='".$precio_compra."', precio_venta='".$precio_venta."', promocion='".$promocion."', descuento='".$descuento."'
		WHERE id_producto='".$id_producto."'";
        $query_update = mysqli_query($con, $sql);
        if ($query_update) {
            $messages[] = 'El producto ha sido actualizado satisfactoriamente.';
        } else {
            $errors[] = 'Lo sentimos, algo ha salido mal. Inténtelo nuevamente.'.mysqli_error($con);
        }
        } else {
            $errors[] = 'Error desconocido.';
        }

        if (isset($errors)) {
            ?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
                        foreach ($errors as $error) {
                            echo $error;
                        } ?>
			</div>
			<?php
        }
            if (isset($messages)) {
                ?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
                            foreach ($messages as $message) {
                                echo $message;
                            } ?>
				</div>
				<?php
            }

?>