<?php require 'init.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Regénération de Mot de passe</title>
    <meta charset="utf-8">
</head>

<body>
    <header><?php require "includes/head.php"; ?></header>

    <?php
    if (isset($_POST['submit'])) {
        $question = $_POST['question'];
        $reponse = $_POST['reponse'];
        $email = $_POST['email'];
        $choix = $_POST['choix'];

        $requete = $bdd->query("SELECT * FROM users WHERE email='$email 'AND reponse = '$reponse'");

        if ($reponse = $requete->fetch()) {
            $mdp = "";
            $chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            $mdp = $chaine[rand(0, 25)];
            $mdp .= $chaine[rand(0, 25)];
            $mdp .= $chaine[rand(26, 51)];
            $mdp .= $chaine[rand(26, 51)];
            $mdp .= $chaine[rand(52, 61)];
            $mdp .= $chaine[rand(52, 61)];
            $mdp = str_shuffle($mdp);

            echo "<div class='placemente'>Votre nouveau mot de passe est -- $mdp --</div>";
            //mail($destination,$sujet,$contenu);

            $mdp = sha1($mdp);
            $requete = $bdd->query("UPDATE users SET mdp='$mdp' WHERE id_u=" . $reponse['id_u']);
        } else {
            echo "<div class='placemente'> Nous avons pas réussit à vous identifier :( </div>";
        }
    }
    ?>


    <div class="background">
        <section class="cadre">

            <form class="cadre2 center" method="post">

                <div class="color">

                    2 min 2MAJ 2Chiffres<input type="radio" name="choix" value="2" checked><br>
                    3 min 3MAJ 3Chiffres<input type="radio" name="choix" value="3"><br>
                    4 min 4MAJ 4Chiffres<input type="radio" name="choix" value="4"><br><br>

                    <label for="email">Email :</label><br>
                    <input type="email" placeholder="Email" name="email" id="email" /><br><br>

                    <label for="Question">Question : <br><br>
                        <select name="question" id="question">
                            <option value="1">Le prénom de votre annimal de compagnie ?</option>
                            <option value="">Le prénom de votre meilleur(e) ami(e)?</option>
                        </select>
                    </label><br> <br>

                    Réponse :<input type="text" placeholder="Réponse" name="reponse" id="question" /><br><br>
                    <input type="submit" name="submit" />
                </div>

            </form>
        </section>

        <footer><?php require "includes/foot.php" ?></footer>

</body>

</html>