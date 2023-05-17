<?php
$notes = [
    "do" => "C",
    "ré" => "D",
    "mi" => "E",
    "fa" => "F",
    "sol" => "G",
    "la" => "A",
    "si" => "B"
];

$result = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['note_classique'])) {
        $result = "<p>Aucune note choisie !</p>";
    }else {
        $note = $_POST['note_classique'];
        $result = "<p>La note classique $note correspond à la note américaine ".$notes[$note]."</p>";
    }

    echo $result;
    return;
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaScript - Devoir 1</title>
</head>
<body>
    <div class="container">
        <h1>Correspondance des notes de musique classiques et anglaises</h1>
        <form action="php/exemple2.php" method="post">
            <fieldset>
                <legend>Correspondance classique->anglaise</legend>
                <p>Choisissez une note:</p>
                <select name="note_classique">
                    <option value="">Choix</option>
                    <?php foreach($notes as $key => $value):?>
                        <option value="<?php echo $key?>"><?php echo $key?></option>

                    <?php endforeach?>
                </select>
                </br>
                <input type="submit" name="envoyer" value="Afficher la correspondance">
                <div id="resultat">
                    <?php echo $result?>
                </div>
            </fieldset>
        </form>
        <a href="php/exemple3.php">Origine des noms</a>
        <div id="resultat">
            <?php echo $result ?>
        </div>
    </div>
</body>
</html>