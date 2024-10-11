<?php

// Mostrar errores y advertencias
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Habilitar CORS para permitir solicitudes desde diferentes dominios (opcional)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Incluir archivos necesarios
include_once "../config/database.php";
include_once "../object/libro.php";

// Crear conexión a la base de datos
$database = new Database();
$db = $database->getConnection();
$libro = new Libro($db);

// Obtener datos JSON de la solicitud
$data = json_decode(file_get_contents("php://input"));

// Verificar que se recibió el ID del libro
if(!empty($data->id)){
    // Asignar nuevos valores
    $libro->id = $data->id; 
    $libro->titulo = $data->titulo;
    $libro->autor = $data->autor;
    $libro->genero = $data->genero;
    $libro->fecha_publicacion = $data->fecha_publicacion;

    // Intentar modificar el libro
    if($libro->modify()){
        http_response_code(200);
        echo json_encode(array("mensaje" => "Libro modificado correctamente."));
    } else {
        http_response_code(503);
        echo json_encode(array("mensaje" => "No se pudo modificar el libro."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("mensaje" => "Datos incompletos."));
}

?>
