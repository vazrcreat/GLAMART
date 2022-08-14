<?php
    include 'is_logged.php'; //Archivo verifica que el usuario que intenta acceder a la URL esta logueado
    $id_pedido = $_SESSION['id_pedido'];
    /*Inicia validacion del lado del servidor*/
    if (empty($_POST['id_cliente'])) {
        $errors[] = 'ID vacío';
    } elseif (empty($_POST['tipo_envio'])) {
        $errors[] = 'Seleccione el tipo de envío.';
    } elseif (empty($_POST['tipo_pago'])) {
        $errors[] = 'Seleccione la forma de pago.';
    } elseif (
            !empty($_POST['id_cliente']) &&
            !empty($_POST['tipo_envio']) &&
            !empty($_POST['tipo_pago'])
        ) {
        /* Connect To Database*/
        require_once '../config/db.php'; //Contiene las variables de configuracion para conectar a la base de datos
        require_once '../config/conexion.php'; //Contiene funcion que conecta a la base de datos
        // escaping, additionally removing everything that could be (html/javascript-) code
        $id_cliente = intval($_POST['id_cliente']);
        $tipo_envio = mysqli_real_escape_string($con, (strip_tags($_POST['tipo_envio'], ENT_QUOTES)));
        $tipo_pago = mysqli_real_escape_string($con, (strip_tags($_POST['tipo_pago'], ENT_QUOTES)));

        $id_pedido = intval($_POST['id_pedido']);

        $sql = "UPDATE pedidos SET id_cliente='".$id_cliente."', tipo_envio='".$tipo_envio."', 
        tipo_pago='".$tipo_pago."' WHERE id_pedido='".$id_pedido."';";
        $query_update = mysqli_query($con, $sql);
        if ($query_update) {
            $messages[] = 'El pedido ha sido realizado satisfactoriamente.';
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