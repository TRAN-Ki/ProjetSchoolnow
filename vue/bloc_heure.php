<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Bloc_heure.php';
$bdd = new Bdd();
$bloc= new Bloc_heure(array());
$heure=null;
$bdd = new Bdd();
$arrJ = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
$arrF=array("Lundi" => array() , "Mardi"=> array(), "Mercredi"=> array(), "Jeudi"=> array(), "Vendredi"=> array(), "Samedi"=> array(0), "Dimanche"=> array(0));
$arrH=array("Lundi"=> array() , "Mardi"=> array(), "Mercredi"=> array(), "Jeudi"=> array(), "Vendredi"=> array(), "Samedi"=> array(0), "Dimanche"=> array(0));
$compteur = array(0,0,0,0,0,0,0);
$lcompteur = array(1,1,1,1,1,1,1);
$jlenght = array(0,0,0,0,0,0,0);
for($k=0;$k<7;$k=$k+1)
{
    $res=$bloc->afficherjour($bdd,$arrJ[$k]);
foreach ($res as $val) {
    $arrH[$arrJ[$k]][] = $val["heure_debut"];
    $arrF[$arrJ[$k]][] = $val["heure_fin"];
}

}






?>
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

<table>
    <?php
    $jour = array(null, "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");

    $rdv["Dimanche"]["16:30"]="CEJM";
    $rdv["Lundi"]["9"]= "Math";
    $join=$bloc->afficherJoin($bdd);
    foreach ($join as $v){
        $rdv[$v["jour"]][str_replace(":30",".5",$v["heure_debut"])]= $v["nom"]." ".$v["libelle"];
    }
    echo "<tr><th>Heure</th>";
    for($x = 1; $x < 8; $x++)
        echo "<th>".$jour[$x]."</th>";
    echo "</tr>";
    $key=0;
    for($j = 8; $j < 18; $j += 0.5) {

        $key=$key+1;
        echo "<tr>";
        for($i = 0; $i < 7; $i++) {

            if($i == 0) {
                $heure = str_replace(".5", ":30", $j);
                echo "<td class=\"time\">".$heure."</td>";

            }
            $valeur=null;
            unset($valeur);
            $valeur=$bloc->afficherheure($bdd,$j,$jour[$i+1]);
            if(isset($valeur['id_bloc_heure'])){
                $jlenght[$i]=(str_replace(":30",".5",$valeur["heure_fin"])-$j)*2+1;

                echo "<td rowspan=$jlenght[$i]>";

            }
            elseif((double)$j<=(double)str_replace(":30",".5",$arrF[$arrJ[$i]][$compteur[$i]]) && $jour[$i+1]==$arrJ[$i]
                && (double)$j>=(double)str_replace(":30",".5",$arrH[$arrJ[$i]][$compteur[$i]])){
                $lcompteur[$i]=$lcompteur[$i]+1;
                if($compteur[$i]+1<sizeof($arrF[$arrJ[$i]]) && $lcompteur[$i]==$jlenght[$i]){
                    $lcompteur[$i]=1;
                    $compteur[$i]=$compteur[$i]+1;
                }

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
