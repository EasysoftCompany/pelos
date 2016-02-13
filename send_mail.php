<?php

include 'arrays.php';
require_once("./lib/Conekta.php");

if (!is_null($_POST['mail']) && !is_null($_POST['id_send'])) {

    $message;

    $mail = $_POST['mail'];
    $id = addslashes($_POST['id_send']);

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
                    'amount' => $query['price'],
                    'currency' => 'MXN',
                    'cash' => array(
                        'type' => 'oxxo',
                        'expires_at' => $ano_manana . '-' . $mes_manana . '-' . $dia_manana
                    ),
                    'details' => array(
                        'name' => null,
                        'phone' => null,
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
                                'quantity' => 1,
                                'sku' => $id,
                                'type' => 'Anime'
                            )
                        ),
                    )
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
        $message .= '<br><label id="p"> Costo: $' . $costo . '</label><br>';
        $message .= '<br><label id="p"> Descripcion: ' . $charge->description . '</label><br>';
        $message .= '<br><label id="p"> SKU: ' . $charge->reference_id . '</label><br>';
        $message .= '<br><label id="p"> Fecha de Expiracion: ' . date("j-M-Y g:i a", $charge->payment_method->expires_at) . '</label><br><br><br>';
        $message .= '<img src="' . $charge->payment_method->barcode_url . '" id="img" />';
        $message .= '<br><label id="barcode">' . $charge->payment_method->barcode . '</label>';
        $message .= '<br><label id="nota">Recuerde que OXXO S.A. de C.V. cobra una comision adicional al costo aqui mostrado de $9.00 MXN</label>';
        $message .= '<br><br><input type="button" class="button" id="imprimir" value="Imprimir P&aacute;gina" onclick="window.print();">';
        $message .= '<br><br><br><label id="ip"> Su direccion IP:' . $_SERVER['REMOTE_ADDR'] . ' ha sido guardada por seguridad</label>';
        $message .= '</div>';
        $message .= '</body>';

        $message .= '</html>';

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

    