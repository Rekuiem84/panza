<!-- Pour voir le calendrier -->
<?php

session_start();

if ($_SESSION["is_connected"]) :

?>
  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier</title>
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
          <div class="img-cont"><img src="./assets/images/logo.png" alt="photo de profil"></div>
        </div>
      </nav>
    </header>
    <main class="calendrier">
      <h1>Page en préparation</h1>
    </main>
  </body>

  </html>
<?php
else :
  header("Location: index.php");
endif;
?>