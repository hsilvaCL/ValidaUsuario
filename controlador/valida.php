<?php

session_start();

include '../librerias.php';

$oUsuario=new Usuario($_REQUEST["nomusu"],$_REQUEST["claveusu"]);

if($oUsuario->VerificaAcceso()){
    echo "Todo Bien";
    $_SESSION["USR"]=$oUsuario;
}
else{
    echo "Todo Mal";  
}
