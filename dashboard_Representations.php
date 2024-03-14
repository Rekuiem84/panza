<!-- Pour voir toutes les représentations prévues -->
<?php

require "classes/db.php";
require "classes/representation.php";

session_start();

if ($_SESSION["is_connected"]) :

  $r = new representation();
  $representations = $r->getAllRepresentations();

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
    <style>
      table {
        border-collapse: collapse;
      }

      th,
      td {
        border: 2px solid black;
      }
    </style>
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
          <?php
          if ($_SESSION["is_admin"]) :
          ?>
            <div>
              <p class="nav__title color-gradient">Création <i class='bx bxs-down-arrow color-gradient'></i></p>
              <ul class="nav__submenu">
                <li><a href="./new_Spectacle.php">Créer un nouveau spectacle</a></li>
                <li><a href="./new_Atelier.php">Créer un nouvel atelier</a></li>
                <li><a href="./new_Membre.php">Ajouter un nouveau membre</a></li>
              </ul>
            </div>
          <?php
          endif;
          ?>
        </div>
        <div class="user-cont">
          <p class="user__name"><?= $_SESSION["membre_prenom"]; ?></p>
          <div class="img-cont"><a href="profil.php"><i class='bx bxs-cog color-gradient'></i></a></div>
        </div>
      </nav>
    </header>
    <main>
      <table>
        <tr>
          <th>Nom</th>
          <th>Type</th>
          <th>Categorie</th>
          <th>Date</th>
          <th>Description</th>
          <th>Statut</th>
          <th>Actions</th>
        </tr>

        <?php
        foreach ($representations as $r) :
          $representation = new representation();
          $representation->getRepresentation($r["id"]);
        ?>
          <tr>
            <td><?= $representation->getNom(); ?></td>
            <td><?= $representation->getType(); ?></td>
            <td><?= $representation->getCategorie(); ?></td>
            <td><?= $representation->getDate() ?></td>
            <td><?= $representation->getDescription() ?></td>
            <td><?= $representation->getStatus() ?></td>
            <td>
              <a href="read_representation.php?id=<?= $representation->getId(); ?>">Voir</a>
            </td>
          </tr>
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