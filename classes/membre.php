<?php

class membre
{
  private $id;
  private $nom;
  private $prenom;
  private $email;
  private $mdp;
  private $is_admin;


  public function getId()
  {
    return $this->id;
  }
  public function getNom()
  {
    return $this->nom;
  }
  public function getPrenom()
  {
    return $this->prenom;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function getMdp()
  {
    return $this->mdp;
  }

  public function setNom($nom)
  {
    $this->nom = $nom;
  }
  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;
  }
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function setMotdepasse($mdp)
  {
    $this->mdp = $mdp;
  }

  public function __construct($prenom, $nom, $email, $mdp, $is_admin)
  {
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->email = $email;
    $this->mdp = $mdp;
    $this->is_admin = $is_admin;
  }
  public function insertMembre($prenom, $nom, $email, $mdp, $admin)
  {
    $co = new Db;
    $db = $co->dbCo("panza", "root", "root");

    $sql = "INSERT INTO `membre` (`prenom`,`nom`,`email`,`mot_de_passe`,`is_admin`) VALUES (?,?,?,?,?)";
    $param = [$prenom, $nom, $email, sha1($mdp), intval($admin)];
    $co->SQLWithParam($sql, $param, $db);
  }

  public function getMembre($id)
  {
    $co = new Db();
    $db = $co->dbCo("panza", "root", "root");

    /* Utilisation de la fonction SQLWithParam */
    $sql = "SELECT * FROM `membre` where id=?";
    $param = [$id];
    $datas = $co->SQLWithParam($sql, $param, $db);

    if (!empty($datas)) {
      $membre = $datas[0];

      $this->nom = $membre["nom"];
      $this->prenom = $membre["prenom"];
      $this->email = $membre["email"];
    }
  }

  public function setMembre($nom, $prenom, $email, $mdp, $id)
  {
    $_SESSION["membre_prenom"] = $prenom;
    $_SESSION["membre_nom"] = $nom;
    $_SESSION["membre_email"] = $email;

    $co = new Db();
    $db = $co->dbCo("panza", "root", "root");

    $sql = "UPDATE `membre` SET `nom`=?, `prenom`=?, `email`=?, `mot_de_passe`=? WHERE id=?";
    $param = [$nom, $prenom, $email, $mdp, $id];
    $datas = $co->SQLWithParam($sql, $param, $db);
  }
}
