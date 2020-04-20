<header><?php require "includes/head.php" ?></header>
<?php
if (!isset($_SESSION['admin']) or !$_SESSION['admin']) {
    header('Location: index.php');
}

?>

<div class="background">

    <section class="cadre">
        <div class="center"></div>

        <h6>Administrateur</h6>
        <a href="deconnexion.php"> Se Déconnecter</a>


        <h6> Administration</h6><br>



        <?php

        if (isset($_GET['ban'])) {
            $requete = $bdd->query("UPDATE users SET lvl = 0 WHERE id_u = " . $_GET['ban']);
        }
        if (isset($_GET['deban'])) {
            $requete = $bdd->query("UPDATE users SET lvl = 1 WHERE id_u = " . $_GET['deban']);
        }
        $requete = $bdd->query("SELECT * FROM users");
        while ($reponse = $requete->fetch()) {
            echo  "<div class='border3 center'>" . $reponse['id_u'] . " " . $reponse['nom'] . "" . $reponse['prenom'];
            if ($reponse['lvl'] != 0)
                echo "---<a href='admin.php?ban=" . $reponse['id_u'] . "'>debannir</a><br>";
            else
                echo " --- <a href='admin.php?deban=" . $reponse['id_u'] . "'>bannir</a></div><br>";
        }
        ?>
    </section>


    <footer><?php require "includes/foot.php"; ?></footer>