<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/bloc_text.php';
$test=null;
$testj=null;
?>
<html>
<head>
    <title>bloc_text</title>
    <style type="text/css">
        caption /* Titre du tableau */
        {
            margin: auto; /* Centre le titre du tableau */
            font-family: Arial, Times, "Times New Roman", serif;
            font-weight: bold;
            font-size: 1.2em;
            color: #1D809F;
            margin-bottom: 20px; /* Pour éviter que le titre ne soit trop collé au tableau en-dessous */
        }

        table /* Le tableau en lui-même */
        {
            margin-left:0; /* Centre le tableau */
            border: 4px outset #1D809F; /* Bordure du tableau avec effet 3D (outset) */
            border-collapse: collapse; /* Colle les bordures entre elles */
            width:30%;
        }
        th /* Les cellules d'en-tête */
        {
            background-color: #1D809F;
            color: white;
            font-size: 1.1em;
            font-family: Arial, "Arial Black", Times, "Times New Roman", serif;
            border:1px solid #DDAE1B;
        }

        td /* Les cellules normales */
        {
            border: 1px solid black;
            font-family: "Comic Sans MS", "Trebuchet MS", Times, "Times New Roman", serif;
            text-align: center; /* Tous les textes des cellules seront centrés*/
            padding: 5px; /* Petite marge intérieure aux cellules pour éviter que le texte touche les bordures */
        }
        td.time
        {
            width:5%;
        }
    </style>

</head>
<body>
<table>
    <?php
    $jour = array(null, "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
    $rdv["Dimanche"]["16:30"]="CEJM";
    $rdv["Lundi"]["9"]= "Math";
    echo "<tr><th>Heure</th>";
    for($x = 1; $x < 8; $x++)
        echo "<th>".$jour[$x]."</th>";
    echo "</tr>";
    for($j = 8; $j < 18; $j += 0.5) {
        echo "<tr>";
        for($i = 0; $i < 7; $i++) {
            if($i == 0) {
                $heure = str_replace(".5", ":30", $j);
                echo "<td class=\"time\">".$heure."</td>";

            }
            $bloc= new bloc_text(array());
            $valeur=null;
            unset($valeur);
            $valeur=$bloc->afficherheure($j,$jour[$i+1]);
            if(isset($valeur['jour'])){
                $test=$valeur["heure_fin"];
                $testj=$valeur['jour'];
                echo "<td rowspan='2'>a".$valeur['jour'].$test." ";

            }

            elseif((string)$heure==$test && $jour[$i+1]==$testj){

            }
            else{
                echo "<td>";
            }

            if(isset($rdv[$jour[$i+1]][$heure])) {
                echo $rdv[$jour[$i+1]][$heure];
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
