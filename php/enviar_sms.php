<?php



include 'api_client/textveloper.api.client.php';


$sms = new api();

$parameters = array();
$parameters['cuenta_token'] 	= 'CUENTA_TOKEN';
$parameters['aplicacion_token'] = 'APLICACION_TOKEN';
$parameters['telefono'] 		= 'NUMERO_TELEFONO';
$parameters['mensaje'] 			= 'MENSAJE';

// true:  Si deseas mostrar la respuesta en formato JSON que retorna la solicitud
// false: Si no deseas mostrar  la respuesta en formato JSON que retorna la solicitud

$sms->enviar($parameters, true);


?>