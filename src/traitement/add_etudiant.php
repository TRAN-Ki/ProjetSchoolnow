<?php
require_once "../modele/Direction.php";
require_once "../bdd/Bdd.php";
$database = new Bdd();
$insert = new Etudiant(array(
    'Nom' => $_POST['nom'],
    'Prenom' => $_POST['prenom'],
    'Email' => $_POST['email'],
    'Rue' => $_POST['rue'],
    'Cp' => $_POST['cp'],
    'Ville' => $_POST['ville'],
    'MotDePasse' => $_POST['mot_de_passe'],
    'TelEtudiant' => $_POST['tel_etudiant'],
    'TelRespLegal' => $_POST['tel_resp_legal'],
    'RefClasse' => $_POST['ref_classe'],
));
$insert->addEtudiant($database);
header('Location: ../../vue/direction_vue.php');