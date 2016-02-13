<?php

include 'arrays.php';

$id = $_GET['id_send'];


      
                        echo '<p>Precio $'.$price[$id-1].' Descripciòn: '.$desc[$id-1].'</p>';
     
                        
                            echo '<form action="./send_mail.php" method="POST">';
                               echo '<label>Para comprar el producto ingrese su correo electronico</label><br/><br/>';
                               echo '<label>Email:</label>';
                               echo '<input type="email" name="mail" placeholder="someone@domain.com" required><br>';
                               echo '<input type="hidden" name="id" value="'.$id.'">';
                               echo '<input class="button" type="submit" value="comprar">';                           
                            echo '</form>';

            ?>
