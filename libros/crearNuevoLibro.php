<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/JSON; charset=UTF-8");

include_once __DIR__ . '/../config/database.php';
include_once __DIR__ . '/../object/libro.php';

$database = new Database();
$db = $database->getConnection();
$libro = new Libro($db);

$data = json_decode(file_get_contents("php://input"));

if(!empty($data->titulo)){
    $libro->titulo = $data->titulo;
    $libro->autor = $data->autor;
    $libro->genero = $data->genero;
    $libro->fecha_publicacion = $data->fecha_publicacion;

    if($libro->create()){
        http_response_code(201);
        echo json_encode(array("Estatus" => "Libro registrado correctamente."));
    } else {
        http_response_code(503);
        echo json_encode(array("Mensaje" => "No se pudo registrar el libro."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("Error" => "Datos incompletos."));
}

?>
