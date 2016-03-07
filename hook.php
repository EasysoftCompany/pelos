<?php

include 'arrays.php';

$body = file_get_contents('php://input');
$event_json = json_decode($body);

if ($event_json->type == 'charge.paid'){
 
    $sql = mysqli_connect($host, $usr, $pwd);
    mysqli_select_db($sql, $database);
    $update_tbl = mysqli_query($sql, "call sp_get_cant_by_id('".$event_json->data->object->id."')");
    
    
    

     while ($query = mysqli_fetch_array($update_tbl)) {
         
         $sql2 = mysqli_connect($host, $usr, $pwd);
        mysqli_select_db($sql2, $database);
        $result = mysqli_query($sql2, "UPDATE productos SET cant = cant - ".$query['cantidad']." where id = '".$event_json->data->object->reference_id."';");

         
         
        $message = "<p>Cantidad: ".$query['cantidad']."<p><br>";   
        $message .= "<p> ID: ".$event_json->data->object->id;
        $message .= "<br>";
        $message .= "<p> SKU: ".$event_json->data->object->reference_id;
        $message .= "<br>";
        $message .= "<p> Status: ".$event_json->data->object->status;
        $message .= "<br>";
        $message .= "<p> Total: $".($event_json->data->object->amount/100.00);
        $message .= "<br>";
        $message .= "<p> Nombre Cliente: ".$event_json->data->object->details->name;  
        $message .= "<br>";
        $message .= "<p> Telefono Cliente: ".$event_json->data->object->details->phone;  
        $message .= "<br>";
        $message .= "<p> Mail Cliente: ".$event_json->data->object->details->email;
     }
    
    
        //$destinatario = "g_rico_c@hotmail.com,camg.camg62@gmail.com";
        $destinatario = "g_rico_c@hotmail.com";
    $asunto = "Compra Confirmada ID:".$event_json->data->object->id ;
          $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        
        //para el envío en formato HTML 
     
       mail($destinatario,$asunto,$message,$headers);
    
    http_response_code(200);
}
else
    if($event_json->type == 'charge.created')
    {
        http_response_code(200);
    }
    else
    {
    http_response_code(404);
    }