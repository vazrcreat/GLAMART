<?php

    session_start();
    if (!isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] != 1) {
        header('location: ../../login.php');
        exit;
    }

    /* Connect To Database*/
    include '../../config/db.php';
    include '../../config/conexion.php';

    $session_id = session_id();
    $sql_count = mysqli_query($con, "select * from tmp where session_id='".$session_id."'");
    $count = mysqli_num_rows($sql_count);
    if ($count == 0) {
        echo "<script>alert('No hay productos agregados al pedido')</script>";
        echo '<script>window.close();</script>';
        exit;
    }

    require_once dirname(__FILE__).'/../html2pdf.class.php';

    //Variables por GET
    $id_cliente = intval($_GET['id_cliente']);
    $tipo_envio = mysqli_real_escape_string($con, (strip_tags($_REQUEST['tipo_envio'], ENT_QUOTES)));
    $tipo_pago = mysqli_real_escape_string($con, (strip_tags($_REQUEST['tipo_pago'], ENT_QUOTES)));

    //Fin de variables por GET
    $sql = mysqli_query($con, 'select LAST_INSERT_ID(numero_pedido) as last from pedidos order by id_pedido desc limit 0,1 ');
    $rw = mysqli_fetch_array($sql);
    $numero_pedido = $rw['last'] + 1;
    // get the HTML
    ob_start();
    include dirname('__FILE__').'/res/factura_html.php';

    /*try {
        // init HTML2PDF
        $html2pdf = new HTML2PDF();
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF

        $html2pdf->Output('Factura.pdf');
    } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
    }*/
