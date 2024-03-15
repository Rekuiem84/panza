<?php
require "classes/db.php";
require "classes/comment.php";
require "classes/representation.php";

session_start();

if ($_SESSION["is_connected"]) :
  if (isset($_POST["deconnexion"])) {
    session_destroy();
    header("Location: index.php");
  }

  $id = $_GET["id"];

  $representation = new representation();
  $representation->getRepresentation($id);

  $c = new comment();

  if (!empty($_POST["comment"])) {

    $comment = new comment();
    $membre = $_SESSION["membre_id"];
    $representation_id = $_GET["id"];
    $contenu = $_POST["comment"];
    $comment->insertComment($membre, $representation_id, $contenu);
  }

?>

  <!doctype html>
  <html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description">
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
            <p class="nav__title color-gradient">Tableau de bord <i class='bx bxs-down-arrow color-gradient'></i></p>
            <ul class="nav__submenu">
              <li><a href="./calendrier.php">Calendrier</a></li>
              <li><a href="./dashboard_Representations.php">Voir les représentations</a></li>
            </ul>
          </div>
          <div>
            <p class="nav__title">Création <i class='bx bxs-down-arrow'></i></p>
            <ul class="nav__submenu">
              <li><a href="./new_Spectacle.php">Créer un nouveau spectacle</a></li>
              <li><a href="./new_Atelier.php">Créer un nouvel atelier</a></li>
              <li><a href="./new_Membre.php">Ajouter un nouveau membre</a></li>
            </ul>
          </div>
        </div>
        <div class="user-cont">
          <p><?= $_SESSION["membre_prenom"]; ?></p>
          <div class="img-cont">
            <a href="profil.php"><i class='bx bxs-cog color-gradient'></i></a>
            <form method="post" class="deconnexion">
              <input type="hidden" name="deconnexion" value="true">
              <button>Se déconnecter</button>
            </form>
          </div>
        </div>
      </nav>
    </header>

    <main class="representation-infos">
      <h1><?= $representation->getNom(); ?></h1>
      <p>Type : <?= $representation->getType() ?></p>
      <p>Catégorie : <?= $representation->getCategorie() ?></p>
      <p>Description : <?= $representation->getDescription() ?></p>
      <p>Date : <?= $representation->getDate() ?></p>
      <p>Salle : <?= $representation->getSalle() ?></p>
      <p>Adresse : <?= $representation->getAdresse() ?></p>
      <p>Heure de début : <?= $representation->getHeure() ?></p>
      <p>Statut : <?= $representation->getStatus() ?></p>


      <h2 class="title">Poster un commentaire</h2>
      <form method="POST" class="comment-form">
        <div>
          <label for="comment">Commentaire</label>
          <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        </div>
        <button>Poster</button>
      </form>

      <h2 class="title">Commentaires :</h2>

      <?php
      $comments = $c->getAllCommentsById($id);

      foreach ($comments as $comment) :
      ?>
        <div class="comment">
          <p><span class="bold underline"><?= $comment['utilisateur']; ?></span> : <?= $comment['contenu']; ?></p>
        </div>
      <?php

      endforeach;

      ?>
      </table>

    </main>

  </body>

  </html>
<?php
else :
  header("Location: index.php");
endif;
?>