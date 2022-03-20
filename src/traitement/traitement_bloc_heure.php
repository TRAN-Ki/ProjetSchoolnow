<?php
require_once '../modele/bloc_text.php';
$bloc= new bloc_text(array($_POST['heure_depart']));
$bloc->afficherheure();
