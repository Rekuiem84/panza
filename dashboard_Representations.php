<!-- Pour voir toutes les représentations prévues -->
<?php

require "classes/db.php";
require "classes/representation.php";

session_start();

if ($_SESSION["is_connected"]) :

  if (isset($_POST["deconnexion"])) {
    session_destroy();
    header("Location: index.php");
  }

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
    <?php
    $activeTab = "dashboard";
    include "./assets/components/header.php";
    ?>
    <main class="representations">
      <div>
        <h2>Toutes les représentations</h2>
        <?php
        foreach ($representations as $r) :
          $representation = new representation();
          $representation->getRepresentation($r["id"]);
        ?>
          <div class="representations-cont">
            <p><?= $representation->getNom(); ?> - <?= $representation->getType(); ?> - <?= $representation->getDate() ?> - <?= $representation->getNbComediens() ?> comédiens</p>
            <a href="read_representation.php?id=<?= $representation->getId(); ?>">Voir</a>
            </td>
          </div>
        <?php

        endforeach;

        ?>
      </div>
    </main>
  </body>

  </html>
<?php
else :
  header("Location: index.php");
endif;
?>