<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Incluye la conexión a la base de datos y la clase Libro
include_once "../config/database.php";
include_once "../object/libro.php";

$database = new Database();
$db = $database->getConnection();
$libro = new Libro($db);

// Obtén el ID del libro a eliminar desde la solicitud
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    if ($libro->delete($data->id)) {
        http_response_code(200);
        echo json_encode(array("Estatus" => "Libro eliminado correctamente."));
    } else {
        http_response_code(503);
        echo json_encode(array("Mensaje" => "No se pudo eliminar el libro."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("Error" => "Datos incompletos."));
}

?>
