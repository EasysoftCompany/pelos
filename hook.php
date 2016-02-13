<?php

$body = file_get_contents('php://input');
$event_json = json_decode($body);

if ($event_json->type == 'charge.paid'){
 
    
    $message = $event_json->data->object->id;
    $message .= "";
    $message .= $event_json->data->object->status;
    $message .= "";
    $message .= $event_json->data->object->amount;
    $message .= "";
    $message .= $event_json->data->object->details->email;
    
    
     $destinatario = "g_rico_c@hotmail.com";
        $asunto = "Compra Confirmada" ;
        
        //para el envío en formato HTML 
     
       mail($destinatario,$asunto,$message,$headers);
    
    http_response_code(200);
}
else
{
    http_response_code(404);
}