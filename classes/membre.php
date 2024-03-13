<?php

class membre
{

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
    header("Location:membre.php");
  }
}
