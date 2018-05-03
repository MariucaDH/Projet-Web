<?php
  session_start(); 
echo $_SESSION['id_user']; 
          try
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
                    $reponse = $bdd->query('SELECT * FROM users WHERE id_user =\''.$_SESSION['id_user']'');
               
//echo '<div id="infosperso">';
        while($donnees = $reponse->fetch())
            //on verifie que le mot de passe correspond 
            
        {
            echo 'coucou';
           echo 'Age : '.$donnees['age_user'].'<br/>';
            echo 'E-mail : '. $donnees['mail_user'].'<br/>';  
            echo 'Situation actuelle : '.$donnees['current_status_user'].'<br/>'; 
            echo 'Biographie : '.$donnees['bio_user'].'<br/>'; 
        }
    
       //   echo '</div>';         
    
        ?>
