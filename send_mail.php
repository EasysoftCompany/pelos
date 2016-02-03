<?php
 include 'arrays.php';
 require_once("./lib/Conekta.php");

if(!is_null($_POST['mail'])&&!is_null($_POST['id'])){
    
     $mail = $_POST['mail'];
     $id = $_POST['id'];
    
        Conekta::setApiKey("key_9zfeT8G8yYVrCRizd6ywRg");
    
        $charge = Conekta_Charge::create(array(
                'description'=> $desc[$id-1],
                'reference_id'=> $id,
                'amount'=> $price[$id-1].'00',
                'currency'=>'MXN',
                'cash'=> array(
                  'type'=> 'oxxo',
                  'expires_at'=> '2016-02-12'
                ),
                'details'=> array(
                  'name'=> null,
                  'phone'=> null,
                  'email'=> $mail,
                  'customer'=> array(
                    'corporation_name'=> null,
                    'logged_in'=> false,
                    'successful_purchases'=> null,
                    'created_at'=> null,
                    'updated_at'=> null,
                    'offline_payments'=> 0,
                    'score'=> 0
                  ),
                  'line_items'=> array(
                    array(
                      'name'=> 'Manta',
                      'description'=> $desc[$id-1],
                      'unit_price'=> $price[$id-1].'00',
                      'quantity'=> 1,
                      'sku'=> 'mnt_'.$id,
                      'type'=> 'Anime'
                    )
                  ),

                )
              ));
        
        echo '<html>';
        
         echo '<head>';    
            echo '<link href="css/payment.css" rel="stylesheet" type="text/css"/>';
         echo '</head>';
         
         echo '<body>';
            echo '<div id="pay">';
                echo '<h2>Ficha de Pago en OXXO</h2><br><br>';
                
                echo '<img src="'.$charge->payment_method->barcode_url.'"/>';
                echo '<br><label>'.$charge->payment_method->barcode.'</label>';
            echo '</div>';
        echo '</body>';
        
         echo '</html>';
        
        /*
        $destinatario = "camg.camg62@gmail.com";
        $asunto = "Solicitan informacion de articulo";
        $cuerpo = ' 
        <html> 
        <head> 
           <title>Informacion de articulo</title> 
        </head> 
        <body> 
        <h1>Hola!</h1> 
        <p> 
            Han solicitado mas informacion sobre el producto con identificador <b>'.$id.'</b> correspondiente a la descripcion '.$desc[$id-1].', Porfavor envie informacion al siguiente E-mail: <b>'. $mail.'</b>
        </p> 
        </body> 
        </html> 
        '; 

        //para el envío en formato HTML 
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

        //dirección de respuesta, si queremos que sea distinta que la del remitente 
        $headers .= "Reply-To: ".$mail; 

        mail($destinatario,$asunto,$cuerpo,$headers);
        
        echo '<script>'
        . 'alert("Ha Solicitado informacion correctamente, porfavor espera la respuesta!");'
        . 'window.location="./"'       
        . '</script>';
         * 
         */
        
        
   }
   else
   {
       echo '<script>'
        . 'window.location="./500.html"'       
        . '</script>';
   }
    
