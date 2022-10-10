<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = "982109821"; $nombreBaseDatos = "crudAngular";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);

//Inserta un nuevo registro y recepciona en método post los datos de nombre y correo

// Consulta datos y recepciona una clave para listar dichos datos con dicha clave

//borrar pero se le debe de enviar una clave ( para borrado )



// Actualiza datos pero recepciona datos de nombre, correo y una clave para realizar la actualización

// Consulta todos los registros de la tabla crudAngular


?>

