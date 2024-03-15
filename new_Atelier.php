<!-- Pour creer un atelier -->
<?php

require "classes/db.php";
require "classes/form.php";
require "classes/atelier.php";

session_start();

if ($_SESSION["is_connected"]) :

  if (isset($_POST["deconnexion"])) {
    session_destroy();
    header("Location: index.php");
  }

  $form = new Form;
  $params = [];
  $errors = [];

?>
  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'atelier</title>
    <link rel="stylesheet" href="./assets/style/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>

  <?php

  if ($form->isSubmitted()) {
    if ($form->isValidAnyForm($params)) {
      $nom = $_POST["name"];
      $description = $_POST["description"];
      $date = $_POST["date"];
      $nb_comediens = $_POST["nb_comediens"];
      $heure = $_POST["start_time"];
      $addresse = $_POST["address"];

      $spectacle = new Atelier($nom, $description, $date, $nb_comediens, $addresse, $heure);

      $adressAlreadyExists = $spectacle->isAdressInDb($addresse);
      if (!$adressAlreadyExists) {
        $spectacle->insertSalle($addresse);
      }
      $salleId = $spectacle->getSalleId($addresse);
      $spectacle->insertAtelier($nom, $description, $date, $nb_comediens, $salleId, $heure);
    } else {
      $errors = $form->getErrorsSpec();
    }
  }


  ?>

  <body>
    <header>
      <nav class="nav">
        <div class="logo-cont"><img src="./assets/images/logo-horizontal.png" alt="logo de panza"></div>
        <div class="content-cont">
          <div>
            <p class="nav__title">Tableau de bord <i class='bx bxs-down-arrow'></i></p>
            <ul class="nav__submenu">
              <li><a href="./calendrier.php">Calendrier</a></li>
              <li><a href="./dashboard_Representations.php">Voir les représentations</a></li>
            </ul>
          </div>
          <div>
            <p class="nav__title color-gradient">Création <i class='bx bxs-down-arrow color-gradient'></i></p>
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
    <main class="creation creation--atelier">
      <h1>Créer un atelier</h1>
      <form method="post">
        <div class="form-content">
          <div>
            <label for="name">Nom de l'atelier</label>
            <input type="text" id="name" name="name" placeholder="Cyrano de Bergerac" value="<?php if ($form->isSubmitted()) {
                                                                                                if (!empty($_POST["name"])) {
                                                                                                  echo $_POST["name"];
                                                                                                }
                                                                                              } ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidAnyForm($params))) {
                    echo $errors["name"];
                  }
                } ?></p>
          </div>
          <div>
            <label for="date">Date</label>
            <input type="text" id="date" name="date" placeholder="jj/mm/aaaa" value="<?php if ($form->isSubmitted()) {
                                                                                        if (!empty($_POST["date"])) {
                                                                                          echo $_POST["date"];
                                                                                        }
                                                                                      } ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidAnyForm($params))) {
                    echo $errors["date"];
                  }
                } ?></p>
          </div>
          <div>
            <label for="start_time">Heure de début</label>
            <input type="text" id="start_time" name="start_time" placeholder="hh:mm" value="<?php if ($form->isSubmitted()) {
                                                                                              if (!empty($_POST["start_time"])) {
                                                                                                echo $_POST["start_time"];
                                                                                              }
                                                                                            } ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidAnyForm($params))) {
                    echo $errors["start_time"];
                  }
                } ?></p>
          </div>
          <div>
            <label for="address">Adresse</label>
            <input type="text" id="address" name="address" placeholder="15 rue du Grand théâtre, Bordeaux" value="<?php if ($form->isSubmitted()) {
                                                                                                                    if (!empty($_POST["address"])) {
                                                                                                                      echo $_POST["address"];
                                                                                                                    }
                                                                                                                  } ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidAnyForm($params))) {
                    echo $errors["address"];
                  }
                } ?></p>
          </div>
          <div class="field--textarea">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4"><?php if ($form->isSubmitted()) {
                                                                      if (!empty($_POST["description"])) {
                                                                        echo $_POST["description"];
                                                                      }
                                                                    } ?></textarea>
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidAnyForm($params))) {
                    echo $errors["description"];
                  }
                } ?></p>
          </div>
          <div>
            <label for="nb_comediens">Nombre de comédiens</label>
            <input type="text" id="nb_comediens" name="nb_comediens" placeholder="30" value="<?php if ($form->isSubmitted()) {
                                                                                                if (!empty($_POST["nb_comediens"])) {
                                                                                                  echo $_POST["nb_comediens"];
                                                                                                }
                                                                                              } ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidAnyForm($params))) {
                    echo $errors["nb_comediens"];
                  }
                } ?></p>
          </div>
        </div>
        <button type="submit">Ajouter l'atelier</button>
        <?= (isset($_GET["success"])) ? "<p>Spectacle ajouté avec succès</p>" : ""; ?>
      </form>
    </main>
  </body>

  </html>
<?php
else :
  header("Location: index.php");
endif;
?>