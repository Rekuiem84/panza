<?php

Class spec{

    private $id;

    private $nom;

    private $categorie;

    private $description;

    private $date;

    private $adresse;

    private $nbrcom;

    private $heure;


    public function getID()
    {
        return $this->id;
    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


}

?>