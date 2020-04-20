<?php require 'init.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Profil</title>
  <meta charset="utf-8">
</head>

<body>

  <header><?php require "includes/head.php"; ?></header>

  <?php

  if (isset($_POST['submit'])) {
    $mdp = sha1($_POST['mdp']);
    $email = $_POST['email'];


    $requete = $bdd->query("UPDATE users SET mdp = '$mdp', email = '$email' WHERE id_u = " . $_SESSION['id_u']);
  }

  $requete = $bdd->query("SELECT * FROM users WHERE id_u = " . $_SESSION['id_u']);
  $reponse = $requete->fetch();

  ?>




  <div class="background">
    <section class="cadre">
      <div class=" center cadre2">


        <form class="center" method="post" enctype="multipart/form-data">
          <div>
            <h5 class="h5">Bienvenue sur votre profil</h5>
            <span>

              Email :<input type="email" placeholder="Changer d'email" name="email" value="<?php echo    $reponse['email']; ?>"><br>
              Mot de passe :<input type="password" placeholder="Changer mot de passe" name="mdp"><br>

            </span>
            <input type="submit" name="submit" />
          </div>
          <br>
          <a class="vente" href="index_vente.php">Besoin de Vendre ?</a>
          <a class="location" href="index_formlocation.php">Promouvoir une location ?</a>
        </form>
      </div>

    </section>


    <footer><?php require "includes/foot.php" ?></footer>

</body>

</html>