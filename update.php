<?php
require_once "include.php";
$hiking = json_decode(base64_decode($_GET['hiking']));
$modif = $_GET['hiking'];

$search = $db->prepare("SELECT * FROM hiking WHERE id = $hiking");

$state = $search->execute();

if($state) {
    $result = $search->fetch();
}
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
    if(isset($_GET['post']) && $_GET['post'] == 1) {
        if(isset($_POST['name'], $_POST['difficulty'], $_POST['distance'], $_POST['duration'], $_POST['height_difference'])) {

            $name = strip_tags(trim($_POST['name']));
            $difficulty = $_POST['difficulty'];
            $distance = $_POST['distance'];
            $duration = $_POST['duration'];
            $heightDifference = $_POST['height_difference'];
            $available = $_POST['available'];

            $search = $db->prepare("
                                UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :heightDifference, available = :available
                                WHERE id = :id
                                ");
            $search->bindParam(':name', $name);
            $search->bindParam(':difficulty', $difficulty);
            $search->bindParam(':distance', $distance);
            $search->bindParam(':duration', $duration);
            $search->bindParam(':heightDifference', $heightDifference);
            $search->bindParam(':available', $available);
            $search->bindParam(':id', $hiking);

            if($search->execute()) {
                header("location: read.php?post=ok");
            }
            else {
                header("location: read.php?post=notOk");
            }
        }

    }

?>

<form action="update.php?hiking=<?php echo $modif; ?>&post=1" method="POST">
    <div>
        <label for="name">Nom de la randonnée</label>
        <label for="difficulty">Difficultée</label>
        <label for="distance">Distance</label>
        <label for="duration">Durée</label>
        <label for="height_difference">Dénivelé</label>
        <label for="available">Disponible</label>
    </div>

    <div>
        <input type="text" name="name" placeholder="Nom de la randonnée" id="name" required value="<?php echo $result['name'];?>">
        <select name="difficulty" id="difficulty" required>
            <option value="base" selected><?php echo $result['difficulty'];?></option>
            <option value="très facile">Très facile</option>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
            <option value="très difficile">Très difficile</option>
        </select>
        <input type="number" name="distance" id="distance" step=".01" required value="<?php echo $result['distance'];?>">
        <input type="time" name="duration" id="duration" required value="<?php echo $result['duration'];?>">
        <input type="number" name="height_difference" id="height_difference" step=".01" required value="<?php echo $result['height_difference'];?>">
        <select name="available" id="available" required>
            <option value="base" selected><?php echo $result['available'];?></option>
            <option value="Ok">Ok</option>
            <option value="notOk">Not ok</option>
        </select>
        <input type="submit">
    </div>
</form>
</body>
</html>
