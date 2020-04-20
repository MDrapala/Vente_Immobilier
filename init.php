<?php 
    session_start();

    try
        {
        $bdd = new PDO
        ("mysql:host=localhost;dbname=immo","root","root");
        }
        
    catch(exception $e)
    {
    die("Erreur de Connexion");
    }
         //Barre de recherche

    if(isset($_GET['recherche']))
    {
        $recherche = $_GET['recherche'];

        $sql = "SELECT * FROM biens WHERE biens.id_adr = adresse.id_adr ";

    
        $sql .= " commune LIKE '%".$recherche."%'";

        $requete = $bdd->query($sql);

    while($reponse = $requete->fetch()) 
     {
        echo $requete['description'];
     } 
        }
