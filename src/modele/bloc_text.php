<?php
require_once '../src/bdd/Bdd.php';
class bloc_text
{


    private $id_bloc_heure;
    private $jour;
    private $heure_debut;
    private $heure_fin;
    private $ref_professeur;
    private $ref_classe;
    private $ref_matiere;



    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    public function afficher($bdd){
        $req = $bdd->connexion()->prepare('SELECT * FROM bloc_heure');
        $req->execute(array());
        $avion = $req->fetchAll();
        return $avion;
    }
    public function afficherheure($h,$j){
        $bdd = new Bdd();
        $req = $bdd->connexion()->prepare('SELECT * FROM bloc_heure WHERE heure_debut=:heure_debut AND jour=:jour ');
        $req->execute(array(
            "heure_debut"=> $h,
            "jour"=> $j,
        ));
        $heur = $req->fetch();
        return $heur;
    }
    public function afficherjour($j){
        $bdd = new Bdd();
        $req = $bdd->connexion()->prepare('SELECT * FROM bloc_heure WHERE jour=:jour ORDER BY heure_debut ');
        $req->execute(array(
            "jour"=> $j,

        ));

        $heur = $req->fetchAll();

        return $heur;
    }

    public function afficherJoin(){
        $bdd = new Bdd();
        $req = $bdd->connexion()->prepare('SELECT * FROM `bloc_heure` JOIN `professeur` ON ref_professeur = id_professeur JOIN `matiere` ON ref_matiere = id_matiere');
        $req->execute(array());

        $heur = $req->fetchAll();

        return $heur;
    }

    public function add(){
        $bdd = new Bdd();
        $req = $bdd->connexion()->prepare('INSERT INTO bloc_heure (nom,capacite, fournisseur) VALUES (:nom, :capacite, :fournisseur);');
        $req->execute(array(
            "nom" => $_POST['nom'],
            "capacite" => $_POST['capacite'],
            "fournisseur" => $_POST['fournisseur'],

        ));
    }

    public function modif(){
        $bdd = new Bdd();        $req = $bdd->connexion()->prepare('UPDATE bloc_heure SET nom = :nom, capacite = :capacite, fournisseur = :fournisseur WHERE $id_bloc_heure = :$id_bloc_heure;');
        $req->execute(array(
            "id_bloc_heure" => $_SESSION['id_bloc_heure'],
            "nom" => $_POST['nom'],
            "capacite" => $_POST['capacite'],
            "fournisseur" => $_POST['fournisseur'],
        ));
    }
    public function delete(){
        $bdd = new Bdd();        $req = $bdd->connexion()->prepare('DElETE FROM bloc_heure WHERE id_bloc_heure=:id_bloc_heure');
        $req->execute(array(
            "id_bloc_heure"=>$_POST['id_bloc_heure']
        ));
    }

    /**
     * @return mixed
     */
    public function getIdBlocHeure()
    {
        return $this->id_bloc_heure;
    }

    /**
     * @param mixed $id_bloc_heure
     */
    public function setIdBlocHeure($id_bloc_heure)
    {
        $this->id_bloc_heure = $id_bloc_heure;
    }

    /**
     * @return mixed
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * @param mixed $jour
     */
    public function setJour($jour)
    {
        $this->jour = $jour;
    }

    /**
     * @return mixed
     */
    public function getHeureDebut()
    {
        return $this->heure_debut;
    }

    /**
     * @param mixed $heure_debut
     */
    public function setHeureDebut($heure_debut)
    {
        $this->heure_debut = $heure_debut;
    }

    /**
     * @return mixed
     */
    public function getHeureFin()
    {
        return $this->heure_fin;
    }

    /**
     * @param mixed $heure_fin
     */
    public function setHeureFin($heure_fin)
    {
        $this->heure_fin = $heure_fin;
    }

    /**
     * @return mixed
     */
    public function getRefProfesseur()
    {
        return $this->ref_professeur;
    }

    /**
     * @param mixed $ref_professeur
     */
    public function setRefProfesseur($ref_professeur)
    {
        $this->ref_professeur = $ref_professeur;
    }

    /**
     * @return mixed
     */
    public function getRefClasse()
    {
        return $this->ref_classe;
    }

    /**
     * @param mixed $ref_classe
     */
    public function setRefClasse($ref_classe)
    {
        $this->ref_classe = $ref_classe;
    }

    /**
     * @return mixed
     */
    public function getRefMatiere()
    {
        return $this->ref_matiere;
    }

    /**
     * @param mixed $ref_matiere
     */
    public function setRefMatiere($ref_matiere)
    {
        $this->ref_matiere = $ref_matiere;
    }






}
