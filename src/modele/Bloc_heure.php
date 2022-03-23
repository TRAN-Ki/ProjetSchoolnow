<?php
class Bloc_heure
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
        $bheure = $req->fetchAll();
        return $bheure;
    }
    public function afficherheure($bdd,$h,$j){
        $req = $bdd->connexion()->prepare('SELECT * FROM bloc_heure WHERE heure_debut=:heure_debut AND jour=:jour ');
        $req->execute(array(
            "heure_debut"=> $h,
            "jour"=> $j,
        ));
        $heure = $req->fetch();
        return $heure;
    }
    public function afficherjour($bdd,$j){
        $req = $bdd->connexion()->prepare('SELECT * FROM bloc_heure WHERE jour=:jour ORDER BY heure_debut ');
        $req->execute(array(
            "jour"=> $j,

        ));

        $heure = $req->fetchAll();

        return $heure;
    }

    public function afficherJoin($bdd){
        $req = $bdd->connexion()->prepare('SELECT * FROM `bloc_heure` JOIN `professeur` ON ref_professeur = id_professeur JOIN `matiere` ON ref_matiere = id_matiere');
        $req->execute(array());

        $heure = $req->fetchAll();

        return $heure;
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
