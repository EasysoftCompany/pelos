<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>.::Belldandy::.</title>
        
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="./materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <link href="css/frontend.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/png" href="css/favicon.ico" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
        <script src="css/JQmain.js" type="text/javascript"></script>
        <link href="SDWB/shadowbox.css" rel="stylesheet" type="text/css"/>
        <script src="SDWB/shadowbox.js" type="text/javascript"></script>
        <script type='text/javascript'>
            Shadowbox.init({
                overlayColor: "#000",
                overlayOpacity: "0.6"
            });
        </script>
        
    </head>
    <body>
        <div id="head">
            <h2>.::Belldandy::.</h2>   
        </div>
        <div id="menuIteminfo">Bienvenida</div>
        <div id="menuIteminfo2">Productos</div>
        <div id="menuIteminfo3"><img src="../css/help.png" style="height: 4em;width: 4em;"></div>
        
        
        <div id="info3">
            
        </div>
        
        <div id="info2">
        
            <table>
            <?php
            include 'arrays.php';
            
            $sql = mysqli_connect($host,$usr,$pwd);
            mysqli_select_db($sql,$database);
                $result = mysqli_query($sql, "SELECT * FROM productos");
            $cont = 0;
               while($query = mysqli_fetch_array($result))
                {

                        echo '<td>';
                        echo '<a class="cursorimg" href="../information.php?id_send='.$query['id'].'" title="Imagen '.$query['id'].'" ><img src="galeria/'.$query['id'].'.jpg" style="width:150px;height:100px;border:7px solid #1c1c1c;padding:0px;margin-left: 3em;"/></a>';
                        echo '</td>';
                        $cont++;
                        if($cont%6 == 0)
                        {
                            $cont = 0;
                            echo'<tr></tr>';
                        }
//                        
//                        echo '<td>';
//                       echo 'Precio $'.$query['price'].' Descripciòn: '.$query['description'].' Existencias: '.$query['cant'];
//                       echo '</td>';
                       

//                        echo '<td>';
//                            echo '<form action="./send_mail.php" method="POST">';
//                               echo '<label>Para comprar el producto ingrese su correo electronico</label><br/><br/>';
//                               echo '<label>Email:</label>';
//                               echo '<input type="email" name="mail" placeholder="someone@domain.com" required><br>';
//                               echo '<input type="hidden" name="id" value="'.$x.'">';
//                               echo '<input class="button" type="submit" value="comprar">';                           
//                            echo '</form>';
//                        echo '</td>';
                   
                    
                }
            
            ?>
           </table>          
        </div>

                
        <div id="info1">
            <p>Algunas palabras de interes...</p>
        </div>
        
        
        
        <div id="foot">
            <a href="#">Belldandy<br>
                "Slogan Magico"</a>
        </div>
    </body>
</html>


