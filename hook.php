<?php

$body = file_get_contents('php://input');
$event_json = json_decode($body);

if ($event_json->type == 'charge.paid'){
 
    
    $message = "<p>".$event_json->data->object->id;
    $message .= "<br>";
    $message .= "<p>".$event_json->data->object->status;
    $message .= "<br>";
    $message .= "<p>".$event_json->data->object->amount;
    $message .= "<br>";
    $message .= "<p>".$event_json->data->object->details->email;
    
    
     $destinatario = "g_rico_c@hotmail.com";
        $asunto = "Compra Confirmada" ;
          $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        
        //para el envío en formato HTML 
     
       mail($destinatario,$asunto,$message,$headers);
    
    http_response_code(200);
}
else
{
    http_response_code(404);
}