<?php

class Direction
{
    private $id_direction;
    private $role;
    private $nom;
    private $prenom;
    private $mot_de_passe;
    private $email;
    private $tel_portable;

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

    public function addDirection($bdd){
        $req=$bdd->getBdd()->prepare('INSERT INTO direction (role, nom, prenom, mot_de_passe, email, tel_portable) VALUES (:role, :nom, :prenom, :mot_de_passe, :email, :tel_portable)');
        $req->execute(array(
            'role'=>$this->getRole(),
            'nom'=>$this->getNom(),
            'prenom'=>$this->getPrenom(),
            'mot_de_passe'=>$this->getMotDePasse(),
            'email'=>$this->getEmail(),
            'tel_portable'=>$this->getTelPortable(),
        ));
    }

    public function modifDirection($bdd){ //TODO: update "role"
        $req = $bdd->getBdd()->prepare("UPDATE direction SET `nom`=:nom,prenom=:prenom,`mot_de_passe`=:mot_de_passe,`email`=:email,`tel_portable`=:tel_portable WHERE id_direction = :id_direction");
        $req->execute(array(
            'id_direction'=>$this->getIdDirection(),
            'role'=>$this->getRole(),
            'nom'=>$this->getNom(),
            'prenom'=>$this->getPrenom(),
            'mot_de_passe'=>$this->getMotDePasse(),
            'email'=>$this->getEmail(),
            'tel_portable'=>$this->getTelPortable()
        ));
    }

    public function testDirection($bdd){
        session_start();
        $req = $bdd->getBdd()->prepare('SELECT * FROM direction WHERE email = :email AND mot_de_passe = :mot_de_passe');
        $req->execute(array(
            'email'=>$this->getEmail(),
            'mot_de_passe'=>$this->getMotDePasse()
        ));

        $res = $req->fetch();

        if($res){
            $_SESSION['email'] = $res['email'];
            $_SESSION['id'] = $res['id_direction'];

            header('Location: ../../vue/menu.php');//TODO: à changer redirection (sûrement partout)
        }
        else{
            header('Location: ../../vue/login.php');
            $_SESSION['erreur_co'] = "e";
        }
    }

    /**
     * @return mixed
     */
    public function getIdDirection()
    {
        return $this->id_direction;
    }

    /**
     * @param mixed $id_direction
     */
    public function setIdDirection($id_direction): void
    {
        $this->id_direction = $id_direction;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    /**
     * @param mixed $mot_de_passe
     */
    public function setMotDePasse($mot_de_passe): void
    {
        $this->mot_de_passe = $mot_de_passe;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelPortable()
    {
        return $this->tel_portable;
    }

    /**
     * @param mixed $tel_portable
     */
    public function setTelPortable($tel_portable): void
    {
        $this->tel_portable = $tel_portable;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }
}

