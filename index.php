<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>.::Belldandy::.</title>

        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!--<link href="css/frontend.css" rel="stylesheet" type="text/css"/>-->

        <link rel="icon" type="image/png" href="css/favicon.ico" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
        <script src="css/JQmain.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <link href="css/index.css" rel="stylesheet" type="text/css"/>
        <!--        <link href="SDWB/shadowbox.css" rel="stylesheet" type="text/css"/>
                <script src="SDWB/shadowbox.js" type="text/javascript"></script>
                <script type='text/javascript'>
                    Shadowbox.init({
                        overlayColor: "#000",
                        overlayOpacity: "0.6"
                    });
                </script>-->

    </head>
    <body>
        <nav>
            <div class="nav-wrapper blue darken-1" >

                <a href="#" class="brand-logo center">.::Belldandy::.</a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="#" id="menuIteminfo">Bienvenida</a></li>
                    <li><a href="#" id="menuIteminfo2">Productos</a></li>
                    <li><a href="#" id="menuIteminfo3">Ayuda</a></li>
                </ul>

                <ul class="side-nav" id="mobile-demo">
                    <li><a href="#" id="menuIteminfo4">Bienvenida</a></li>
                    <li><a href="#" id="menuIteminfo5">Productos</a></li>
                    <li><a href="#" id="menuIteminfo6">Ayuda</a></li>
                </ul>

            </div>
        </nav>
        
        <main>
        <!--        <div id="menuIteminfo">Bienvenida</div>
                <div id="menuIteminfo2">Productos</div>
                <div id="menuIteminfo3"><img src="../css/help.png" style="height: 4em;width: 4em;"></div>-->

        
        <div id="info3">
            <div class="container">
                <p>Ayuda en Construccion</p>
            </div>
        </div>

        <div id="info2">

            <table class="responsive-table">
                <?php
                include 'arrays.php';

                $sql = mysqli_connect($host, $usr, $pwd);
                mysqli_select_db($sql, $database);
                $result = mysqli_query($sql, "SELECT * FROM productos");
                $cont = 0;
                while ($query = mysqli_fetch_array($result)) {

                    echo '<td>';
                    echo '<a class="cursorimg" href="../information.php?id_send=' . $query['id'] . '" title="Imagen ' . $query['id'] . '" ><img class="hoverable responsive-img" src="galeria/' . $query['id'] . '.jpg" style="width:150px;height:100px;border:2px solid #1c1c1c;padding:0px;margin-left: 3em;"/></a>';
                    echo '</td>';
                    $cont++;
                    if ($cont % 5 == 0) {
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
             <div class="container">
                <p>Bienvenido</p>
            </div>
        </div>
        
        </main>


        <footer class="page-footer blue darken-2">
            <div class="footer-copyright">
                <div class="container">
                    © 2016 Belldandy
                    <a class="grey-text text-lighten-4 right" href="terminos_y_condiciones.html">Terminos y condiciones</a>
                </div>
            </div>
        </footer>


        <!--        <div id="foot">
                    <a href="#">Belldandy<br>
                        "Slogan Magico"</a>
                </div>-->
    </body>
</html>


