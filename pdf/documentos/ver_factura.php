<?php

    session_start();
    if (!isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] != 1) {
        header('location: ../../login.php');
        exit;
    }
    /* Connect To Database*/
    include '../../config/db.php';
    include '../../config/conexion.php';
    $id_pedido = intval($_GET['id_pedido']);
    $sql_count = mysqli_query($con, "select * from pedidos where id_pedido='".$id_pedido."'");
    $count = mysqli_num_rows($sql_count);
    if ($count == 0) {
        echo "<script>alert('Pedido no encontrado.')</script>";
        echo '<script>window.close();</script>';
        exit;
    }
    $sql_factura = mysqli_query($con, "select * from pedidos where id_pedido='".$id_pedido."'");
    $rw_factura = mysqli_fetch_array($sql_factura);
    $numero_pedido = $rw_factura['numero_pedido'];
    $id_cliente = $rw_factura['id_cliente'];
    $total_pedido = $rw_factura['total_pedido'];
    $fecha = $rw_factura['fecha'];
    $tipo_envio = $rw_factura['tipo_envio'];
    $tipo_pago = $rw_factura['tipo_pago'];
    require_once dirname(__FILE__).'/../html2pdf.class.php';
    // get the HTML
    ob_start();
    include dirname('__FILE__').'/res/ver_factura_html.php';
    // $content = ob_get_clean();

   /* try {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', [0, 0, 0, 0]);
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
