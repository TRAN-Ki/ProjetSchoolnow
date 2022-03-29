<?php
require_once "../modele/Professeur.php";
require_once "../bdd/Bdd.php";
$database = new Bdd();
$insert = new Professeur(array(
    'Nom' => $_POST['nom'],
    'Prenom' => $_POST['prenom'],
    'Email' => $_POST['email'],
    'MotDePasse' => $_POST['mot_de_passe'],
    'TelPortable' => $_POST['tel_portable'],
));
$insert->addProfesseur($database);
header('Location: ../../vue/direction_vue.php');