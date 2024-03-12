<!-- Pour creer un spectacle -->
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Création de spectacle</title>
</head>

<body>
  <header>
    <nav></nav>
  </header>
  <main>
    <h1>Créer un spectacle</h1>
    <form method="post">
      <div><label for="name">Nom du spectacle</label><input type="text" id="name" name="name"></div>
      <div><label for="category">Catégorie</label><input type="text" id="category" name="category"></div>
      <div><label for="date">Date</label><input type="text" id="date" name="date"></div>
      <div><label for="start_time">Heure de début</label><input type="text" id="start_time" name="start_time"></div>
      <div><label for="address">Adresse</label><input type="text" id="address" name="address"></div>
      <div><label for="nb_comedians">Nombre de comédiens</label><input type="text" id="nb_comedians" name="nb_comedians"></div>
      <div><label for="description">Description</label><textarea id="description" name="description"></textarea></div>
    </form>
  </main>
</body>

</html>