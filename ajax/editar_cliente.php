<?php
    include 'is_logged.php';
    if (empty($_POST['mod_id'])) {
        $errors[] = 'ID vacío';
    } elseif (empty($_POST['mod_nombre_cliente'])) {
        $errors[] = 'Nombre vacío';
    } elseif (
            !empty($_POST['mod_id']) &&
            !empty($_POST['mod_nombre_cliente'])
        ) {
        require_once '../config/db.php';
        require_once '../config/conexion.php';

        $nombre_cliente = mysqli_real_escape_string($con, (strip_tags($_POST['mod_nombre_cliente'], ENT_QUOTES)));
        $celular = mysqli_real_escape_string($con, (strip_tags($_POST['mod_celular'], ENT_QUOTES)));
        $telefono = mysqli_real_escape_string($con, (strip_tags($_POST['mod_telefono'], ENT_QUOTES)));
        $email = mysqli_real_escape_string($con, (strip_tags($_POST['mod_email'], ENT_QUOTES)));
        $region = mysqli_real_escape_string($con, (strip_tags($_POST['mod_region'], ENT_QUOTES)));
        $pais = mysqli_real_escape_string($con, (strip_tags($_POST['mod_pais'], ENT_QUOTES)));
        $cod_postal = mysqli_real_escape_string($con, (strip_tags($_POST['mod_cod_postal'], ENT_QUOTES)));
        $ciudad = mysqli_real_escape_string($con, (strip_tags($_POST['mod_ciudad'], ENT_QUOTES)));
        $calle = mysqli_real_escape_string($con, (strip_tags($_POST['mod_calle'], ENT_QUOTES)));
        $avenida = mysqli_real_escape_string($con, (strip_tags($_POST['mod_avenida'], ENT_QUOTES)));
        $num_casa = mysqli_real_escape_string($con, (strip_tags($_POST['mod_num_casa'], ENT_QUOTES)));
        $descripcion = mysqli_real_escape_string($con, (strip_tags($_POST['mod_descripcion'], ENT_QUOTES)));
        $fecha_adicion = date('Y-m-d H:i:s');

        $id_cliente = intval($_POST['mod_id']);

        $sql = "UPDATE cliente SET nombre_cliente='".$nombre_cliente."', celular='".$celular."', telefono='".$telefono."', email='".$email."', region='".$region."', pais='".$pais."', cod_postal='".$cod_postal."', ciudad='".$ciudad."', calle='".$calle."', avenida='".$avenida."', num_casa='".$num_casa."', descripcion='".$descripcion."', fecha_adicion='".$fecha_adicion."' 
                WHERE id_cliente='".$id_cliente."';";

        $query_update = mysqli_query($con, $sql);

        if ($query_update) {
            $messages[] = 'Cliente ha sido actualizado satisfactoriamente.';
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