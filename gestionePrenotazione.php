<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th, td{
            border: solid black 2px;
        }

        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <?php
        $cameriere = array("Matteo", "Gigi", "Elia", "Mario", "Leonardo");

        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $orario = $_POST["orario"];
        $note = $_POST["note"];

        $prezzoTotale = 0;

        if(isset($_POST["prePasto"])){
            $antipasto = $_POST["prePasto"];
            $prezzoTotale = $prezzoTotale + 5;
        }
        if(isset($_POST["primoPasto"])){
            $primo = $_POST["primoPasto"];
            $prezzoTotale = $prezzoTotale + 6;
        }
        if(isset($_POST["secondoPasto"])){
            $secondo = $_POST["secondoPasto"];
            $prezzoTotale = $prezzoTotale + 7;
        }
        
        //calcolo totale con l'ordinazione
        if($prezzoTotale == 13){
            $prezzoTotale = $prezzoTotale * 0.9;
        }else if($prezzoTotale == 18){
            $prezzoTotale = $prezzoTotale * 0.85;
        }

        $parcheggio = $_POST["parcheggio"];

        //calcolo totale con parcheggio
        if($parcheggio == "custodito"){
            $prezzoTotale = $prezzoTotale + 5;
        }else if($parcheggio == "nonCustodito"){
            $prezzoTotale = $prezzoTotale + 3;
        }

        $randomNum = rand(0, 4);

        //controllo se è stato scelto un ordine errato
        if(!(isset($_POST["primoPasto"]) && isset($_POST["secondoPasto"])) && isset($_POST["prePasto"])){

            echo "<p>Non puoi ordinare solo l'antipasto</p>";
            echo "<a href='prenotazione.html'>Ordina di nuovo</a>";

        } else if(!(isset($_POST["primoPasto"]) && isset($_POST["secondoPasto"]) && isset($_POST["prePasto"]))){

            echo "<p>Devi ordinare qualcosa</p>";
            echo "<a href='prenotazione.html'>Ordina di nuovo</a>";

        } else {

           echo "<table>";
            echo "<tr>";
                echo "<th>Nome</th>";
                echo "<th>Cognome</th>";
                echo "<th>Orario</th>";
                echo "<th>Note</th>";
                echo "<th>Ordinazione</th>";
                echo "<th>Parcheggio</th>";
                echo "<th>Cameriere</th>";
                echo "<th>Prezzo totale</th>";
            echo "</tr>";
            echo "<tr>";
                echo "<td>$nome</td>";
                echo "<td>$cognome</td>";
                echo "<td>$orario</td>";
                echo "<td>$note</td>";
                echo "<td>";
                    if(isset($_POST["prePasto"])){
                        if(isset($_POST["prePasto"])){
                            echo $antipasto;
                            echo " ";
                        }
                        if(isset($_POST["primoPasto"])){
                            echo $primo;
                            echo " ";
                        }
                        if(isset($_POST["secondoPasto"])){
                            echo $secondo;
                            echo " ";
                        }
                    }
                echo "</td>";
                echo "<td>$parcheggio</td>";
                echo "<td>$cameriere[$randomNum]</td>";
                echo "<td>$prezzoTotale</td>";
            echo "</tr>";
        echo "</table>"; 
        }
        
    ?>
</body>
</html>