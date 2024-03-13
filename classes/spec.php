<?php

Class spec{

    private $id;

    private $nom;

    private $categorie;

    private $description;

    private $date;

    private $addresse;

    private $nbrcom;

    private $heure;


    public function getID()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getAddresse()
    {
        return $this->addresse;
    }

    public function getNbrcom()
    {
        return $this->nbrcom;
    }

    public function getHeure()
    {
        return $this->heure;
    }
    

    public function insertSpectacle($nom,$categorie,$description,$date,$nbrcom,$heure){
    $co = new Db();
    $db = $co->dbCo("panza","root","root");

    $sql = "INSERT INTO `representation`(`nom`,`categorie`,`description`,`date`,`nb_comediens`,`heure_debut`) VALUES (?,?,?,?,?,?)";
    $param = [$nom,$categorie,$description,$date,$nbrcom,$heure];
    $co->SQLWithParam($sql,$param,$db);
    }

    public function insertSalle($addresse){
    $co = new Db();
    $db = $co->dbCo("panza","root","root");

    $sql = "INSERT INTO `salle`(`adresse`) VALUES (?)";
    $param = [$addresse];
    $co->SQLWithParam($sql,$param,$db);
    }

}

?>