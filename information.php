<html>
    <head>
        <meta charset="UTF-8">
        <title>.::Datos del producto::.</title>
 
       <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>


        <link rel="icon" type="image/png" href="css/favicon.ico" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
        
    </head>
    
    <body>
        
        <nav>
            <div class="nav-wrapper blue lighten-3" >
                <a href="#" class="brand-logo center">.::Belldandy::.</a>
            </div>
        </nav>
        
        <main>

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

echo'<br/>';
                echo '<div class="container">';
        
                        echo '<img class="hoverable responsive-img" src="galeria/'.$query['id'].'.jpg" style="width:250px;height:200px;border:7px solid #1c1c1c;padding:0px;margin-left: 3em;"/>';
      
                        echo '<p>Precio $'.$price.' Descripciòn: '.$query['description'].' Existencias: '.$query['cant'].'</p>';
                 echo '</div>';   
                
                 
                      echo '<div class="container">';
                            echo '<form action="./send_mail.php" method="POST">';
                               echo '<label>Para poder comprar el producto, complete el siguiente formulario</label><br/><br/>';
                                echo '<label>Si desea retirar su producto personalmente omita los datos de domicilio</label><br/><br/>';
                              
                               echo'        <div class="input-field col s12">
                                            <input id="email" name="mail" type="email" class="validate" required>
                                            <label for="email" data-error="Error!" data-success="Ok!">Email</label>
                                            </div>
                                            
                                             <div class="input-field col s12">
                                            <input id="tel" name="tel" type="number" class="validate" >
                                            <label for="tel" data-error="Error!" data-success="Ok!">No. Telefono</label>
                                            </div>   

                                             <div class="input-field col s12">
                                            <input value="1" id="cantidad" name="cantidad" type="number" class="validate">
                                            <label for="cantidad" data-error="Error!" data-success="Ok!">Cantidad</label>
                                            </div>                                           

';
                               
                               echo'        <div class="input-field col s12">
                                            <input id="name" name="nombre" type="text" class="validate" required>
                                            <label for="name" data-error="Error!" data-success="Ok!">Nombre(s)</label>
                                            </div>
                                            
                                            <div class="input-field col s12">
                                            <input id="ap" name="ap" type="text" class="validate" required>
                                            <label for="ap" data-error="Error!" data-success="Ok!">Apellido Paterno</label>
                                            </div>
                                            
                                            <div class="input-field col s12">
                                            <input id="am" name="am" type="text" class="validate" required>
                                            <label for="am" data-error="Error!" data-success="Ok!">Apellido Materno</label>
                                            </div>
                                            
                                            <div class="input-field col s12">
                                            <input id="calle" name="calle" type="text" class="validate">
                                            <label for="calle" data-error="Error!" data-success="Ok!">Calle</label>
                                            </div>
                                            
                                            <div class="input-field col s12">
                                            <input id="numero" name="numero" type="number" class="validate">
                                            <label for="numero" data-error="Error!" data-success="Ok!">Numero</label>
                                            </div>
                                            
                                            <div class="input-field col s12">
                                            <input id="colonia" name="colonia" type="text" class="validate">
                                            <label for="colonia" data-error="Error!" data-success="Ok!">Colonia</label>
                                            </div>
                                           

                                            <div class="input-field col s12">
                                            <input id="mpio" name="mpio" type="text" class="validate">
                                            <label for="mpio" data-error="Error!" data-success="Ok!">Delegacion/Municipio</label>
                                            </div>
                                            
                                            <div class="input-field col s12">
                                            <input id="edo" name="edo" type="text" class="validate">
                                            <label for="edo" data-error="Error!" data-success="Ok!">Estado</label>
                                            </div>
 
                                            <div class="input-field col s12">
                                            <input id="cp" name="cp" type="number" class="validate">
                                            <label for="cp" data-error="Error!" data-success="Ok!">Codigo Postal</label>
                                            </div>
                                            ';
                               
                               
                               echo '<input type="hidden" name="id_send" value="'.$id.'"><br><br>';
                               echo '<button class="btn waves-effect waves-light" type="submit"> Comprar'
                               . '<i class="material-icons right">send</i>'
                                       . '</button>';                           
                            echo '</form>';
                            
                            echo '<button class="btn waves-effect waves-light" type="button" onclick="javascript:history.back(1)"> Regresar
                                        <i class="material-icons right">replay</i>
                                  </button>';    
                            
                                 echo '</div>';
                }
            ?>
        </div>
            
       </main>
        
        
        
        <footer class="page-footer blue darken-2">
            <div class="footer-copyright">
                <div class="container">
                    © 2016 Belldandy
                    <a class="grey-text text-lighten-4 right" href="#!">belldandy.esy.es</a>
                </div>
            </div>
        </footer>
    </body>
</html>