<?php

class form{

      public function isSubmitted()
    {
        return !empty($_POST);
    }

    public function isValid($params)
    {
        $validated = false;
        if (!empty($_POST["email"]) && !empty($_POST["password"])) {
            $validated = true;
        }
        return $validated;
    }

    public function getErrors()
    {
        $errors = [
            "email" => empty($_POST["email"]) ? "Merci de renseigner votre email" : "",
            "mdp" => empty($_POST["password"]) ? "Merci de renseigner votre mot de passe" : ""
        ];
        return $errors;
      
    }

    public function isValidSpec($params)
    {
        $validated = false;
        if (!empty($_POST["name"]) && !empty($_POST["category"]) && !empty($_POST["date"]) &&!empty($_POST["start_time"]) && !empty($_POST["address"]) && !empty($_POST["nb_comedians"]) && !empty($_POST["description"])) {
            $validated = true;
        }
        return $validated;
    }

      public function getErrorsSpec()
    {
        $errors = [
            "name" => empty($_POST["name"]) ? "Merci de renseigner le nom" : "",
            "category" => empty($_POST["category"]) ? "Merci de renseigner la catégorie" : "",
            "date" => empty($_POST["date"]) ? "Merci de renseigner la date" : "",
            "start_time" => empty($_POST["start_time"]) ? "Merci de renseigner l'heure de début" : "",
            "address" => empty($_POST["address"]) ? "Merci de renseigner l'addresse" : "",
            "nb_comedians" => empty($_POST["nb_comedians"]) ? "Merci de renseigner le nombre de comédien" : "",
            "description" => empty($_POST["description"]) ? "Merci de renseigner la description" : ""
        ];
        return $errors;
      
    }
}

?>