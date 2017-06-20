<?php
/*Si no esta hecho el login se regresa a la página principal*/
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
    <link href="css/estiloprincipal.css" rel="stylesheet" type="text/css"/>
    <link href="css/font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
         <?php
            if(isset($_SESSION["USR"])){
        ?>
        <div id="contenedor"><?php
                $oUsu=$_SESSION["USR"];
                echo $oUsu->nombre;
                ?>
            <a href="<?=URL?>controlador/cierrasesion.php">Cerrar sesión</a>
            <?php }?>
            <div id="header"></div>
            <div id="menulateral"><?php include('menu.php');?></div>
            <div id="contenido"></div>
        </div>
        
    </body>

    
</html>