<!-- Pour creer un membre -->
<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un membre</title>
</head>
<body>
  <header>
    <nav></nav>
  </header>
  <main>
    <p>Ajouter un membre</p>
    <form method="POST">
      <div>
        <label for="prénom">Prénom</label>
        <input type="text" name="prénom" id="prénom">
      </div>
      <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom">
      </div>
      <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
      </div>
      <div>
        <label for="mdp">Mot de passe</label>
        <input type="password" name="mdp" id="mdp">
      </div>
      <div>
        <label for="check">Ce membre est-il un admin ou pas ?</label>
        <input type="checkbox" name="check" id="oui">
        <label for="check">oui</label>
      </div>
    </form>
  </main>
</body>
</html>