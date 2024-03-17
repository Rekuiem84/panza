<!-- Pour modifier son profil -->
<?php

require "classes/db.php";
require "classes/form.php";
require "classes/membre.php";

session_start();


if ($_SESSION["is_connected"]) :

  if (isset($_POST["deconnexion"])) {
    session_destroy();
    header("Location: index.php");
  }
  if (!$_SESSION["is_admin"]) {
    header("Location: dashboard_Representations.php");
  }

  $form = new Form;
  $params = [];
  $errors = [];

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

  <?php

  if ($form->isSubmitted()) {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $is_admin = $_POST["is_admin"];

    if ($form->isValidMembre()) {

      $membre = new membre($prenom, $nom, $email, $password, $is_admin);

      $membre->insertMembre($prenom, $nom, $email, $password, $is_admin);
      header("Location: new_Membre.php?success=true");
    } else {
      $errors = $form->getErrorsMembre();
    }
  }


  ?>

  <body>
    <?php
    $activeTab = "creation";
    include "./assets/components/header.php";
    ?>
    <main class="creation">
      <h1>Ajouter un nouveau membre</h1>
      <form method="post">
        <div class="form-content">
          <div>
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="<?php if ($form->isSubmitted()) {
                                                                  if (!empty($_POST["prenom"])) {
                                                                    echo $_POST["prenom"];
                                                                  }
                                                                } ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidMembre())) {
                    echo $errors["nom"];
                  }
                } ?></p>
          </div>
          <div>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?php if ($form->isSubmitted()) {
                                                            if (!empty($_POST["nom"])) {
                                                              echo $_POST["nom"];
                                                            }
                                                          } ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidMembre())) {
                    echo $errors["nom"];
                  }
                } ?></p>
          </div>
          <div>
            <label for="email">email</label>
            <input type="email" id="email" name="email" placeholder="mon-email@gmail.com" value="<?php if ($form->isSubmitted()) {
                                                                                                    if (!empty($_POST["email"])) {
                                                                                                      echo $_POST["email"];
                                                                                                    }
                                                                                                  } ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidMembre())) {
                    echo $errors["email"];
                  }
                } ?></p>
          </div>
          <div>
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" value="<?php if ($form->isSubmitted()) {
                                                                          if (!empty($_POST["password"])) {
                                                                            echo $_POST["password"];
                                                                          }
                                                                        } ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidMembre())) {
                    echo $errors["password"];
                  }
                } ?></p>
          </div>
          <div class="field--radio-cont">
            <p>Cet utilisateur est un</p>
            <div class="field--radio">
              <label for="admin">Admin</label>
              <input type="radio" name="is_admin" id="admin" value="1">
              <label for="membre">Membre</label>
              <input type="radio" name="is_admin" id="membre" value="0" checked>
            </div>

          </div>
        </div>
        <button type="submit">Ajouter un membre</button>
        <?= (isset($_GET["success"])) ? "<p>Membre ajouté avec succès</p>" : ""; ?>
      </form>
    </main>
  </body>

  </html>

<?php

else : header("Location: index.php");

endif;

?>