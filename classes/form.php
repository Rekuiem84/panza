<?php

class Form
{
    // Cette fonction vérifie si le formulaire a été soumis 
    public function isSubmitted(): bool
    {
        return !empty($_POST);
    }

    // Cette fonction vérifie tous les champs du formulaire de login sont remplis
    public function isValidLoginForm(): bool
    {
        return (!empty($_POST["email"]) && !empty($_POST["password"]));
    }

    // Cette fonction renvoie un array avec les erreurs de validation du formulaire
    public function getErrors(): array
    {
        $errors = [
            "email" => empty($_POST["email"]) ? "Merci de renseigner votre email" : "",
            "mdp" => empty($_POST["password"]) ? "Merci de renseigner votre mot de passe" : ""
        ];
        return $errors;
    }

    // Cette fonction vérifie si les champs spécifiés dans le paramètre $params sont valides (non vides)
    // $params est un array associatif
    public function isValidAnyForm($params): bool
    {
        foreach ($params as $param) {
            if (empty($_POST[$param])) {
                return false;
            }
        }
        return true;
    }

    // Cette fonction renvoie un array avec les erreurs de validation du formulaire de création de spectacle
    public function getErrorsSpec(): array
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
