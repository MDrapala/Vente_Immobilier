<header><?php require "includes/head.php" ?></header>

<?php
if (isset($_SESSION['admin']) and $_SESSION['admin']) {
    header('Location: /admin.php');
}

$erreur = '';
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $mdp = sha1($_POST['mdp']);

    $requete = $bdd->query("SELECT * FROM users WHERE email = '$email' AND mdp = '$mdp'");

    if ($reponse = $requete->fetch()) {
        if ($reponse['lvl'] == 1) {
            echo "<div class='ban'>Vous êtes pas autoriser d'accées</div>";
            die();
        }
        if ($reponse['lvl'] == 0) {
            echo "<div class='ban'>Vous êtes pas autoriser d'acccées</div>";
            die();
        }
        $_SESSION['admin'] = true;
        $_SESSION['id_u'] = $reponse['id_u'];
        header("Location:admin.php");
    } else {
?> <?php echo "<div class='placemente'>Mauvais identifiants </div>";
    }
}
        ?>

<div class="background">

    <section class="cadre">

        <h2>Connexion Administrateur</h2>


        <form method="POST">

            <input type="text" placeholder="Mail d'Administrateur" name="email" <?php if (isset($email)) { ?> value="<?= $email ?>" <?php } ?>>
            <br>
            <input type="password" placeholder="Mot de passe" name="mdp" <?php if (isset($mdp)) { ?> value="<?= $mdp ?>" <?php } ?>>
            <br>
            <input type="submit" name="submit" value="Se connecter">
        </form>

    </section>

    <footer><?php require "includes/foot.php"; ?></footer>