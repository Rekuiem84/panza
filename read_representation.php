<?php
    require "classes/db.php";
    require "classes/comment.php";
    require "classes/representation.php";

    $id = $_GET["id"];

    $representation = new representation();
    $representation->getRepresentation($id);

    $c = new comment();
    $comments = $c->getAllComments();

        if(!empty($_POST["prenom"]) && !empty($_POST["comment"])){

        $comment = new comment();
        $membre = $representation->getId();
        // $representation = ID UTILISATEUR;
        $contenu = $_POST["comment"];
        $comment->insertComment($membre,$representation,$contenu);


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
        <p class="nav__title">Tableau de bord <i class='bx bxs-down-arrow'></i></p>
        <ul class="nav__submenu">
            <li><a href="">Calendrier</a></li>
            <li><a href="">Voir les représentations</a></li>
        </ul>
        </div>
        <div>
        <p class="nav__title">Creation <i class='bx bxs-down-arrow'></i></p>
        <ul class="nav__submenu">
            <li><a href="./new_Spectacle.php">Créer un nouveau spectacle</a></li>
            <li><a href="./new_Atelier.php">Créer un nouvel atelier</a></li>
            <li><a href="./new_Membre.php">Ajouter un nouveau membre</a></li>
        </ul>
        </div>
    </div>
    <div class="user-cont">
        <p><?= $_SESSION["membre_prenom"]; ?></p>
        <div class="img-cont"><img src="./assets/images/logo.png" alt="photo de profil"></div>
    </div>
    </nav>
</header>

<main>
    <h1><?= $representation->getNom(); ?></h1>
    <p><?= $representation->getType() ?></p>
    <p><?= $representation->getCategorie() ?></p>
    <p><?= $representation->getDescription() ?></p>
    <p><?= $representation->getDate() ?></p>
    <p><?= $representation->getHeure() ?></p>
    <p><?= $representation->getStatus() ?></p>


    <form action="#" method="POST">
        <h2>Poster un commentaire</h2>
        <div>
            <label for="prénom">Prénom</label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div>
            <label for="comment">Commentaire</label>
            <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
        </div>
        <div>
            <button>Poster</button>
        </div>
    </form>

    <h2>Commentaires :</h2>

</main>

</body>
</html>