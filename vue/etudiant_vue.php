<?php
require_once "../src/modele/Bloc_heure.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SchoolNow</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    <!-- Simple line icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <style>a {text-decoration: none;} </style>
    <style>


        .divcenter {
            margin-left: 111px;
            margin-right: 111px;
            width: 100px;
        }
        .divcentertext {
            margin-left: 88px;
            margin-right: 88px;
            width: 150px;
        }

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
            margin-left: auto;
            margin-right: auto; /* Centre le tableau */
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
    <!-- Jquery + script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $("#timetable").load("../src/modele/Bloc_heure.php");
        });
    </script>
</head>
<body id="page-top">
<!-- Navigation-->
<a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
<nav id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand"><a href="#page-top"><strong>Connecte-toi</strong></a></li>
        <li class="sidebar-nav-item"><a href="../vue/login_eleve.php">Élève</a></li>
        <li class="sidebar-nav-item"><a href="../vue/login_professeur.php">Professeur</a></li>
        <li class="sidebar-nav-item"><a href="../vue/login_direction.php">Direction</a></li>
        <li class="sidebar-nav-item"><a href="#contact">Signaler un problème</a></li>
    </ul>
</nav>
<!-- Header-->
<header class="masthead d-flex align-items-center">
    <div class="container px-4 px-lg-5 text-center">
        <h1 class="mb-1">SchoolNow</h1>
        <h3 class="mb-5"><em>Toute la vie scolaire, en une seule plateforme.</em></h3>
        <a class="btn btn-primary btn-xl" href="#about">Connecte-toi dès maintenant</a>
    </div>
</header>
<!-- Services-->
<section class="content-section bg-primary text-white text-center" id="services">
    <div class="container px-4 px-lg-5">
        <div class="content-section-heading">
            <h3 class="text-secondary mb-0">Connexion</h3>
            <h2 class="mb-5">Qui es-tu ?</h2>
        </div>
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0 divcenter">
                <div class="divcenter"><span class="service-icon rounded-circle mx-auto mb-3"><a href="vue/login_eleve.php"><i class="icon-people"></a></i></span></div>
                <h4 class="divcenter"><strong>Élève</strong></h4>
                <p class="divcenter divcentertext text-faded mb-0">Connecte-toi ici en tant qu'élève</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-lg-0 divcenter">
                <div class="divcenter"><span class="service-icon rounded-circle mx-auto mb-3"><a href="vue/login_professeur.php"><i class="icon-user"></i></a></span></div>
                <h4 class="divcenter"><strong>Professeur</strong></h4>
                <p class="divcenter divcentertext text-faded mb-0">Connecte-toi ici en tant que professeur</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5 mb-md-0 divcenter">
                <div class="divcenter"><span class="service-icon rounded-circle mx-auto mb-3"><a href="vue/login_direction.php  "><a href="#page-top"><i class="icon-user-following"></i></a></span></div>

                <h4 class="divcenter"><strong>Direction</strong></h4>
                <p class="divcenter divcentertext text-faded mb-0">Connecte-toi ici en tant que membre de la direction</p>
            </div>
        </div>
    </div>
</section>
<!-- Emploi du temps -->
<?php
require_once '../src/bdd/Bdd.php';
require_once '../src/modele/Bloc_heure.php';
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



<!-- Footer-->
<footer class="footer text-center">
    <div class="container px-4 px-lg-5">
        <ul class="list-inline mb-5">
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-facebook"></i></a>
            </li>
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-twitter"></i></a>
            </li>
            <li class="list-inline-item">
                <a class="social-link rounded-circle text-white" href="#!"><i class="icon-social-github"></i></a>
            </li>
        </ul>
        <p class="text-muted small mb-0">Copyright &copy; SchoolNow</p>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../assets/js/scripts.js"></script>
</body>
</html>
