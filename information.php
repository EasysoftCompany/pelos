<html>
    <head>
        <meta charset="UTF-8">
        <title>.::Datos del producto::.</title>
        
        <link href="css/frontend.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <body>
        
        <div id="head">
            <h2>.::Belldandy::.</h2>   
        </div>

        <div id="info1">
<?php

include 'arrays.php';
$id = addslashes($_GET['id_send']);

$sql = mysqli_connect($host,$usr,$pwd);
            mysqli_select_db($sql,$database);
                $result = mysqli_query($sql, "SELECT * FROM productos where id = '".$id."'");

while($query = mysqli_fetch_array($result))
                {

$price = $query['price']/100;
        
        echo '<img src="galeria/'.$query['id'].'.jpg" style="width:250px;height:200px;border:7px solid #1c1c1c;padding:0px;margin-left: 3em;"/>';
      
                        echo '<p>Precio $'.$price.' Descripciòn: '.$query['description'].' Existencias: '.$query['cant'].'</p>';
     
                        
                            echo '<form action="./send_mail.php" method="POST">';
                               echo '<label>Para comprar el producto ingrese su correo electronico</label><br/><br/>';
                               echo '<label>Email:</label>';
                               echo '<input type="email" name="mail" placeholder="someone@domain.com" required><br>';
                               echo '<input type="hidden" name="id_send" value="'.$id.'">';
                               echo '<input class="button" type="submit" value="comprar">';                           
                            echo '</form>';
                }
            ?>
        </div>
        <div id="foot">
            <a href="#">Belldandy<br>
                "Slogan Magico"</a>
        </div>
    </body>
</html>