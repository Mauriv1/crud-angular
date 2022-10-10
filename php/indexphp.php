<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET,POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Conecta a la base de datos  con usuario, contraseña y nombre de la BD
$servidor = "localhost"; $usuario = "root"; $contrasenia = "982109821"; $nombreBaseDatos = "crudAngular";
$conexionBD = new mysqli($servidor, $usuario, $contrasenia, $nombreBaseDatos);

//Inserta un nuevo registro y recepciona en método post los datos de descripcion y codigo
if(isset($_GET["add"])){
    $data = json_decode(file_get_contents("php://input"));
    $descripcion=$data->descripcion;
    $codigo=$data->codigo;
        if(($codigo!="")&&($descripcion!="")){

    $sqlcrudAngular = mysqli_query($conexionBD,"INSERT INTO crudAngular(descripcion,codigo) VALUES('$descripcion','$codigo') ");
    echo json_encode(["success"=>1]);
        }
    exit();
}

// Consulta todos los registros de la tabla crudAngular
$sqlcrudAngular = mysqli_query($conexionBD,"SELECT * FROM crudAngular ");
if(mysqli_num_rows($sqlcrudAngular) > 0){
    $crudAngular = mysqli_fetch_all($sqlcrudAngular,MYSQLI_ASSOC);
    echo json_encode($crudAngular);
}
else{ echo json_encode([["success"=>0]]); 
}

//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_GET["borrar"])){
    $sqlEmpleaados = mysqli_query($conexionBD,"DELETE FROM empleados WHERE id=".$_GET["borrar"]);
    if($sqlEmpleaados){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}


// Actualiza datos pero recepciona datos de nombre, correo y una clave para realizar la actualización

// Consulta datos y recepciona una clave para listar los datos con dicha clave


?>

