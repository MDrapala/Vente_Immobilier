<?php require 'init.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Location</title>
  <meta charset="utf-8">
</head>
<body>

<header><?php require "includes/head.php" ?></header>
      <?php
    if (isset($_POST['submit']) && isset($_SESSION['id_u']))
    {
    {
        $requete = $bdd->prepare("INSERT INTO post3(contenu, u_id, t_id) VALUES :contenu, :u_id, :t_id");
        $requete->bindParam(':contenu', $contenu);
        $requete->bindParam(':u_id', $u_id);
        $requete->bindParam(':t_id', $t_id);
        $contenu = $_POST['contenu'];
        $u_id = $_SESSION['id_u'];
        $t_id = 1;
        $requete->execute();

    }

if (isset($_POST['submit']))
{  

$commune = $_POST['commune'];
$cp = $_POST['cp'];
$rue= $_POST['rue'];
$numero = $_POST['numero'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$nb_pieces = $_POST['nb_pieces'];
$choix = $_POST['choix'];

    if(isset($_POST['submit'])){
$requete = $bdd->query("INSERT INTO location (description,prix,nb_pieces,commune,cp,rue,numero) VALUES'$description','$prix','$nb_pieces','$commune','$cp','$rue','$numero' ");
          
 }
}
?>

       <div class="background">
           
                  <section class="cadre">
       <div class="">
    <div class="cadre3">
    
    <h3>Titre</h3>

        
        <p class="">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis omnis modi quibusdam quidem nemo aut, ipsa natus eveniet explicabo nulla numquam optio eaque reiciendis doloremque. Commodi quam possimus voluptates in.
        </p>
         
           </div>
           <div class="space" style="position:relative">
         <img class="img" src="image/appartement.jpg">
           </div>
          <div class="clearfix"></div>
          
           </div>
           </section>
       
       
       
         <div class="background">
            <div class="commentaire">
                <h4>Espaces Commentaires</h4>
            </div>               
           	<?php
		$requete = $bdd->prepare("SELECT post3.contenu, users.nom, users.prenom FROM post3, users WHERE post3.u_id = users.id_u AND post3.t_id = 1");

	$requete->execute();
	while($reponse = $requete->fetch())
	{
	   echo "<section class='cadre'>
       <p>
       <div class='name'> ". $reponse['nom'] ." ". $reponse['prenom']."
       a écrit : <br></div><div class='contenu'>  ". $reponse['contenu'] ." </div></p></section>"; 

	}     
    ?>

           
<form class ="commentaire center" action="" method="POST">
    		 <textarea name="contenu" id="desc" cols="30" rows="10" ></textarea><br>
			 <input class="center3" type="submit" name="submit" value="submit">
 <script src="http://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script><script> CKEDITOR.replace('desc');</script> 
</form>
           </div>
<footer><?php include "includes/foot.php"; ?></footer>

</body>
</html>