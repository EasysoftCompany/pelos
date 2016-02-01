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
        
    <form action="./send_mail.php" method="POST">
        
        <input type="hidden" name="id" value="">
        <input type="submit" value="Solicitar">
        
    </form>
    </head>
    <body>
        <div id="head">
            <h2>.::Belldandy::.</h2>   
        </div>
        <div id="menuIteminfo">Bienvenida</div>
        <div id="menuIteminfo2">Productos</div>
        
        <div id="info1">
            <p>Algunas palabras de interes...</p>
        </div>
        
        <div id="info2">
        
            <table>
            <?php
            $price = [100,200];
            $desc = ['Manta Bien chida','Manta Kawaii'];
                for($x=1;$x<=2;$x++)
                {
                    echo '<tr>';
                        echo '<td>';
                        echo '<a href="galeria/img'.$x.'.jpg" rel="shadowbox[galeria1]" title="Imagen '.$x.'" ><img src="galeria/img'.$x.'.jpg" style="width:150px;height:100px;border:7px solid #1c1c1c;padding:0px;margin-left: 3em;"/></a>';
                        echo '</td>';
                        
                        echo '<td>';
                        echo 'Precio $'.$price[$x-1].' Descripciòn: '.$desc[$x-1];
                        echo '</td>';
                        
                        echo '<td>';
                            echo '<form action="./send_mail.php" method="POST">';
                               echo '<label>Ingrese sus datos si desea mas informacion</label><br/><br/>';
                               echo '<label>Email:</label>';
                               echo '<input type="email" name="mail" placeholder="someone@domain.com" required><br>';
                               echo '<input type="hidden" name="id" value="'.$x.'">';
                               echo '<input type="submit" value="Solicitar mas Informacion">';                           
                            echo '</form>';
                        echo '</td>';
                    echo '</tr>';
                    
                }
            
            ?>
           </table>
            
        
        </div>

        
        
        
        
        <div id="foot">
            <a href="#">Belldandy<br>
                "Slogan Magico"</a>
        </div>
    </body>
</html>


