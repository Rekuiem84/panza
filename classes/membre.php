<?php

class membre
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;


    public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
      public function getPrenom(){
      return $this->prenom;
    }
      public function getEmail(){
      return $this->email;
    }
      public function getMdp(){
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


  public function insertMembre($prenom, $nom, $email, $mdp, $admin)
  {
    $co = new Db;
    $db = $co->dbCo("panza", "root", "root");

    $sql = "INSERT INTO `membre` (`prenom`,`nom`,`email`,`mot_de_passe`,`is_admin`) VALUES (?,?,?,?,?)";
    $param = [$prenom, $nom, $email, sha1($mdp), $admin];
    $co->SQLWithParam($sql, $param, $db);
  }

  public function refresh()
  {
    header("Location:new_membre.php");
  }

  public function getMembre($id){
  $co = new Db();
  $db = $co->dbCo("panza","root","root");

  /* Utilisation de la fonction SQLWithParam */
  $sql = "SELECT * FROM `membre` where id=?";
  $param = [$id];
  $datas = $co->SQLWithParam($sql,$param,$db);

  if(!empty($datas)){
      $membre = $datas[0];

      $this->nom = $membre["nom"];
      $this->prenom = $membre["prenom"];
      $this->email = $membre["email"];
      $this->mdp = $membre["mot_de_passe"];

    }
    }

  public function setMembre($id,$nom,$prenom,$email,$mdp){

  $co = new Db();
  $db = $co->dbCo("panza","root","root");

  $sql = "UPDATE `membre` SET `nom`=?, `prenom`=?, `email`=?, `mot_de_passe`=? WHERE id=?";
  $param = [$id,$nom,$prenom,$email,$mdp];
  $datas = $co->SQLWithParam($sql,$param,$db);

  }

}
