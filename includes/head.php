<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <title>Accueil</title>
</head>

<body>
    <nav>
        <div>
            <ul>
                <li><a href="index.php">ACCUEIL</a></li>
                <li><a href="index_appartements.php">APPARTEMENTS</a></li>
                <li><a href="index_demeures.php">DEMEURES</a></li>
                <li><a href="index_contact.php">CONTACTEZ-NOUS</a></li>
                <li class="date">

                    <?php
                    date_default_timezone_set('Europe/Paris');
                    $date = date("d-m-Y");
                    $heure = date("H:i");

                    print(" $date / $heure");


                    ?></li>

                <div class="left4">

                    <?php if (isset($_SESSION['connecte'])) { ?>

                        <li class="font-size"><a href="index_Profil.php">Profil</a></li>
                        <li class="font-size"><a href="deconnexion.php">Déconnexion</a></li>

                    <?php } else { ?>

                        <li><a href="index_inscription.php">Inscription</a></li>
                        <li><a href="index_connexion.php">Connexion</a></li>
                    <?php } ?>


                </div>
            </ul>
        </div>
    </nav>

    <div class="clearfix"></div>
    <div class=" background3">

        <ul class="ul_1">
            <input class="" type="text" placeholder="Recherche" method="get" name="recherche">

            <input class="envoyer" type="submit" name="submit">
        </ul>
    </div>


    <h1> Primobillier </h1>