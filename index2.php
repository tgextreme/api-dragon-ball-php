<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Personaje</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 100px;
            height: auto;
        }
    </style>
 
</head>
<body>

<?php
ini_set('display_errors', 1);
$id = $_GET["id"];
$file = file_get_contents('https://dragonball-api.com/api/characters/'.$id, true);
$data = json_decode($file, true);
?>

<h2>Información del Personaje</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Ki</th>
        <th>Max Ki</th>
        <th>Raza</th>
        <th>Género</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <th>Afiliación</th>
        <th>Planeta de Origen</th>
    </tr>
    <tr>
        <td><?= htmlspecialchars($data['id']) ?></td>
        <td><?= htmlspecialchars($data['name']) ?></td>
        <td><?= htmlspecialchars($data['ki']) ?></td>
        <td><?= htmlspecialchars($data['maxKi']) ?></td>
        <td><?= htmlspecialchars($data['race']) ?></td>
        <td><?= htmlspecialchars($data['gender']) ?></td>
        <td><?= htmlspecialchars($data['description']) ?></td>
        <td><img src="<?= htmlspecialchars($data['image']) ?>" alt="Imagen de <?= htmlspecialchars($data['name']) ?>"></td>
        <td><?= htmlspecialchars($data['affiliation']) ?></td>
        <td><?= htmlspecialchars($data['originPlanet']['name']) ?></td>
    </tr>
</table>

<h2>Transformaciones</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Imagen</th>
        <th>Ki</th>
    </tr>
    <?php foreach ($data['transformations'] as $transformation): ?>
    <tr>
        <td><?= htmlspecialchars($transformation['id']) ?></td>
        <td><?= htmlspecialchars($transformation['name']) ?></td>
        <td><img src="<?= htmlspecialchars($transformation['image']) ?>" alt="Imagen de <?= htmlspecialchars($transformation['name']) ?>"></td>
        <td><?= htmlspecialchars($transformation['ki']) ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
