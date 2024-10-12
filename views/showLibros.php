<?php
$url = "http://localhost/API_biblioteca/libros/consultarLibro.php";
$json = file_get_contents($url);
$libros = json_decode($json, true);
//echo $libros[0]["titulo"];


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Libros</title>
</head>

<body>
    <h1>Consumiendo los datos de una api</h1>
    <hr>
    <table>
        <tr>
            <td>ID</td>
            <td>TITULO</td>
            <td>AUTOR</td>
            <td>GENERO</td>
            <td>FECHA DE PUBLICACIÓN</td>
        </tr>
        <?php
        for ($i = 0; $i < count($libros); $i++) {
        ?>
            <tr>
                <td><?php echo $libros[$i]["id"]; ?></td>
                <td><?php echo $libros[$i]["titulo"]; ?></td>
                <td><?php echo $libros[$i]["autor"]; ?></td>
                <td><?php echo $libros[$i]["genero"]; ?></td>
                <td><?php echo $libros[$i]["fecha_publicacion"]; ?></td>

            </tr>

        <?php
        }
        ?>
    </table>
</body>

</html>