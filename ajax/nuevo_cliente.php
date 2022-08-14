<?php
    include 'is_logged.php';
    if (empty($_POST['nombre_cliente'])) {
        $errors[] = 'Nombre vacío';
    } elseif (!empty($_POST['nombre_cliente'])) {
        require_once '../config/db.php';
        require_once '../config/conexion.php';

        $nombre_cliente = mysqli_real_escape_string($con, (strip_tags($_POST['nombre_cliente'], ENT_QUOTES)));
        $celular = mysqli_real_escape_string($con, (strip_tags($_POST['celular'], ENT_QUOTES)));
        $telefono = mysqli_real_escape_string($con, (strip_tags($_POST['telefono'], ENT_QUOTES)));
        $email = mysqli_real_escape_string($con, (strip_tags($_POST['email'], ENT_QUOTES)));
        $region = intval($_POST['region']);
        $pais = mysqli_real_escape_string($con, (strip_tags($_POST['pais'], ENT_QUOTES)));
        $cod_postal = mysqli_real_escape_string($con, (strip_tags($_POST['cod_postal'], ENT_QUOTES)));
        $ciudad = mysqli_real_escape_string($con, (strip_tags($_POST['ciudad'], ENT_QUOTES)));
        $calle = mysqli_real_escape_string($con, (strip_tags($_POST['calle'], ENT_QUOTES)));
        $avenida = mysqli_real_escape_string($con, (strip_tags($_POST['avenida'], ENT_QUOTES)));
        $num_casa = mysqli_real_escape_string($con, (strip_tags($_POST['num_casa'], ENT_QUOTES)));
        $descripcion = mysqli_real_escape_string($con, (strip_tags($_POST['descripcion'], ENT_QUOTES)));
        $fecha_adicion = date('Y-m-d H:i:s');

        $sql = "SELECT * FROM cliente WHERE email = '".$email."';";
        $query_check_user_name = mysqli_query($con, $sql);
        $query_check_user = mysqli_num_rows($query_check_user_name);
        if ($query_check_user == 1) {
            $errors[] = 'Lo sentimos, el nombre o correo electrónico del cliente ya está en uso.';
        } else {
            $sql = "INSERT INTO cliente (nombre_cliente, celular, telefono, email, region, pais, cod_postal, ciudad, calle, avenida, num_casa, descripcion, fecha_adicion  ) VALUES ('$nombre_cliente', '$celular', '$telefono', '$email', '$region', '$pais', '$cod_postal','$ciudad', '$calle', '$avenida', '$num_casa', '$descripcion', '$fecha_adicion')";
            $query_new_insert = mysqli_query($con, $sql);
            if ($query_new_insert) {
                $messages[] = 'El cliente ha sido ingresado satisfactoriamente.';
            } else {
                $errors[] = 'Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.'.mysqli_error($con);
            }
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