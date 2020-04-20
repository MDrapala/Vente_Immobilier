<?php require 'init.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Vente</title>
    <meta charset="utf-8">
</head>

<body>

</body>

</html>
<header><?php require "includes/head.php"; ?>
</header>

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


    $sql = "INSERT INTO biens(description, prix, nb_pieces, commune, cp, rue, numero, id_u, id_adr, id_cat) VALUES :description, :prix, :nb_pieces, :commune, :cp, :rue, :numero, :id-cat, 1, 1";



    $stt = $bdd->prepare($sql);
    $array = array(
        ':description' => $description,
        ':prix' => $prix,
        ':nb_pieces' => $nb_pieces,
        ':commune' => $commune,
        ':cp' => $cp,
        ':rue' => $rue,
        ':numero' => $numero
    );

    $resultat = $stt->execute($array);

    if ($_POST['choix'] == "2") {
        header('Location: index_demeures.php');
    } elseif ($_POST['choix'] == "1") {
        header('Location: index_appartements.php');
    }
}
?>

<div class="background">
    <section class="cadre">
        <div class="cadre2 center color">
            <form method='POST'>
                <h2> Vente </h2>
                <h6> ADRESSE</h6>
                <div class="center">
                    Commune : <input type="text" placeholder="Le nom de votre commune" name="commune"><br>
                    Code Postale : <input type="number" placeholder="Le numéro de code postale" name="cp"><br>
                    Rue : <input type="text" placeholder="Le nom de la rue" name="rue"><br>
                    Numéro : <input type="number" placeholder="Le numero de rue" name="numero">
                </div>
                <h6>INFORMATION DU BIENS</h6>
                <label>
                    <select name="choix">
                        <option value="2">Demeures</option>
                        <option value="1">Appartement</option>
                    </select>
                </label>
                <br><br>
                <div class="center">
                    Prix :<input type="number" placeholder="Le prix de vente" name="prix"><br>

                    Nombre de pièces :<input type="number" placeholder="Le nombre de pièces" name="nb_pieces"><br> <br>

                    <textarea class="center4" rows="10" cols="61" name="description" placeholder=" Message ..."></textarea>
                    <input type="submit" name="submit">

                </div>
            </form>
        </div>

    </section>
    <footer><?php require "includes/foot.php" ?></footer>

    </body>

    </html>