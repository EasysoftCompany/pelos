<?php

include 'arrays.php';
require_once("./lib/Conekta.php");

if (!is_null($_POST['mail']) && !is_null($_POST['id_send'])) {

    $message;

    $mail = $_POST['mail'];
    $id = addslashes($_POST['id_send']);
    $nombre = $_POST['nombre'];
    $ap = $_POST['ap'];
    $am = $_POST['am'];
    $tel = $_POST['tel'];
    $cantidad = $_POST['cantidad'];
    $calle = $_POST['calle'];
    $numero = $_POST['numero'];
    $colonia = $_POST['colonia'];
    $mpio = $_POST['mpio'];
    $edo = $_POST['edo'];
    $cp = $_POST['cp'];

    $dia_manana = date('d', time() + 172800);
    $mes_manana = date('m', time() + 172800);
    $ano_manana = date('Y', time() + 172800);
    Conekta::setApiKey("key_9zfeT8G8yYVrCRizd6ywRg");


    $sql = mysqli_connect($host, $usr, $pwd);
    mysqli_select_db($sql, $database);  
    $result = mysqli_query($sql, "SELECT * FROM productos where id = '" . $id . "'");

    while ($query = mysqli_fetch_array($result)) {


        $charge = Conekta_Charge::create(array(
        'description' => $query['description'],
        'reference_id' => $id,
        'amount' => $query['price']*$cantidad,
        'currency' => 'MXN',
        'cash' => array(
        'type' => 'oxxo',
        'expires_at' => $ano_manana . '-' . $mes_manana . '-' . $dia_manana
        ),
        'details' => array(
        'name' => $nombre." ".$ap." ".$am,
        'phone' => $tel,
        'email' => $mail,
        'customer' => array(
        'corporation_name' => null,
        'logged_in' => false,
        'successful_purchases' => null,
        'created_at' => null,
        'updated_at' => null,
        'offline_payments' => 0,
        'score' => 0
        ),
        'line_items' => array(
        array(
        'name' => $id,
        'description' => $query['description'],
        'unit_price' => $query['price'],
        'quantity' => $cantidad,
        'sku' => $id,
        'type' => 'Anime'
        )
        ),
        'shipment' => array(
        'carrier' => 'estafeta',
        'service' => 'national',
        'price' => 20000,
        'address' => array(
        'street1' => $calle,
        'street2' => $numero,
        'street3' => $colonia,
        'city' => $mpio,
        'state' => $edo,
        'zip' => $cp,
        'country' => 'Mexico'
        )
        ))
        ));

        $message .= '<html>';
        $message .= '<head>';
        $message .= '<link href="http://belldandy.esy.es/css/payment.css" rel="stylesheet" type="text/css"/ >';
        $message .= '<link href="http://belldandy.esy.es/css/paymentprint.css" rel="stylesheet" type="text/css"/ media="print">';
        $message .= '</head>';

        $message .= '<body onload="window.print();">';
        $message .= '<div id="pay">';
        $message .= '<br><br>';
        $message .='<div id="OXXO">';
        $message .= '<center><h2>Ficha de Pago en OXXO</h2></center>';
        $message .='</div>';
        $message .= '<br><br><br>';
        $costo = $charge->amount / 100;
        $message .= '<br><label id="p"> Id Compra: ' . $charge->id . '</label><br>';
        $message .= '<br><label id="p"> Total: $' . $costo . '</label><br>';
        $message .= '<br><label id="p"> Descripcion: ' . $charge->description . '</label><br>';
        $message .= '<br><label id="p"> SKU: ' . $charge->reference_id . '</label><br>';
        $message .= '<br><label id="p"> Cantidad: ' . $cantidad . '</label><br>';
        $message .= '<br><label id="p"> Fecha de Expiracion: ' . date("j-M-Y g:i a", $charge->payment_method->expires_at) . '</label><br><br><br>';
        $message .= '<img src="' . $charge->payment_method->barcode_url . '" id="img" />';
        $message .= '<br><label id="barcode">' . $charge->payment_method->barcode . '</label>';
        $message .= '<br><label id="nota">Recuerde que OXXO S.A. de C.V. cobra una comision adicional al costo aqui mostrado de $9.00 MXN</label>';
        
        $message .= '<br><br><label id="p"> NOTA: Despues de haber pagado, recuerde enviar su comprobante de pago a: ventas@belldandy.esy.es</label>';
        $message .= '<br><label id="p"> Adicionalmente puede incluir referencias adicionales para el envio de su producto o coordinar la entrega del mismo</label>';
        
        $message .= '<br><br><input type="button" class="button" id="imprimir" value="Imprimir P&aacute;gina" onclick="window.print();">';
        $message .= '</div>';
        $message .= '</body>';

        $message .= '</html>';
        
        $venta = mysqli_query($sql, "call sp_venta('".$charge->id."','".$id."',".$cantidad.")");
        echo $message;

        $destinatario = $mail;
        $asunto = "Compra del producto: <<" . $query['description'] . ">>";

        //para el envío en formato HTML 
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

        //dirección de respuesta, si queremos que sea distinta que la del remitente 
        $headers .= "Reply-To: " . $mail;

        mail($destinatario, $asunto, $message, $headers);
    }
} else {
    echo '<script>'
    . 'window.location="./500.html"'
    . '</script>';
}

    