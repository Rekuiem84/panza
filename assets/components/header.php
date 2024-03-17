<header>
  <nav class="nav">
    <div class="logo-cont"><img src="./assets/images/logo-horizontal.png" alt="logo de panza"></div>
    <div class="content-cont">
      <div>
        <p class="nav__title <?php if ($activeTab == "dashboard") {
                                echo 'color-gradient';
                              } ?>">Tableau de bord
          <i class='bx bxs-down-arrow 
        <?php if ($activeTab == "dashboard") {
          echo 'color-gradient';
        } ?>'></i>
        </p>
        <ul class="nav__submenu">
          <li><a href="./calendrier.php">Calendrier</a></li>
          <li><a href="./dashboard_Representations.php">Voir les représentations</a></li>
        </ul>
      </div>
      <?php
      if ($_SESSION["is_admin"]) :
      ?>
        <div>
          <p class="nav__title <?php if ($activeTab == "creation") {
                                  echo 'color-gradient';
                                } ?>">Création
            <i class='bx bxs-down-arrow 
            <?php if ($activeTab == "creation") {
              echo 'color-gradient';
            } ?>'></i>
          </p>
          <ul class="nav__submenu">
            <li><a href="./new_Spectacle.php">Créer un nouveau spectacle</a></li>
            <li><a href="./new_Atelier.php">Créer un nouvel atelier</a></li>
            <li><a href="./new_Membre.php">Ajouter un nouveau membre</a></li>
          </ul>
        </div>
      <?php
      endif;
      ?>
    </div>
    <div class="user-cont">
      <p><?= $_SESSION["membre_prenom"]; ?></p>
      <div class="img-cont">
        <a href="profil.php"><i class='bx bxs-cog color-gradient'></i></a>
        <form method="post" class="deconnexion">
          <input type="hidden" name="deconnexion" value="true">
          <button>Se déconnecter</button>
        </form>
      </div>
    </div>
  </nav>
</header>