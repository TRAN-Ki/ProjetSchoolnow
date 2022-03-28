<?php

class Etudiant
{
    private $id_etudiant;
    private $nom;
    private $prenom;
    private $mot_de_passe;
    private $email;
    private $rue;
    private $cp;
    private $ville;
    private $tel_etudiant;
    private $tel_resp_legal;
    private $ref_classe;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value)
        {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    public function addEtudiant($bdd){
        $req=$bdd->connexion()->prepare('INSERT INTO etudiant (nom, prenom, mot_de_passe, email, rue, cp, ville, tel_etudiant, tel_resp_legal, ref_classe) VALUES (:nom, :prenom, :mot_de_passe, :email, :rue, :cp, :ville, :tel_etudiant, :tel_resp_legal, :ref_classe)');
        $req->execute(array(
            'nom'=>$this->getNom(),
            'prenom'=>$this->getPrenom(),
            'mot_de_passe'=>$this->getMotDePasse(),
            'email'=>$this->getEmail(),
            'rue'=>$this->getRue(),
            'cp'=>$this->getCp(),
            'ville'=>$this->getVille(),
            'tel_etudiant'=>$this->getTelEtudiant(),
            'tel_resp_legal'=>$this->getTelRespLegal(),
            'ref_classe'=>$this->getRefClasse()
        ));
    }

    public function modifEtudiant($bdd){
        $req = $bdd->connexion()->prepare("UPDATE etudiant SET `nom`=:nom,prenom=:prenom,`mot_de_passe`=:mot_de_passe,`email`=:email,`rue`=:rue,`cp`=:cp,`ville`=:ville,`tel_etudiant`=:tel_etudiant,`tel_resp_legal`=:tel_resp_legal,`ref_classe`=:ref_classe WHERE id_etudiant = :id_etudiant");
        $req->execute(array(
            'id_etudiant'=>$this->getIdEtudiant(),
            'nom'=>$this->getNom(),
            'prenom'=>$this->getPrenom(),
            'mot_de_passe'=>$this->getMotDePasse(),
            'email'=>$this->getEmail(),
            'rue'=>$this->getRue(),
            'cp'=>$this->getCp(),
            'ville'=>$this->getVille(),
            'tel_etudiant'=>$this->getTelEtudiant(),
            'tel_resp_legal'=>$this->getTelRespLegal(),
            'ref_classe'=>$this->getRefClasse()
        ));
    }

    public function testEtudiant($bdd){
        $req = $bdd->connexion()->prepare('SELECT * FROM etudiant WHERE email = :email AND mot_de_passe = :mot_de_passe');
        $req->execute(array(
            'email'=>$this->getEmail(),
            'mot_de_passe'=>$this->getMotDePasse()
        ));

        $res = $req->fetch();

        if($res){
            $_SESSION['email'] = $res['email'];
            $_SESSION['id'] = $res['id_etudiant'];

            header('Location: ../../vue/etudiant_vue.php');
        }
        else{
            header('Location: ../../vue/login_eleve.php');
            $_SESSION['erreur_co'] = "e";
        }
    }

    /**
     * @return mixed
     */
    public function getIdEtudiant()
    {
        return $this->id_etudiant;
    }

    /**
     * @param mixed $id_etudiant
     */
    public function setIdEtudiant($id_etudiant): void
    {
        $this->id_etudiant = $id_etudiant;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @param mixed $mot_de_passe
     */
    public function setMotDePasse($mot_de_passe): void
    {
        $this->mot_de_passe = $mot_de_passe;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue): void
    {
        $this->rue = $rue;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp): void
    {
        $this->cp = $cp;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @param mixed $tel_etudiant
     */
    public function setTelEtudiant($tel_etudiant): void
    {
        $this->tel_etudiant = $tel_etudiant;
    }

    /**
     * @param mixed $tel_resp_legal
     */
    public function setTelRespLegal($tel_resp_legal): void
    {
        $this->tel_resp_legal = $tel_resp_legal;
    }

    /**
     * @param mixed $ref_classe
     */
    public function setRefClasse($ref_classe): void
    {
        $this->ref_classe = $ref_classe;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @return mixed
     */
    public function getTelEtudiant()
    {
        return $this->tel_etudiant;
    }

    /**
     * @return mixed
     */
    public function getTelRespLegal()
    {
        return $this->tel_resp_legal;
    }

    /**
     * @return mixed
     */
    public function getRefClasse()
    {
        return $this->ref_classe;
    }



}