<?php

Class log{

    private $id;

    private $email;

    private $mdp;


    public function getID(){
        return $this->id;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getMdp(){
        return $this->mdp;
    }


    public function setEmail($email){
    $this->email = $email;
    }    
    public function setMotdepasse($mdp){
    $this->mdp = $mdp;
    }


    public function isSubmitted(){
        return !empty($_POST);
    }

    public function isValid($params){
        $validated=false;
        if(!empty($_POST["email"]) && !empty($_POST["password"])){
            $validated=true;
        }
        return $validated;
    }

    public function getErrors(){
        $errors=[
            "email" => empty($_POST["email"])? "Merci de renseigner votre email" : "",
            "mdp" => empty($_POST["password"])? "Merci de renseigner votre mot de passe" : ""
        ];
        return $errors;
    }

    /* Renvoie un array avec toute les informations */
    public function getMembers(){
        $co = new Db;
        $db = $co->dbCo("panza","root","root");

        $sql = "SELECT `email`, SHA1(`mot_de_passe`) FROM `membre`";
        $datas = $co->SQLWithoutParam($sql,$db);

        return $datas;
    }

    /* Doit renvoyer un bool*/
    public function checkAcces($logins,$email,$mdp){
        $result = false;
        foreach($logins as $value){
        $email2 = $value["email"];
        $mdp2 = $value["mot_de_passe"];
        if($email2 === $email && $mdp2 === $mdp){
        $result = $value;
        }
        }
        return $result;
    }



    public function connect(){

    }

}

?>