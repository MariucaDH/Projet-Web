<?php session_start(); ?>
<!DOCTYPE html>
    
    <html>
    <head>
        <meta charset="utf-8" />
        <title>Votre réseau</title>
        <link rel="stylesheet" href="style.css" /><link rel="stylesheet" href="reseau.css" />
    </head>
        
        
      
            <body>
    <nav id = "boutons"> 
            <div> &nbsp;&nbsp;     
            <img src="ECElogo.png" class="logo" height="100" width="100" style="margin-right:25px";/></div>
        <div id ="bouton"> <a href="accueil.php">Accueil</a></div>
        <div id="bouton">Reseau</div>
        <div id="bouton">  <a href="profil.php">Mon profil </a></div>
        <div id="bouton"> <a href="messagerie.php"> Messagerie </a></div>
        <div id="bouton">  <a href="notifications.php"> Notifications</a> </div>
        <div id="bouton"> <a href="emplois.php">Emplois </a> </div>  
        <div id="boutondeco" > <a href="formulaire.php"> Deconnexion </a></div>
    </nav>
                
                
    <div id="titrepage"> Liste de vos amis </div>

    <div id="ajouter un ami">
        <form  action="reseau.php" method="GET">
            <label for="email_friend">Email de l'ami :  </label><input name="email_friend" type="text" id="email_friend" /> &nbsp;
            <input type="submit" value="ajouter un ami" />
        </form>
    <?php 
        //on verifie que l utilisateur a bien entrer email
        if(empty($_GET['email_friend'])) $_GET['email_friend'] = NULL;
    

        if(isset($_GET['email_friend']))
        {
            //on ouvre la bdd en verifiant son ouverture
                                try
                    {
                        // On se connecte à MySQL
                        $bdd_recherche = new PDO('mysql:host=localhost;dbname=excepert;charset=utf8', 'root','root');
                    }
                    catch(Exception $e)
                    {
                        // En cas d'erreur, on affiche un message et on arrête tout
                            die('Erreur : '.$e->getMessage());
                    }
                    //on verifie que l'utilisateur voulu existe
                    $reponse_recherche = $bdd_recherche->query('SELECT * FROM user WHERE mail_user=\''. $_GET['email_friend'] .'\'');
                    $donnees_recherche = $reponse_recherche->fetch();
                    if(empty($donnees_recherche['mail_user']))
                        {
                            echo 'l\'utilisateur n\'éxiste pas, réessayez svp.';
                        }
                    else
                    {
                    // si il existe  on lui insert l ami dans la table ami.
                    $bdd_recherche->exec('INSERT INTO friend (id_user1, id_user2,notif_friend) VALUES('.$_SESSION['id_user'].','.$donnees_recherche['id_user'].' , NOW())');
                    echo '<strong>Le contact a bien été ajouté</strong>';
                    }
                    $reponse_recherche->closeCursor();
        }

    ?>

    </div>



    <div id="afficher vos amis">

    


<?php
// ici on va aficher les amis dans la div

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
            //on selectionne le user correspondant a l email
                   $reponse = $bdd_connexion->query('SELECT id_user1, id_user2, name_user,prenom_user,tel_user,age_user,mail_user,current_status_user FROM friend INNER JOIN user ON user.id_user = friend.id_user2 WHERE friend.id_user1 ='.$_SESSION['id_user']);
  while($donnees = $reponse->fetch())
  {
  echo '<p><strong>'.$donnees['name_user'].'</strong></br>';
  echo '<strong>'.$donnees['prenom_user'].'</strong></br>';
  echo $donnees['tel_user'].'</br>';
  echo $donnees['age_user'].' ans</br>';
  echo $donnees['mail_user'].'</br>';
  echo 'Actuellement chez:'.$donnees['current_status_user'].'</br>';
  }
?>
            
                
      </div>        
            </body>
</html>