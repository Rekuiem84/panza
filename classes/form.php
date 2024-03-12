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
}

?>