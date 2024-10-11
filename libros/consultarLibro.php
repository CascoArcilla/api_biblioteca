<?php
// Mostrar errores y advertencias
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Habilitar CORS para permitir solicitudes desde diferentes dominios (opcional)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Datos de conexión a la base de datos
$host = "localhost"; // Cambia esto por tu host si es diferente
$db_name = "biblioteca"; // Cambia esto por el nombre de tu base de datos
$username = "root"; // Usuario de la base de datos
$password = "1e3l5i10o"; // Contraseña del usuario de la base de datos

// Crear conexión a la base de datos
$conn = new mysqli($host, $username, $password, $db_name);

// Establecer el conjunto de caracteres en UTF-8
$conn->set_charset("utf8mb4");

// Verificar si la conexión tuvo éxito
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Inicializar el array
$libros = array();

// Consulta SQL para obtener todos los registros de la tabla 'libros'
$sql = "SELECT id, titulo, autor, genero, fecha_publicacion FROM libros;";
$result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

// Verificar si hay registros
if ($result) {
    if ($result->num_rows > 0) {
        // Recorrer los registros y almacenarlos en el array
        while ($row = $result->fetch_assoc()) {
            array_push($libros, $row);
        }
    }
}

// Devolver los registros en formato JSON
echo json_encode($libros);

// Cerrar la conexión a la base de datos
$conn->close();
?>
