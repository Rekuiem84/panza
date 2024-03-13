<!-- Pour creer un spectacle -->
<?php

require "classes/db.php";
require "classes/form.php";
require "classes/spec.php";

$f = new form;
$s = new spec;
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

if($f->isSubmitted()){
  if ($f->isValidSpec($params)) {
    $nom=$_POST["name"];
    $categorie = $_POST["category"];
    $date=$_POST["date"];
    $description=$_POST["description"];
    $nbrcom=$_POST["nb_comedians"];
    $heure=$_POST["start_time"];
    $addresse=$_POST["address"];
    $s->insertSpectacle($nom,$categorie,$description,$date,$nbrcom,$heure);
    $s->insertSalle($addresse);
  }else{
    $errors=$f->getErrorsSpec();
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
        <input type="text" id="name" name="name" value="<?php if ($f->isSubmitted()) {
                                                                                                  if (!empty($_POST["name"])) {
                                                                                                    echo $_POST["name"];
                                                                                                  }
                                                                                                } ?>">
        <p><?php if ($f->isSubmitted()) {
              if (!($f->isValidSpec($params))) {
                echo $errors["name"];
              }
            } ?></p>
      </div>
      <div>
        <label for="category">Catégorie</label>
        <input type="text" id="category" name="category" value="<?php if ($f->isSubmitted()) {
                                                                                                  if (!empty($_POST["category"])) {
                                                                                                    echo $_POST["category"];
                                                                                                  }
                                                                                                } ?>">
        <p><?php if ($f->isSubmitted()) {
              if (!($f->isValid($params))) {
                echo $errors["category"];
              }
            } ?></p>
      </div>
      <div>
        <label for="date">Date</label>
        <input type="text" id="date" name="date" value="<?php if ($f->isSubmitted()) {
                                                                                                  if (!empty($_POST["date"])) {
                                                                                                    echo $_POST["date"];
                                                                                                  }
                                                                                                } ?>">
        <p><?php if ($f->isSubmitted()) {
              if (!($f->isValid($params))) {
                echo $errors["date"];
              }
            } ?></p>
      </div>
      <div>
        <label for="start_time">Heure de début</label>
        <input type="text" id="start_time" name="start_time" value="<?php if ($f->isSubmitted()) {
                                                                                                  if (!empty($_POST["start_time"])) {
                                                                                                    echo $_POST["start_time"];
                                                                                                  }
                                                                                                } ?>">
        <p><?php if ($f->isSubmitted()) {
              if (!($f->isValid($params))) {
                echo $errors["start_time"];
              }
            } ?></p>
      </div>
      <div>
        <label for="address">Adresse</label>
        <input type="text" id="address" name="address" value="<?php if ($f->isSubmitted()) {
                                                                                                  if (!empty($_POST["address"])) {
                                                                                                    echo $_POST["address"];
                                                                                                  }
                                                                                                } ?>">
        <p><?php if ($f->isSubmitted()) {
              if (!($f->isValid($params))) {
                echo $errors["address"];
              }
            } ?></p>
      </div>
      <div>
        <label for="nb_comedians">Nombre de comédiens</label>
        <input type="text" id="nb_comedians" name="nb_comedians" value="<?php if ($f->isSubmitted()) {
                                                                                                  if (!empty($_POST["nb_comedians"])) {
                                                                                                    echo $_POST["nb_comedians"];
                                                                                                  }
                                                                                                } ?>">
        <p><?php if ($f->isSubmitted()) {
              if (!($f->isValid($params))) {
                echo $errors["nb_comedians"];
              }
            } ?></p>
      </div>
      <div>
        <label for="description">Description</label>
        <textarea id="description" name="description"><?php if ($f->isSubmitted()) {
                                                                                                  if (!empty($_POST["description"])) {
                                                                                                    echo $_POST["description"];
                                                                                                  }
                                                                                                } ?></textarea>
        <p><?php if ($f->isSubmitted()) {
              if (!($f->isValid($params))) {
                echo $errors["description"];
              }
            } ?></p>
      </div>
      <button type="submit">Ajouter le spectacle</button>
    </form>
  </main>
</body>

</html>