 
<?php  session_start(); ?>


<!DOCTYPE html>
<html>
<body>
    <div class="publication"> 
        <div id="boutonpartage" > <a> Publier du contenu </a></div>
                <fieldset>
	               
                       <form method="post" action="accueil.php" enctype="multipart/form-data">
	               <label for="titre">Titre :</label><input name="titre" type="text" id="titre"/><br/>
                 <label for="descr"> Description : </label><input name="descr" type="text" id="descr"/> <br/>
                   <label for="file">Ajouter un media :</label><input type="file" name="file" id="file"/><br/>
                     
                   <label for="humeur">Feeling :</label><input name="humeur" type="text" id="humeur"/>
                   <label for="bouton"><a><input type="submit" value="Publier" /></a> </label> 
	              </form>
                           
        
	            </fieldset>
         
    </div> 
    
     <?php
  
   /*       try
                    {
                        // On se connecte à MySQL
                        $bdd = new PDO('mysql:host=localhost;dbname=excepert;charset=utf8', 'root','root');
                    }
        catch(Exception $e)
                    {
                        // En cas d'erreur, on affiche un message et on arrête tout
                            die('Erreur : '.$e->getMessage());
                    }
            //on selectionne le user correspondant a l email
                    $reponse = $bdd->query('SELECT * FROM post ORDER BY \'date_post\'');
               
echo '<div id="post">';
        while($donnees = $reponse->fetch())
            //on verifie que le mot de passe correspond 
    
        {
            echo '<br/> Titre : '.$donnees['titre_post'].'<br/>';
            echo 'Description : '. $donnees['content_post'].'<br/>';  
            echo 'Date : '.$donnees['date_post'].'<br/>'; 
            echo 'Humeur : '.$donnees['mood_post'].'<br/>'; 
            echo '<img src="'.$donnees['file_post'].'" />';
        }
               
    echo '</div>';*/
        
        ?>
          
        
           <?php
       if(empty($_POST['titre'])) $_POST['titre'] = NULL;
        if(empty($_POST['humeur'])) $_POST['humeur'] = NULL;
        if(empty($_POST['descr'])) $_POST['descr'] = NULL;
       if(empty($_POST['file'])) $_POST['file'] = NULL;
        
        
     if(isset($_POST['titre']) AND isset($_POST['descr']))
     {   //on ouvre la bdd en verifiant son ouverture
                                try
                    {
                                  
                        // On se connecte à MySQL
                        $bdd_inscription = new PDO('mysql:host=localhost;dbname=excepert;charset=utf8', 'root','root');
                    }
                    catch(Exception $e)
                    {
                        // En cas d'erreur, on affiche un message et on arrête tout
                            die('Erreur : '.$e->getMessage());
                    }
            // On ajoute une entrée dans la table user
            $bdd_inscription->exec('INSERT INTO post (id_user, date_post, content_post, mood_post, file_post, titre_post) VALUES(1,NOW(), \''.$_POST['descr'].'\', \''.$_POST['humeur'].'\',\''.$_FILES['file']['name'].'\',\''.$_POST['titre'].'\')');
           
            echo 'C bon';
          
        }
        ?>
    </body>
    
</html>
