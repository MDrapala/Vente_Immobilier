<header><?php require "includes/head.php"; ?></header>

<?php
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $mdp = sha1($_POST['mdp']);

    $requete = $bdd->query("SELECT * FROM users WHERE email = '$email' AND mdp = '$mdp'");

    if ($reponse = $requete->fetch()) {
        if ($reponse['lvl'] == 1) {
            echo "<div class='ban'>Vous êtes banni</div>";
            die();
        }
        $_SESSION['connecte'] = true;
        $_SESSION['id_u'] = $reponse['id_u'];
        header("Location:index.php");
    } else {
?> <?php echo "<div class='placemente'>Mauvais identifiants </div>";
    }
}
        ?>

<div class="background">
    <section class="cadre">

        <form class="form center" action="" method="post">
            <div class="center cadre2">

                <span>
                    Email:<input type="email" placeholder="Entrer votre Email" name="email" /><br>
                    Mot de passe:<input type="password" placeholder="Mot de passe" name="mdp" /><br>
                </span>

                <input type="submit" name="submit" /><br>
                <a class="left1" href="index_inscription.php">Pas encore inscrit ?</a>
                <br>
                <a class="left1" href="index_generer.php">Mot de Passe oublié ?</a>
            </div>
        </form>
    </section>

    <footer><?php require "includes/foot.php"; ?></footer>