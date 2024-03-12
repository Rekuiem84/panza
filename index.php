<!-- Page login -->
<?php

require "classes/db.php";
require "classes/log.php";

session_start();

$f = new log;
$params = [];
$errors = [];
$message = "";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panza - Troupe de théatre</title>
  <link rel="stylesheet" href="./assets/style/style.css">
</head>

<body>

  <?php

  if ($f->isSubmitted()) {
    if ($f->isValid($params)) {
      $logins = $f->getMembers();
      $email = $_POST["email"];
      $mdp = $_POST["password"];
      if ($f->checkAcces($logins, $email, $mdp)) {
        $f->connect();
      } else {
        $message = "Email ou mot de passe incorrect";
      }
    } else {
      $errors = $f->getErrors();
    }
  }
  ?>
  <main>
    <div>
      <div class="img-cont"><img src="./assets/images/logo.png" alt="logo de panza"></div>
      <div class="content-cont">
        <h1>Bienvenue chez <span>Panza</span>.</h1>
        <p>La troupe de théâtre bordealaise est prête à <span>vous accueillir</span> et à partager notre <span>passion</span>.</p>
      </div>
      <div>
        <img src="" alt="logo">
        <p>Fait par la Kaizen Agency</p>
      </div>
    </div>
    <div></div>
    <form action="#" method="POST">
      <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="votremail@exemple.com" value="<?php if ($f->isSubmitted()) {
                                                                                                  if (!empty($_POST["email"])) {
                                                                                                    echo $_POST["email"];
                                                                                                  }
                                                                                                } ?>">
        <p><?php if ($f->isSubmitted()) {
              if (!($f->isValid($params))) {
                echo $errors["email"];
              }
            } ?></p>
      </div>
      <div>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="*************">
        <p><?php if ($f->isSubmitted()) {
              if (!($f->isValid($params))) {
                echo $errors["mdp"];
              }
            } ?></p>
      </div>
      <div>
        <input type="checkbox" name="checkbox" id="checkbox">
        <label for="checkbox">Se souvenir de moi</label>
      </div>
      <div>
        <a href="#">Mot de passe oublié ?</a>
      </div>
      <button>Se connecter</button>
    </form>
  </main>

  <p><?= $message ?></p>

</body>

</html>