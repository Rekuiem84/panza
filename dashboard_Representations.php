<!-- Pour voir toutes les représentations prévues -->
<?php

require "classes/db.php";
require "classes/representation.php";

$r = new representation();
$representations = $r->getAllRepresentations();

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <header>
    <nav></nav>
  </header>
  <main>
        <table>
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Categorie</th>
            <th>Date</th>
            <th>Description</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <?php
            foreach($representations as $r):
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