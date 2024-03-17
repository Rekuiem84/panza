<!-- Pour modifier son profil -->
<?php

require "classes/db.php";
require "classes/membre.php";
require "classes/form.php";

session_start();

if ($_SESSION["is_connected"]) :

  if (isset($_POST["deconnexion"])) {
    session_destroy();
    header("Location: index.php");
  }
  $id = $_SESSION["membre_id"];

  $membre = new membre("", "", "", "", "");
  $membre->getMembre($id);

  $form = new form();
  $params = [];
  $message = "";


  if ($form->isSubmitted()) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mdp = $_POST["password"];
    $params = [$nom, $prenom, $email, $mdp];

    if ($form->isValidMembre($params)) {
      $membre->setMembre($nom, $prenom, $email, sha1($mdp), $id);
      header("Location: profil.php?success=true");
    } else {
      $errors = $form->getErrorsMembre();
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
    <?php
    $activeTab = "none";
    include "./assets/components/header.php";
    ?>
    <main class="creation">
      <h1>Modifier ses infos</h1>
      <form method="post">
        <div class="form-content">
          <div>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?php if ($form->isSubmitted()) {
                                                            if (!empty($_POST["nom"])) {
                                                              echo $_POST["nom"];
                                                            }
                                                          } else {
                                                            echo $_SESSION["membre_nom"];
                                                          }; ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidAnyForm($params))) {
                    echo $errors["nom"];
                  }
                } ?></p>
          </div>
          <div>
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" value="<?php if ($form->isSubmitted()) {
                                                                  if (!empty($_POST["prenom"])) {
                                                                    echo $_POST["prenom"];
                                                                  }
                                                                } else {
                                                                  echo $_SESSION["membre_prenom"];
                                                                } ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidAnyForm($params))) {
                    echo $errors["prenom"];
                  }
                } ?></p>
          </div>
          <div>
            <label for="email">email</label>
            <input type="text" id="email" name="email" value="<?php if ($form->isSubmitted()) {
                                                                if (!empty($_POST["email"])) {
                                                                  echo $_POST["email"];
                                                                }
                                                              } else {
                                                                echo $_SESSION["membre_email"];
                                                              } ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidAnyForm($params))) {
                    echo $errors["email"];
                  }
                } ?></p>
          </div>
          <div>
            <label for="password">Mot de passe</label>
            <input type="text" id="password" name="password" value="<?php if ($form->isSubmitted()) {
                                                                      if (!empty($_POST["password"])) {
                                                                        echo $_POST["password"];
                                                                      }
                                                                    } ?>">
            <p><?php if ($form->isSubmitted()) {
                  if (!($form->isValidAnyForm($params))) {
                    echo $errors["password"];
                  }
                } ?></p>
          </div>
        </div>
        <button type="submit">Modifier mon profil</button>
        <?= (isset($_GET["success"])) ? "<p>Infos modifiées avec succès</p>" : ""; ?>
      </form>
    </main>
  </body>

  </html>

<?php

else : header("Location: index.php");

endif;

?>