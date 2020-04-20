<?php require 'init.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Demeures</title>
  <meta charset="utf-8">
</head>

<body>
  <header><?php require "includes/head.php" ?></header>
  <?php
  if (isset($_POST['submit']) && isset($_SESSION['id_u'])) {
    $requete = $bdd->prepare("INSERT INTO post2(contenu, u_id, t_id) VALUES(:contenu, :u_id, :t_id)");
    $requete->bindParam(':contenu', $contenu);
    $requete->bindParam(':u_id', $u_id);
    $requete->bindParam(':t_id', $t_id);
    $contenu = $_POST['contenu'];
    $u_id = $_SESSION['id_u'];
    $t_id = 1;
    $requete->execute();
  }

  ?>

  <div class="background">

    <section class="cadre">
    </section>

    <div class="background">
      <div class="commentaire">
        <h4>Espaces Commentaires</h4>
      </div>
      <?php
      $requete = $bdd->prepare("SELECT post2.contenu, users.nom, users.prenom FROM post2, users WHERE post2.u_id = users.id_u AND post2.t_id = 1");

      $requete->execute();
      while ($reponse = $requete->fetch()) {
        echo "<section class='cadre'>
       <p>
       <div class='name'> " . $reponse['nom'] . " " . $reponse['prenom'] . "
       a écrit : <br></div><div class='contenu'>  " . $reponse['contenu'] . " </div></p></section>";
      }
      ?>


      <form class="commentaire" action="" method="POST">
        <textarea name="contenu" id="desc" cols="30" rows="10"></textarea><br>
        <input class="center3" type="submit" name="submit" value="Poster">
        <script src="http://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
        <script>
          CKEDITOR.replace('desc');
        </script>
      </form>
    </div>
    <footer><?php require "includes/foot.php"; ?></footer>


</body>

</html>