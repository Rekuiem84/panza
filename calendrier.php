<!-- Pour voir le calendrier -->
<?php

session_start();

if ($_SESSION["is_connected"]) :

  if (isset($_POST["deconnexion"])) {
    session_destroy();
    header("Location: index.php");
  }

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
    <?php
    $activeTab = "dashboard";
    include "./assets/components/header.php";
    ?>
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