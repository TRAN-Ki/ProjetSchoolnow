<?php
require_once '../modele/Bloc_heure.php';
$bloc= new blocheure(array($_POST['heure_depart']));
$bloc->afficherheure();
