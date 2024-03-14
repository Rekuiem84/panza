<!-- Pour modifier son profil -->
<?php

require "classes/db.php";
require "classes/membre.php";
require "classes/form.php";

session_start();

if ($_SESSION["is_connected"]) :

$id= $_SESSION["membre_id"];

$m= new membre();
$m->getMembre($id);

$f= new form();
$params=[];
$message="";

if($f->isSubmitted()){
  if ($f->isValidAnyForm($params)) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $m->setMembre($id,$nom,$prenom,$email,$mdp);
    $message = "Données modifiées avec succés";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="./assets/style/style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
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
          <div class="img-cont"><i class='bx bxs-cog color-gradient' ></i></div>
        </div>
      </nav>
  </header>
  <main>
    <form method="POST">
      <div>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" value="<?= $membre->getPrenom();?>">
      </div>
      <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="<?= $membre->getNom();?>">
      </div>
      <div>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $membre->getEmail();?>">
      </div>
      <div>
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" value="<?= $membre->getMdp();?>">
      </div>
      <div>
        <button type="submit">Modifier les informations</button>
      </div>
    </form>
    <p><?= $message ?></p>
  </main>
</body>
</html>

<?php 

else: header("Location: index.php");

endif;

?>