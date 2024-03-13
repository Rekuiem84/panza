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
</head>
<body>

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

</body>
</html>