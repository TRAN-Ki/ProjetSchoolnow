<?php
require_once "../modele/Etudiant.php";
require_once "../bdd/Bdd.php";
session_start();
$database = new Bdd();
$insert = new Etudiant(array(
    'Email'=>$_POST['email'],
    'MotDePasse'=>$_POST['mot_de_passe'],
));
$insert->testEtudiant($database);
header('Location: ../../vue/menu.php');//TODO: à changer

