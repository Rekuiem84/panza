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
  <link rel="stylesheet" href="./assets/style/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
     <nav class="nav">
        <div class="logo-cont"><img src="./assets/images/logo-horizontal.png" alt="logo de panza"></div>
        <div class="content-cont">
          <div>
            <p class="nav__title">Tableau de bord <i class='bx bxs-down-arrow'></i></p>
            <ul class="nav__submenu">
              <li><a href="">Calendrier</a></li>
              <li><a href="">Voir les représentations</a></li>
            </ul>
          </div>
          <div>
            <p class="nav__title">Creation <i class='bx bxs-down-arrow'></i></p>
            <ul class="nav__submenu">
              <li><a href="./new_Spectacle.php">Créer un nouveau spectacle</a></li>
              <li><a href="./new_Atelier.php">Créer un nouvel atelier</a></li>
              <li><a href="./new_Membre.php">Ajouter un nouveau membre</a></li>
            </ul>
          </div>
        </div>
        <div class="user-cont">
          <p><?= $_SESSION["membre_prenom"]; ?></p>
          <div class="img-cont"><img src="./assets/images/logo.png" alt="photo de profil"></div>
        </div>
      </nav>
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