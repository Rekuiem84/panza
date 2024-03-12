<?php

class log
{

    private $id;

    private $email;

    private $mdp;


    public function getID()
    {
        return $this->id;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getMdp()
    {
        return $this->mdp;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setMotdepasse($mdp)
    {
        $this->mdp = $mdp;
    }

    /* Renvoie un array avec toute les informations */
    public function getMembers()
    {
        $co = new Db;
        $db = $co->dbCo("panza", "root", "root");

        $sql = "SELECT `email`, SHA1(`mot_de_passe`) mot_de_passe FROM `membre`";
        $datas = $co->SQLWithoutParam($sql, $db);

        return $datas;
    }

    /* Doit renvoyer un bool*/
    public function checkAcces($logins, $email, $mdp)
    {
        foreach ($logins as $value) {
            $email2 = $value["email"];
            if ($email2 === $email) {
                $mdp2 = $value["mot_de_passe"];
                $mdp = sha1($mdp);
                return $mdp2 === $mdp;
            } else {
                return false;
            }
        }
    }

    public function connect()
    {
        header("Location:calendrier.php");
    }
}
