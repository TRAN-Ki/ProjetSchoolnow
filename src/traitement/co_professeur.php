<?php
require_once "../modele/Professeur.php";
require_once "../bdd/Bdd.php";
session_start();
$database = new Bdd();
$insert = new Professeur(array(
    'Email'=>$_POST['email'],
    'MotDePasse'=>$_POST['mot_de_passe'],
));
$insert->testProfesseur($database);
header('Location: ../../vue/etudiant_vue.php');

