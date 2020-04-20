<?php require 'init.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <title>Formulaire</title>
  <meta charset="utf-8">
</head>

<body>
  <header><?php require "includes/head.php"; ?></header>

  <?php
  if (isset($_POST['submit'])) {

    $commune = $_POST['commune'];
    $cp = $_POST['cp'];
    $rue = $_POST['rue'];
    $numero = $_POST['numero'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $nb_pieces = $_POST['nb_pieces'];
    $choix = $_POST['choix'];


    $sql = "INSERT INTO location(description, prix, nb_pieces, commune, cp, rue, numero, id_u, id_adr, id_cat) VALUES :description, :prix, :nb_pieces, :commune, :cp, :rue, :numero, :id-cat, 1, 1";
  }
  ?>

  <div class="background">
    <section class="cadre">
      <div class="cadre2 center color">
        <form action="#" method='get'>
          <h2> Location </h2>
          <h6> ADRESSE</h6>
          <div class="center">
            Commune : <input type="text" placeholder="Le nom de votre commune" name="commune"><br>
            Code Postale : <input type="number" placeholder="Le numéro de code postale" name="cp"><br>
            Rue : <input type="text" placeholder="Le nom de la rue" name="rue"><br>
            Numéro : <input type="number" placeholder="Le numero de rue" name="numero">

            <h6>INFORMATION DU BIENS</h6>

            <label>
              <select name="choix">
                <option value="demeures"><a href="index_demeures.php">Demeures</a></option>
                <option value="appartement"><a href="index_appartements.php"></a>Appartement</option>
              </select>
            </label>
            <br><br>

            Prix :<input type="number" placeholder="Le prix de vente" name="prix">

            Nombre de pièces :<input type="number" placeholder="Le nombre de pièces" name="piece"><br> <br>

            <textarea class="center4" rows="10" cols="61" name="description" placeholder=" Message ..."></textarea>

            <input type="submit" name="submit">
          </div>
        </form>
      </div>

    </section>

    <footer><?php require "includes/foot.php" ?></footer>

</body>

</html>