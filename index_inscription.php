<?php require 'init.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <meta charset="utf-8">
</head>

<body>

    <header><?php require "includes/head.php"; ?></header>
    <?php
    if (isset($_POST['submit'])) {
        $prenom = $_POST['prenom'];
        $mdp = sha1($_POST['mdp']);
        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $reponse = $_POST['reponse'];
        $question = $_POST['question'];

        $requete = $bdd->query("INSERT INTO users(nom,prenom,email,mdp,question,reponse) VALUES('$nom','$prenom','$email','$mdp','$question','$reponse')");

        header("Location:index_connexion.php");
    }

    ?>

    <div class="background">
        <section class="cadre">

            <form class="form cadre2 center " action="#" method="post" enctype="multipart/form-data">
                <div class=" center color">

                    Email : <input type="email" placeholder="Entrer votre Email" name="email"><br><br>

                    Prénom :<input type="text" placeholder="Entrer votre pseudo" name="prenom"><br> <br>

                    Nom :<input type="text" placeholder="Entrer votre pseudo" name="nom"><br> <br>

                    Mot de passe : <input type="password" placeholder="Entrer votre mot de passe" name="mdp"><br> <br>

                    <label for="Question">Question :
                        <select name="question" id="question">
                            <option value="1">Le prénom de votre annimal de compagnie ?</option>
                            <option value="2">Le prénom de votre meilleur(e) ami(e)?</option>
                        </select>
                    </label><br><br>

                    Réponse : <input type="reponse" placeholder=" Votre réponse " name="reponse"><br>

                    <input type="submit" name="submit" />
                </div>
            </form>
        </section>

        <footer><?php require "includes/foot.php"; ?></footer>

</body>

</html>