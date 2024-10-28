<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $orario = $_POST["orario"];
        $note = $_POST["note"];
        if(isset($_POST["prePasto"])){
            $pasto = $_POST["prePasto"];
        }
        $parcheggio = $_POST["parcheggio"];
    ?>
</body>
</html>