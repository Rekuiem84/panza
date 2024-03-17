<!-- Page login -->
<?php

require "classes/db.php";
require "classes/form.php";
require "classes/login.php";

session_start();

$form = new Form;
$login = new Login;
$params = [];
$errors = [];
$message = "";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panza - Troupe de théâtre</title>
  <link rel="stylesheet" href="./assets/style/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <meta name="description" content="Troupe de théâtre sur bordaux">
</head>

<body>

  <?php
  if ($form->isSubmitted()) {
    if ($form->isValidLoginForm($params)) {
      $email = $_POST["email"];
      $mdp = $_POST["password"];
      if ($login->checkAccess($email, $mdp)) {
        $userData = $form->getUserData($email)[0];
        // ajouter un array avec toutes les infos du man avec une fonction de membre
        $_SESSION["is_connected"] = true;
        $_SESSION["is_admin"] = boolval($userData["is_admin"]);
        $_SESSION["membre_id"] = $userData["id"];
        $_SESSION["membre_prenom"] = $userData["prenom"];
        $_SESSION["membre_nom"] = $userData["nom"];
        $_SESSION["membre_email"] = $userData["email"];
        $login->connect();
      } else {
        $message = "Email ou mot de passe incorrect";
      }
    } else {
      $errors = $form->getErrors();
    }
  }
  ?>
  <main class="login">
    <div class="login__title-cont">
      <div class="img-cont"><img src="./assets/images/logo.png" alt="logo de panza"></div>
      <div class="content-cont">
        <h1 class="title">Bienvenue chez <span class="color-gradient">Panza</span>.</h1>
        <p>La troupe de théâtre bordelaise est prête à <span class="color-gradient">vous accueillir</span> et à vous partager notre <span class="color-gradient">passion</span>.</p>
      </div>
      <div>
        <i class='bx bx-share-alt'></i>
        <p>Fait par la <span>Kaizen Agency</span></p>
      </div>
    </div>
    <div class="login__form-cont">
      <div class="img-cont"><img src="./assets/images/logo-vertical-noir.png" alt="logo de panza"></div>
      <h2 class="underline">Se connecter</h2>
      <form class="login__form" method="POST">
        <div class="login__field">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" placeholder="votremail@exemple.com" value="
          <?php if ($form->isSubmitted()) {
            if (!empty($_POST["email"])) {
              echo $_POST["email"];
            }
          } ?>">
          <p><?php if ($form->isSubmitted()) {
                if (!($form->isValidLoginForm($params))) {
                  echo $errors["email"];
                }
              } ?></p>
        </div>
        <div class="login__field">
          <label for="password">Mot de passe</label>
          <input type="password" name="password" id="password" placeholder="••••••••••">
          <p><?php if ($form->isSubmitted()) {
                if (!($form->isValidLoginForm($params))) {
                  echo $errors["mdp"];
                }
              } ?></p>
        </div>
        <div class="login__field--additional">
          <div>
            <input type="checkbox" name="checkbox" id="checkbox">
            <label for="checkbox">Se souvenir de moi</label>
          </div>
          <a href="#">Mot de passe oublié ?</a>
        </div>
        <button>Se connecter</button>
      </form>
      <p data-type="error"><?= $message ?></p>
    </div>
  </main>


</body>

</html>