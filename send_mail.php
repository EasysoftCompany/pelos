<?php
 include 'arrays.php';
 require_once("./lib/Conekta.php");

if(!is_null($_POST['mail'])&&!is_null($_POST['id'])){
    
        Conekta::setApiKey("key_9zfeT8G8yYVrCRizd6ywRg");
    
        $charge = Conekta_Charge::create(array(
                'description'=> 'Stogies',
                'reference_id'=> '9839-wolf_pack',
                'amount'=> 20000,
                'currency'=>'MXN',
                'cash'=> array(
                  'type'=> 'oxxo',
                  'expires_at'=> '2016-02-12'
                ),
                'details'=> array(
                  'name'=> 'Arnulfo Quimare',
                  'phone'=> '403-342-0642',
                  'email'=> 'logan@x-men.org',
                  'customer'=> array(
                    'corporation_name'=> 'Conekta Inc.',
                    'logged_in'=> true,
                    'successful_purchases'=> 14,
                    'created_at'=> 1379784950,
                    'updated_at'=> 1379784950,
                    'offline_payments'=> 4,
                    'score'=> 9
                  ),
                  'line_items'=> array(
                    array(
                      'name'=> 'Box of Cohiba S1s',
                      'description'=> 'Imported From Mex.',
                      'unit_price'=> 20000,
                      'quantity'=> 1,
                      'sku'=> 'cohb_s1',
                      'type'=> 'food'
                    )
                  ),
                  'billing_address'=> array(
                    'street1'=>'77 Mystery Lane',
                    'street2'=> 'Suite 124',
                    'street3'=> null,
                    'city'=> 'Darlington',
                    'state'=>'NJ',
                    'zip'=> '10192',
                    'country'=> 'Mexico',
                    'phone'=> '77-777-7777',
                    'email'=> 'purshasing@x-men.org'
                  ),
                  'shipment'=> array(
                    'carrier'=> 'estafeta',
                    'service'=> 'international',
                    'price'=> 20000,
                    'address'=> array(
                      'street1'=> '250 Alexis St',
                      'street2'=> null,
                      'street3'=> null,
                      'city'=> 'Red Deer',
                      'state'=> 'Alberta',
                      'zip'=> 'T4N 0B8',
                      'country'=> 'Canada'
                    )
                  )
                )
              ));
        
        $mail = $_POST['mail'];
        $id = $_POST['id'];
        echo $charge->payment_method->barcode_url;

        
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
    
