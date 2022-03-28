<?php
require_once "../modele/Direction.php";
require_once "../bdd/Bdd.php";
$database = new Bdd();
$insert = new Direction(array(
    'Role' => $_POST['role'],
    'Nom' => $_POST['nom'],
    'Prenom' => $_POST['prenom'],
    'Email' => $_POST['email'],
    'MotDePasse' => $_POST['mot_de_passe'],
    'TelPortable' => $_POST['tel_portable'],
));
$insert->addDirection($database);
header('Location: ../../vue/direction_vue.php');