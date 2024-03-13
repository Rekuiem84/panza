<?php

class representation{

    private $id;
    private $nom;
    private $description;
    private $categorie;
    private $date;
    private $isSpectacle;
    private $valide;
    private $heure;


    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getIsSpectacle(){
        return $this->isSpectacle;
    }
        public function getType(){
        return $this->isSpectacle ? "Spectacle" : "Atelier";
    }
    public function getDescription(){
        return $this->description;
    }
    public function getDate(){
    return $this->date;
    }
    public function getValide(){
        return $this->valide;
    }
    public function getCategorie(){
        return $this->categorie;
    }
    public function getStatus(){
        return $this->valide ? "Validé" : "Non validé";
    }
    public function getHeure(){
    return $this->heure;
    }

    public function getRepresentation($id){
    $co = new Db();
    $db = $co->dbCo("panza","root","root");

    /* Utilisation de la fonction SQLWithParam */
    $sql = "SELECT * FROM `representation` where id=?";
    $param = [$id];
    $datas = $co->SQLWithParam($sql,$param,$db);

    if(!empty($datas)){
        $representation = $datas[0];

        $this->id = $representation["id"];
        $this->nom = $representation["nom"];
        $this->description = $representation["description"];
        $this->categorie = $representation["categorie"];
        $this->date = $representation["date"];
        $this->valide = $representation["is_selection_validated"];
        $this->isSpectacle = $representation["is_spectacle"];
        $this->heure = $representation["heure_debut"];
    }
    }

    public function getAllRepresentations()
    {
        /* Instanciation de Db + Connexion à la BDD */
        $co = new Db();
        $db = $co->dbCo("panza","root","root");

        /* Méthode SQLWithoutParam */
        /* Retourner le résultat de la méthode SQLWithoutParam (array) */
        return $co->SQLWithoutParam("SELECT * FROM `representation`",$db);


    }
}

?>