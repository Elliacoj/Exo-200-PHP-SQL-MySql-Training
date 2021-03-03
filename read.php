<?php
require_once 'include.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/basics.css">
    <title>Document</title>
</head>
<body>

<?php
    if(isset($_GET['post']) && $_GET['post'] == "ok" ) {
        echo "<div style='background-color: greenyellow; font-weight: bold; text-align: center;'>Base de données mise à jour</div>";
    }
    elseif (isset($_GET['post']) && $_GET['post'] == "notOk" ) {
        echo "<div style='background-color: red; font-weight: bold; text-align: center;'>Echec de la mise à jour</div>";
}

    $search = $db->prepare("SELECT * FROM hiking");

    $state = $search->execute();

    if($state) {
        $hikings = [];
        foreach ($search->fetchAll() as $item) {
            $hikings[] = new Hiking($item['id'], $item['name'], $item['difficulty'], $item['distance'], $item['duration'], $item['height_difference'],$item['available']);
        }
    }
    echo "<table><tr><th>Id</th><th>Name</th><th>Difficulty</th><th>Distance</th><th>Duration</th><th>Height difference</th><th>Available</th></tr>";
    foreach ($hikings as $hiking) {
        $modif = base64_encode(json_encode($hiking->getId()));
        echo "<tr><td>" . $hiking->getId() . "</td><td>" . $hiking->getName() . "</td><td>" . $hiking->getDifficulty() .
            "</td><td>" . $hiking->getDistance() . " Km</td><td>" . $hiking->getDuration() . "</td><td>" . $hiking->getHeightDifference() .
            " m</td><td>" . $hiking->getAvailable() . "</td><td><a href='update.php?hiking=$modif'>Modifier</a></td><td><a href='delete.php?hiking=$modif'>Supprimer</a></td></tr>";
    }
    echo "</table>";
?>
</body>
</html>
