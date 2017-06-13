<?php

include '../librerias.php';

$oUsuario=new Usuario($_REQUEST["nomusu"],$_REQUEST["claveusu"]);

if($oUsuario->VerificaAcceso()){
    echo "Todo Bien";
}
else{
    echo "Todo Mal";  
}
