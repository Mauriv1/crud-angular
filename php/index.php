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

// Actualiza datos pero recepciona datos de nombre, correo y una clave para realizar la actualización
if(isset($_GET["edit"])){

    $data = json_decode(file_get_contents("php://input"));

    $id=(isset($data->id))?$data->id:$_GET["edit"];
    $descripcion=$data->descripcion;
    $codigo=$data->codigo;

    $sqlcrudAngular = mysqli_query($conexionBD,"UPDATE crudAngular SET descripcion='$descripcion',codigo='$codigo' WHERE id='$id'");
    echo json_encode(["success"=>1]);
    exit();
}

//borrar pero se le debe de enviar una clave ( para borrado )
if (isset($_GET["delete"])){
    $sqlcrudAngular = mysqli_query($conexionBD,"DELETE FROM crudAngular WHERE id=".$_GET["delete"]);
    if($sqlcrudAngular){
        echo json_encode(["success"=>1]);
        exit();
    }
    else{  echo json_encode(["success"=>0]);
    }
}

// Consulta datos y recepciona una clave para listar los datos con dicha clave

if (isset($_GET["list"])){
    $sqlcrudAngular = mysqli_query($conexionBD,"SELECT * FROM crudAngular WHERE id=".$_GET["list"]);
    if(mysqli_num_rows($sqlcrudAngular) > 0){
        $crudAngular = mysqli_fetch_all($sqlcrudAngular,MYSQLI_ASSOC);
        echo json_encode($crudAngular);
        exit();
    }
    else{  echo json_encode(["success"=>0]); }
}
?>
