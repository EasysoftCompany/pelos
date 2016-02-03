<?php
 include 'arrays.php';

if(!is_null($_POST['mail'])&&!is_null($_POST['id'])){
        $mail = $_POST['mail'];
        $id = $_POST['id'];

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
   }
   else
   {
       echo '<script>'
        . 'window.location="./500.html"'       
        . '</script>';
   }
    
