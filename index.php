<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        body{
            margin-left: 20px;

        }
    </style>
   
</head>
<body>
    <?php
ini_set('display_errors', 1);
//phpinfo();
//https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0
$file = file_get_contents('https://dragonball-api.com/api/characters?limit=1000', true);

$data= json_decode($file,true);
//var_dump($data['items']);

?>
<table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Ki</th>
            <th>Max Ki</th>
            <th>Raza</th>
            <th>Genero</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Afiliacion</th>
        </tr>
        <?php foreach ($data['items'] as $item): ?>
            <tr>
                <td><?php echo '<a href="index2.php?id='. htmlspecialchars($item['id']).'">'.htmlspecialchars($item['id'])."</a>"; ?></td>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['ki']) ?></td>
                <td><?= htmlspecialchars($item['maxKi']) ?></td>
                <td><?= htmlspecialchars($item['race']) ?></td>
                <td><?= htmlspecialchars($item['gender']) ?></td>
                <td><?= htmlspecialchars($item['description']) ?></td>
                <td><img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="width: 100px; height: auto;"></td>
                <td><?= htmlspecialchars($item['affiliation']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>