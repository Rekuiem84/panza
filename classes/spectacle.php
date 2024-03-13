<?php

class Spectacle
{

    private $id;

    private $nom;

    private $categorie;

    private $description;

    private $date;

    private $adresse;

    private $nb_comediens;

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

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getNbComediens()
    {
        return $this->nb_comediens;
    }

    public function getHeure()
    {
        return $this->heure;
    }

    public function __construct($nom, $categorie, $description, $date, $nb_comediens, $adresse, $heure)
    {
        $this->nom = $nom;
        $this->categorie = $categorie;
        $this->description = $description;
        $this->date = $date;
        $this->nb_comediens = $nb_comediens;
        $this->adresse = $adresse;
        $this->heure = $heure;
    }
    public function insertSpectacle($nom, $categorie, $description, $date, $nb_comediens, $heure)
    {
        $co = new Db();
        $db = $co->dbCo("panza", "root", "root");

        $sql = "INSERT INTO `representation`(`nom`,`categorie`,`description`,`date`,`nb_comediens`,`heure_debut`) VALUES (?,?,?,?,?,?)";
        $param = [$nom, $categorie, $description, $date, $nb_comediens, $heure];
        $co->SQLWithParam($sql, $param, $db);
    }

    public function insertSalle($addresse)
    {
        $co = new Db();
        $db = $co->dbCo("panza", "root", "root");

        $sql = "INSERT INTO `salle`(`adresse`) VALUES (?)";
        $param = [$addresse];
        $co->SQLWithParam($sql, $param, $db);
    }
}
