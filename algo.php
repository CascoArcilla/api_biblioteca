<?php
$url = "http://localhost/API_biblioteca/libros/consultarLibro.php";
$moc = "https://chartmand-first-space.hf.space/api/glucosa/43m8dz7";
$response = file_get_contents($moc);
if ($response === FALSE) {
    echo "Error al consumir la API.";
} else {
    $responseData = json_decode($response, true);
    print_r($responseData);
}
?>