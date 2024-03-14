<?php

class Atelier
{

  private $id;

  private $nom;

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

  public function __construct($nom, $description, $date, $nb_comediens, $adresse, $heure)
  {
    $this->nom = $nom;
    $this->description = $description;
    $this->date = $date;
    $this->nb_comediens = $nb_comediens;
    $this->adresse = $adresse;
    $this->heure = $heure;
  }

  public function insertAtelier($nom, $description, $date, $nb_comediens, $salle_id, $heure): void
  {
    $co = new Db();
    $db = $co->dbCo("panza", "root", "root");

    $sql = "INSERT INTO `representation`(`nom`,`description`,`date`,`nb_comediens`, `salle_id`, `heure_debut`, `is_spectacle`) VALUES (?,?,?,?,?,?,0)";
    $param = [$nom,  $description, $date, $nb_comediens, $salle_id, $heure];
    $co->SQLWithParam($sql, $param, $db);
  }

  // Cette fonction check dans la bdd si l'adresse renseignée dans le form existe déjà
  public function isAdressInDb($adresse): bool
  {
    $co = new Db();
    $db = $co->dbCo("panza", "root", "root");

    $sql = "SELECT * FROM salle WHERE adresse = ?";
    $param = [$adresse];
    $data = $co->SQLWithParam($sql, $param, $db);

    return !empty($data);
  }
  // Cette fonction retourne l'id de la salle avec une certaine adresse
  public function getSalleId($adresse): int
  {
    $co = new Db();
    $db = $co->dbCo("panza", "root", "root");

    $sql = "SELECT id FROM salle WHERE adresse = ?";
    $param = [$adresse];
    $data = $co->SQLWithParam($sql, $param, $db);

    return $data[0]["id"];
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
