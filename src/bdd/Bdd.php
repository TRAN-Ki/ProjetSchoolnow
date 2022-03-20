<?php

class Bdd
{
    private $bdd;

    public function connexion(){
        $bdd = new PDO('mysql:host=localhost;dbname=ktntbi_schoolnow;charset=utf8', 'root', '');
        return $bdd;
    }


}