<?php
require_once "../modele/Direction.php";
require_once "../bdd/Bdd.php";
session_start();
$database = new Bdd();
$insert = new Direction(array(
    'Email'=>$_POST['email'],
    'MotDePasse'=>$_POST['mot_de_passe'],
));
$insert->testDirection($database);
header('Location: ../../vue/menu.php');//TODO: à changer

