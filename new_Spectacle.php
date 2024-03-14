<!-- Pour creer un spectacle -->
<?php

require "classes/db.php";
require "classes/form.php";
require "classes/spectacle.php";

session_start();

if ($_SESSION["isConnected"]) :

  $form = new Form;
  $params = [];
  $errors = [];

?>
  <!DOCTYPE html>
  <html lang="fr">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de spectacle</title>
  </head>

  <?php

  if ($form->isSubmitted()) {
    if ($form->isValidAnyForm($params)) {
      $nom = $_POST["name"];
      $categorie = $_POST["category"];
      $description = $_POST["description"];
      $date = $_POST["date"];
      $nb_comediens = $_POST["nb_comediens"];
      $heure = $_POST["start_time"];
      $addresse = $_POST["address"];

      $spectacle = new Spectacle($nom, $categorie, $description, $date, $nb_comediens, $addresse, $heure);

      $adressAlreadyExists = $spectacle->isAdressInDb($addresse);
      if (!$adressAlreadyExists) {
        $spectacle->insertSalle($addresse);
      }
      $salleId = $spectacle->getSalleId($addresse);
      $spectacle->insertSpectacle($nom, $categorie, $description, $date, $nb_comediens, $salleId, $heure);
    } else {
      $errors = $form->getErrorsSpec();
    }
  }


  ?>

  <body>
    <header>
      <nav></nav>
    </header>
    <main>
      <h1>Créer un spectacle</h1>
      <form method="post">
        <div>
          <label for="name">Nom du spectacle</label>
          <input type="text" id="name" name="name" value="<?php if ($form->isSubmitted()) {
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
          <label for="category">Catégorie</label>
          <input type="text" id="category" name="category" value="<?php if ($form->isSubmitted()) {
                                                                    if (!empty($_POST["category"])) {
                                                                      echo $_POST["category"];
                                                                    }
                                                                  } ?>">
          <p><?php if ($form->isSubmitted()) {
                if (!($form->isValidAnyForm($params))) {
                  echo $errors["category"];
                }
              } ?></p>
        </div>
        <div>
          <label for="date">Date</label>
          <input type="text" id="date" name="date" value="<?php if ($form->isSubmitted()) {
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
          <input type="text" id="start_time" name="start_time" value="<?php if ($form->isSubmitted()) {
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
          <input type="text" id="address" name="address" value="<?php if ($form->isSubmitted()) {
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
        <div>
          <label for="nb_comediens">Nombre de comédiens</label>
          <input type="text" id="nb_comediens" name="nb_comediens" value="<?php if ($form->isSubmitted()) {
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
        <div>
          <label for="description">Description</label>
          <textarea id="description" name="description"><?php if ($form->isSubmitted()) {
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
        <button type="submit">Ajouter le spectacle</button>
      </form>
    </main>
  </body>

  </html>
<?php
else :
  header("Location: index.php");
endif;
?>