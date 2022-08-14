<?php
include 'is_logged.php';

        require_once '../config/db.php';
        require_once '../config/conexion.php';

        $codigo_producto = mysqli_real_escape_string($con, (strip_tags($_POST['codigo_producto'], ENT_QUOTES)));
        $nombre = mysqli_real_escape_string($con, (strip_tags($_POST['nombre'], ENT_QUOTES)));
        $marca = mysqli_real_escape_string($con, (strip_tags($_POST['marca'], ENT_QUOTES)));
        $material = mysqli_real_escape_string($con, (strip_tags($_POST['material'], ENT_QUOTES)));
        $talla = mysqli_real_escape_string($con, (strip_tags($_POST['talla'], ENT_QUOTES)));
        $categoria = mysqli_real_escape_string($con, (strip_tags($_POST['categoria'], ENT_QUOTES)));
        $cantidad = intval($_POST['cantidad']);
        $existencia = mysqli_real_escape_string($con, (strip_tags($_POST['existencia'], ENT_QUOTES)));
        $fecha_adicion = date('Y-m-d H:i:s');
        $precio_compra = floatval($_POST['precio_compra']);
        $precio_venta = floatval($_POST['precio_venta']);
        $promocion = floatval($_POST['promocion']);
        $descuento = floatval($_POST['descuento']);
        $sql = "INSERT INTO producto (codigo_producto, nombre, marca, material, talla, categoria, cantidad, existencia, fecha_adicion, precio_compra, precio_venta, promocion, descuento) VALUES ('$codigo_producto','$nombre', '$marca', '$material', '$talla', '$categoria', '$cantidad', '$existencia', '$fecha_adicion', '$precio_compra', '$precio_venta', '$promocion', '$descuento')";
        $query_new_insert = mysqli_query($con, $sql);
            if ($query_new_insert) {
                $messages[] = 'Producto añadido con éxito.';
            } else {
                $errors[] = 'Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.';
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
		