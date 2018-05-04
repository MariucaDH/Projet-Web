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
                
       <div id="titre">Plateforme de recherche d'emplois</div>
               
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
            <a> Job</a> <br>
                <?php
                    $reponse = $bdd_connexion->query('SELECT * FROM joboffer WHERE type_job=\'JOB\' ORDER BY date_publication');
                    while($donnees = $reponse->fetch())
                    {
                    echo '<strong> <br> '.$donnees['entreprise_job'];
                    echo '<strong> <br>'.$donnees['type_job'];
                    echo '<strong> <br>'.$donnees['date_embauche'];
                    echo '<strong> <br>'.$donnees['date_publication'];
                    echo '<strong> <br>'.$donnees['description_job'];
                    echo '<strong><br>'.$donnees['contact_job'];
                        echo '</p>';
                    }
                ?>
        </div>
    

        
        <div id="stage"> 
            <a> Stage </a> <br>
  
                <?php
                    $reponse = $bdd_connexion->query('SELECT * FROM joboffer WHERE type_job=\'STAGE\' ORDER BY date_publication');
                    while($donnees = $reponse->fetch())
                    {
                    echo '<strong> <br> '.$donnees['entreprise_job'];
                    echo '<strong> <br>'.$donnees['type_job'];
                    echo '<strong> <br>'.$donnees['date_embauche'];
                    echo '<strong> <br>'.$donnees['date_publication'];
                    echo '<strong> <br>'.$donnees['description_job'];
                    echo '<strong><br>'.$donnees['contact_job'];
                        echo '</p>';
                    }
                ?>
        </div>
        
        <div id="alternance"> 
        
        <a> Alternances </a> <br>
                <?php
                    $reponse = $bdd_connexion->query('SELECT * FROM joboffer WHERE type_job=\'ALTERNANCE\' ORDER BY date_publication');
                    while($donnees = $reponse->fetch())
                    {
                    echo '<strong> <br> '.$donnees['entreprise_job'];
                    echo '<strong> <br>'.$donnees['type_job'];
                    echo '<strong> <br>'.$donnees['date_embauche'];
                    echo '<strong> <br>'.$donnees['date_publication'];
                    echo '<strong> <br>'.$donnees['description_job'];
                    echo '<strong><br>'.$donnees['contact_job'];
                        echo '</p>';
                    }
                ?>
        </div>
        
    </nav>   
                
                
                
                
                
                
                
    </body>

        
    <footer>
    <p style="margin-right:200px"> Mariuca DE HILLERIN - Nicolas CHOLLET - Sophie-Anne CORDONNIER - Projet piscine ECExPERTS - Mai 2018 </p>
    </footer>

</html>