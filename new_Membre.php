<!-- Pour creer un membre -->
<?php

require "classes/db.php";
require "classes/membre.php";
require "classes/form.php";

$f = new Form;
$m = new membre;
$params = [];
$errors = [];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un membre</title>
</head>

<body>

  <?php
  if ($f->isSubmitted()) {
    if ($f->isValidMembre($params)) {
      $prenom = $_POST["prenom"];
      $nom = $_POST["nom"];
      $email = $_POST["email"];
      $mdp = $_POST["mdp"];
      $admin = isset($_POST["check"]);
      $m->insertMembre($prenom, $nom, $email, $mdp, $admin);
      $m->refresh();
    } else {
      $errors = $f->getErrorsMembre();
    }
  }
  ?>
  <header>
    <nav></nav>
  </header>
  <main>
    <p>Ajouter un membre</p>
    <form method="POST">
      <div>
        <label for="prénom">Prénom</label>
        <input type="text" name="prenom" id="prenom" value="
        <?php if ($f->isSubmitted()) {
          if (!empty($_POST["prenom"])) {
            echo $_POST["prenom"];
          }
        } ?>">
        <p>
          <?php if ($f->isSubmitted()) {
            if (!($f->isValidMembre($params))) {
              echo $errors["prenom"];
            }
          }
          ?>
        </p>
      </div>
      <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="
        <?php if ($f->isSubmitted()) {
          if (!empty($_POST["nom"])) {
            echo $_POST["nom"];
          }
        } ?>">
        <p>
          <?php if ($f->isSubmitted()) {
            if (!($f->isValidMembre($params))) {
              echo $errors["nom"];
            }
          }
          ?>
        </p>
      </div>
      <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="
        <?php if ($f->isSubmitted()) {
          if (!empty($_POST["email"])) {
            echo $_POST["email"];
          }
        } ?>">
        <p>
          <?php if ($f->isSubmitted()) {
            if (!($f->isValidMembre($params))) {
              echo $errors["email"];
            }
          }
          ?>
        </p>
      </div>
      <div>
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp" value="<?php if ($f->isSubmitted()) {
                                                            if (!empty($_POST["mdp"])) {
                                                              echo $_POST["mdp"];
                                                            }
                                                          } ?>">
        <p>
          <?php if ($f->isSubmitted()) {
            if (!($f->isValidMembre($params))) {
              echo $errors["mdp"];
            }
          }
          ?>
        </p>
      </div>
      <div>
        <label for="check">Ce membre est-il un admin ou pas ?</label>
        <input type="checkbox" name="check" id="oui" <?php if ($f->isSubmitted()) {
                                                        if (isset($_POST["check"])) {
                                                          echo "checked";
                                                        }
                                                      } ?>>
        <label for="check">oui</label>
        <p></p>
      </div>
      <div>
        <button type="submit">Ajouter</button>
      </div>
    </form>
  </main>
</body>

</html>