<?php

// Recibir SMS Textveloper
function WebhooksParse($telefono,$mensaje){
    $msg =   $telefono + ' dice: '+ $mensaje;
    return $msg;
}

// Validamos que se cumpla el protocolo HTTP GET
if(isset($_GET)){
    // Mostramos lo recibido.
    echo WebhooksParse($telefono,$mensaje);
}

?>