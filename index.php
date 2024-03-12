<!-- Page login -->
<?php

require "classes/db.php";
require "classes/log.php";
$f = new log;
$params=[];
$errors=[];
$message="";

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
        $email=$_POST["email"];
        $mdp=$_POST["password"];
          if ($f->checkAcces($logins,$email,$mdp)) {
            $message = "gg t'as réussi le boss";
          }
          else{
            $message = "ça correspond pas";
          }
      }else{
        $errors=$f->getErrors();
      }
    }

  ?>

  <form action="" method="POST">
    <div>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="votremail@exemple.com" value="<?php if($f->isSubmitted()){if(!empty($_POST["email"])){echo $_POST["email"];}}?>">
      <p><?php if($f->isSubmitted()){if(!($f->isValid($params))){echo $errors["email"];}}?></p>
    </div>
    <div>
      <label for="password">Mot de passe</label>
      <input type="password" name="password" id="password" placeholder="*************">
      <p><?php if($f->isSubmitted()){if(!($f->isValid($params))){echo $errors["mdp"];}}?></p>
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

  <?= $message ?>

</body>

</html>