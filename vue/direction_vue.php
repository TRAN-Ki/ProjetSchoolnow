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
    <!-- Datatable-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
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
            width: 450px;
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
            table-layout: fixed;
            width: 100%;
        }
        th /* Les cellules d'en-tête */
        {
            width: 30px;
            background-color: #1D809F;
            color: white;
            font-size: 1.1em;
            font-family: Arial, "Arial Black", Times, "Times New Roman", serif;
            border:1px solid #DDAE1B;
        }

        td /* Les cellules normales */
        {
            width: 30px;
            border: 1px solid black;
            font-family: "Comic Sans MS", "Trebuchet MS", Times, "Times New Roman", serif;
            text-align: center; /* Tous les textes des cellules seront centrés*/
            padding: 5px; /* Petite marge intérieure aux cellules pour éviter que le texte touche les bordures */
        }
        td.time
        {
            width:5%;
        }
        #panel, #flip {
            padding: 5px;
            text-align: center;
        }

        #panel,#panel1,#panel2 {
            padding-top: 5px;
            padding-right: 5px;
            padding-bottom: 5px;
            padding-left: 5px;
            display: none;
        }
    </style>
    <!-- Jquery + script -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $("#timetable").load("../src/modele/Bloc_heure.php");
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("slow");
            });
        });
        $(document).ready(function(){
            $("#flip1").click(function(){
                $("#panel1").slideToggle("slow");
            });
        });
        $(document).ready(function(){
            $("#flip2").click(function(){
                $("#panel2").slideToggle("slow");
            });
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
            <h3 class="text-secondary mb-0">Gestion</h3>
            <h2 class="mb-5">C'est ici que vous gerer l'ecole</h2>
        </div>
        <div style="display: flex; justify-content: space-around">
            <div class="center">
                <div class="center"><span class="service-icon rounded-circle mx-auto mb-3"><a href="vue/login_eleve.php"><i class="icon-people"></a></i></span>

                </div>
                <h4 class="center"><strong>Élève</strong></h4>
                    <div id="flip"><p style="cursor: pointer" class="center centertext  text-faded mb-0">Ici tu peux ajouter des élève</p></div>
                    <div id="panel">
                        <div class="container">
                            <form method="post" action="../src/traitement/add_etudiant.php" class="m-auto" style="max-width:300px">
                                <h3 class="my-4">Ajout</h3>
                                <hr class="my-4" />
                                <div class="form-group mb-3 row"><label for="nom" class="col-md-5 col-form-label">Nom</label>
                                    <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="nom" name="nom" required></div>
                                </div>
                                <div class="form-group mb-3 row"><label for="prenom" class="col-md-5 col-form-label">Prenom</label>
                                    <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="prenom" name="prenom" required></div>
                                </div>
                                <div class="form-group mb-3 row"><label for="rue" class="col-md-5 col-form-label">rue</label>
                                    <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="rue" name="rue" required></div>
                                </div>
                                <div class="form-group mb-3 row"><label for="cp" class="col-md-5 col-form-label">cp</label>
                                    <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="cp" name="cp" required></div>
                                </div>
                                <div class="form-group mb-3 row"><label for="ville" class="col-md-5 col-form-label">Ville</label>
                                    <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="ville" name="ville" required></div>
                                </div>
                                <div class="form-group mb-3 row"><label for="tel_etudiant" class="col-md-5 col-form-label">Telephone</label>
                                    <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="tel_etudiant" name="tel_etudiant" required></div>
                                </div>
                                <div class="form-group mb-3 row"><label for="tel_resp_legal" class="col-md-5 col-form-label">Telephone Parent</label>
                                    <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="tel_resp_legal" name="tel_resp_legal" required></div>
                                </div>
                                <div class="form-group mb-3 row"><label for="mot_de_passe" class="col-md-5 col-form-label">Mot de passe</label>
                                    <div class="col-md-7"><input type="password" class="form-control form-control-lg" id="mot_de_passe" name="mot_de_passe" required></div>
                                </div>
                                <div class="form-group mb-3 row"><label for="email" class="col-md-5 col-form-label">Email</label>
                                    <div class="col-md-7"><input type="email" class="form-control form-control-lg" id="email" name="email" required></div>
                                </div>
                                <div class="form-group mb-3 row"><label for="ref_classe" class="col-md-5 col-form-label">Classe</label>
                                    <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="ref_classe" name="ref_classe" required></div>
                                </div>
                                <hr class="my-4" />
                                <div class="form-group mb-3 row"><label for="send-a-message6" class="col-md-5 col-form-label"></label>
                                    <div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Ajouter!</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
            <div class="center">
                <div class="center"><span class="service-icon rounded-circle mx-auto mb-3"><a href="vue/login_professeur.php"><i class="icon-user"></i></a></span></div>
                <h4 class="center"><strong>Professeur</strong></h4>
                <div id="flip1"><p style="cursor: pointer" class="center centertext  text-faded mb-0">Ici tu peux gérer les professeur</p></div>
                <div id="panel1">
                    <div class="container">
                        <form method="post" action="../src/traitement/add_professeur.php" class="m-auto" style="max-width:300px">
                            <h3 class="my-4">Ajout</h3>
                            <hr class="my-4" />
                            <div class="form-group mb-3 row"><label for="nom" class="col-md-5 col-form-label">Nom</label>
                                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="nom" name="nom" required></div>
                            </div>
                            <div class="form-group mb-3 row"><label for="prenom" class="col-md-5 col-form-label">Prenom</label>
                                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="prenom" name="prenom" required></div>
                            </div>
                            <div class="form-group mb-3 row"><label for="tel_portable" class="col-md-5 col-form-label">Telephone</label>
                                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="tel_portable" name="tel_portable" required></div>
                            </div>
                            <div class="form-group mb-3 row"><label for="mot_de_passe" class="col-md-5 col-form-label">Mot de passe</label>
                                <div class="col-md-7"><input type="password" class="form-control form-control-lg" id="mot_de_passe" name="mot_de_passe" required></div>
                            </div>
                            <div class="form-group mb-3 row"><label for="email" class="col-md-5 col-form-label">Email</label>
                                <div class="col-md-7"><input type="email" class="form-control form-control-lg" id="email" name="email" required></div>
                            </div>
                            <hr class="my-4" />
                            <div class="form-group mb-3 row"><label for="send-a-message6" class="col-md-5 col-form-label"></label>
                                <div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Ajouter!</button></div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="center">
                <div class="center"><span class="service-icon rounded-circle mx-auto mb-3"><a href="vue/login_direction.php  "><a href="#page-top"><i class="icon-user-following"></i></a></span></div>
                <h4 class="center"><strong>Direction</strong></h4>
                <div id="flip2"><p style="cursor: pointer" class="center centertext  text-faded mb-0">Ici tu peux gerer la direction</p></div>
                <div id="panel2">
                    <div class="container">
                        <form method="post" action="../src/traitement/add_direction.php" class="m-auto" style="max-width:300px">
                            <h3 class="my-4">Ajout</h3>
                            <hr class="my-4" />
                            <div class="form-group mb-3 row"><label for="role" class="col-md-5 col-form-label">Role</label>
                                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="role" name="role" required></div>
                            </div>
                            <div class="form-group mb-3 row"><label for="nom" class="col-md-5 col-form-label">Nom</label>
                                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="nom" name="nom" required></div>
                            </div>
                            <div class="form-group mb-3 row"><label for="prenom" class="col-md-5 col-form-label">Prenom</label>
                                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="prenom" name="prenom" required></div>
                            </div>
                            <div class="form-group mb-3 row"><label for="tel_portable" class="col-md-5 col-form-label">Telephone</label>
                                <div class="col-md-7"><input type="text" class="form-control form-control-lg" id="tel_portable" name="tel_portable" required></div>
                            </div>
                            <div class="form-group mb-3 row"><label for="mot_de_passe" class="col-md-5 col-form-label">Mot de passe</label>
                                <div class="col-md-7"><input type="password" class="form-control form-control-lg" id="mot_de_passe" name="mot_de_passe" required></div>
                            </div>
                            <div class="form-group mb-3 row"><label for="email" class="col-md-5 col-form-label">Email</label>
                                <div class="col-md-7"><input type="email" class="form-control form-control-lg" id="email" name="email" required></div>
                            </div>
                            <hr class="my-4" />
                            <div class="form-group mb-3 row"><label for="send-a-message6" class="col-md-5 col-form-label"></label>
                                <div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Ajouter!</button></div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>

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


</section>
<!-- Emploi du temps -->

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
