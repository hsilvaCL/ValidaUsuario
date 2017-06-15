<?php
include 'librerias.php';
session_start();
if(!isset($_SESSION["USR"])){
                
header('Location: '.URL);
exit;

 }
?>

<html>
    <head>
    <title></title>
    </head>
    <body>
         <?php
            if(isset($_SESSION["USR"])){
        ?>
        <div><?php
                $oUsu=$_SESSION["USR"];
                echo $oUsu->nombre;
                ?>
            <a href="<?=URL?>controlador/cierrasesion.php">Cerrar sesión</a>
            <?php }?>
        </div>
        
    </body>

    
</html>