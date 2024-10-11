<?php
include_once "config/database.php";

$database = new Database();
$connection = $database->getConnection();

if ($connection) {
    echo "Conexión exitosa a la base de datos!";
} else {
    echo "Error al conectar a la base de datos.";
}
?>
