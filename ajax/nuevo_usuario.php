<?php
include 'is_logged.php';

            require_once '../config/db.php';
            require_once '../config/conexion.php';

                $firstname = mysqli_real_escape_string($con, (strip_tags($_POST['firstname'], ENT_QUOTES)));
                $lastname = mysqli_real_escape_string($con, (strip_tags($_POST['lastname'], ENT_QUOTES)));
                $user_name = mysqli_real_escape_string($con, (strip_tags($_POST['user_name'], ENT_QUOTES)));
                $user_email = mysqli_real_escape_string($con, (strip_tags($_POST['user_email'], ENT_QUOTES)));
                $user_password = $_POST['user_password_new'];
                $date_added = date('Y-m-d H:i:s');

                $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

                $sql = "SELECT * FROM users WHERE user_name = '".$user_name."' OR user_email = '".$user_email."';";
                $query_check_user_name = mysqli_query($con, $sql);
                $query_check_user = mysqli_num_rows($query_check_user_name);
                if ($query_check_user == 1) {
                    $errors[] = 'Lo sentimos , el nombre de usuario ó la dirección de correo electrónico ya está en uso.';
                } else {
                    $sql = "INSERT INTO users (firstname, lastname, user_name, user_password_hash, user_email, date_added)
                            VALUES('".$firstname."','".$lastname."','".$user_name."', '".$user_password_hash."', '".$user_email."','".$date_added."');";

                    $query_new_user_insert = mysqli_query($con, $sql);

                    if ($query_new_user_insert) {
                        $messages[] = 'Usuario añadido con éxito.';
                    } else {
                        $errors[] = 'Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.';
                    }
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