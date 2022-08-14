<?php

if (isset($_GET['term'])) {
    include '../../config/db.php';
    include '../../config/conexion.php';
    $return_arr = [];

    if ($con) {
        $fetch = mysqli_query($con, "SELECT * FROM cliente where nombre_cliente like '%".mysqli_real_escape_string($con, ($_GET['term']))."%' LIMIT 0 ,50");

        while ($row = mysqli_fetch_array($fetch)) {
            $id_cliente = $row['id_cliente'];
            $row_array['value'] = $row['nombre_cliente'];
            $row_array['id_cliente'] = $row['id_cliente'];
            $row_array['nombre_cliente'] = $row['nombre_cliente'];
            array_push($return_arr, $row_array);
        }
    }

    mysqli_close($con);

    echo json_encode($return_arr);
}
