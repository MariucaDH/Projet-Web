<?php  session_start(); ?>

<!DOCTYPE html>
    
    <html>
    <head>
        <meta charset="utf-8" />
        <title>Emplois</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="emplois.css" />
    </head>
        
            <body>
    <nav id = "boutons"> 
        <div class ="bienvenue"> 
            &nbsp;&nbsp;     
            <img src="ECElogo.png" class="logo" height="100" width="100" style="margin-right:25px";/></div>
        
        <!-- DIV DES BOUTONS --> 
        <div id ="bouton"> <a href="accueil.php">Accueil</a></div>
        <div id="bouton">  <a href="reseau.php">Réseau</a> </div>
        <div id="bouton">  <a href="profil.php">Mon profil </a></div>
        <div id="bouton"> <a href="messagerie.php"> Messagerie </a></div>
        <div id="bouton">  <a href="notifications.php"> Notifications</a> </div>
        <div id="bouton">Emplois</div>
        <div id="boutondeco" > <a href="formulaire.php"> Deconnexion </a></div>
    </nav>
                
       <div id="titre"> Plateforme d'offres d'emplois <br>
           Powered by <span style="color:#008080;">  ECExPERTS </span> </div>
               
<?php
try
{
// On se connecte à MySQL
$bdd_connexion = new PDO('mysql:host=localhost;dbname=excepert;charset=utf8', 'root','root');
}
catch(Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
die('Erreur : '.$e->getMessage());
}    
?>       
                
                
    <nav id="colonnes">
                        
        <div id="job"> 
            <a> <span style="color:#008080;"> <br> Job <br> ___________________________________ </span> </a> <br>
                <?php
                    $reponse = $bdd_connexion->query('SELECT * FROM joboffer WHERE type_job=\'JOB\' ORDER BY date_publication');
                    while($donnees = $reponse->fetch())
                    {
                    echo '<strong> <br> '.$donnees['entreprise_job'];
                    echo '<strong> <br> Date Embauche : '.$donnees['date_embauche'];
                    echo '<strong> <br> Date de publication : '.$donnees['date_publication'];
                    echo '<strong> <br>'.$donnees['description_job'];
                    echo '<strong> <br>'.$donnees['contact_job'];
                    echo '</p>';
                    echo '___________________________________ <br>';
                    }
                ?>
        </div>
    

        
        <div id="stage"> 
            <a> <span style="color:#008080;"> <br> Stage <br> ___________________________________ </span> </a> <br>
  
                <?php
                    $reponse = $bdd_connexion->query('SELECT * FROM joboffer WHERE type_job=\'STAGE\' ORDER BY date_publication');
                    while($donnees = $reponse->fetch())
                    {
                    echo '<strong> <br> '.$donnees['entreprise_job'];
                    echo '<strong> <br> Date Embauche : '.$donnees['date_embauche'];
                    echo '<strong> <br> Date de publication : '.$donnees['date_publication'];
                    echo '<strong> <br>'.$donnees['description_job'];
                    echo '<strong><br>'.$donnees['contact_job'];
                    echo '</p>';
                    echo '___________________________________ <br>';
                    }
                ?>
        </div>
        
        <div id="alternance"> 
        
        <a>  <span style="color:#4169E1;"> <br> Alternance <br> ___________________________________ </span> </a> <br>
                <?php
                    $reponse = $bdd_connexion->query('SELECT * FROM joboffer WHERE type_job=\'ALTERNANCE\' ORDER BY date_publication');
                    while($donnees = $reponse->fetch())
                    {
                    echo '<strong> <br><span style="color:#4169E1;"> '.$donnees['entreprise_job'];
                    echo '<strong> <br> Date Embauche : '.$donnees['date_embauche'];
                    echo '<strong> <br> Date de publication : '.$donnees['date_publication'];
                    echo '<strong> <br>'.$donnees['description_job'];
                    echo '<strong><br>'.$donnees['contact_job'];
                    echo '</p>';
                    echo '___________________________________ <br>';
                    }
                ?>
        </div>
        
    </nav>   
                
                
                
                
                
                
                
    </body>

        
    <footer>
    <p style="margin-right:200px"> Mariuca DE HILLERIN - Nicolas CHOLLET - Sophie-Anne CORDONNIER - Projet piscine ECExPERTS - Mai 2018 </p>
    </footer>

</html>