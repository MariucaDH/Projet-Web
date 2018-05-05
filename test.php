 
<?php  session_start(); ?>


<!DOCTYPE html>
<html>
<body>
     <nav id="modif">
        <a style="font-style:italic; "> Vous souhaitez modifier votre description personnelle ? </a>
        <br/><br/>
    <form method="post" action="test.php">
        <label for="age">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Age :  </label><input name="age" type="number" id="age" size="30" /> &nbsp;<br/>
        <label for="tel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telephone :  </label><input name="tel" type="text" id="tel" size="30"/> &nbsp;<br/>
        <label for="mail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-Mail :  </label><input name="mail" type="text" id="mail" size="30"/> &nbsp;<br/>
        <label for="statut">Situation actuelle  :  </label><input name="statut" type="text" id="statut" size="30"/> &nbsp;<br/>
        <label for="bio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Biographie  :  </label><input name="bio" type="text" id="bio"size="30" /> &nbsp;<br/>
            
	        <input type="submit" value="Modifier" />
    </form>
    <?php 

        //on verifie que l'utilisateur a bien entré les differentes entrées du formulaires
        if(empty($_POST['age'])) $_POST['age'] = NULL;
        if(empty($_POST['tel'])) $_POST['tel'] = NULL;
        if(empty($_POST['mail'])) $_POST['mail'] = NULL;
        if(empty($_POST['statut'])) $_POST['statut'] = NULL;
        if(empty($_POST['bio'])) $_POST['bio'] = NULL;  
   
     if(isset($_POST['age']) OR isset($_POST['tel']) OR isset($_POST['mail']) OR isset($_POST['statut']) OR isset($_POST['bio']) )
           
        {

            //on ouvre la bdd en verifiant son ouverture
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
            $bdd_inscription->exec('UPDATE user SET age_user=\''.$_POST['age'].'\',tel_user= \''.$_POST['tel'].'\', mail_user= \''.$_POST['mail'].'\', current_status_user=\''.$_POST['statut'].'\', bio_user=\''.$_POST['bio'].'\' WHERE id_user = \''.$_SESSION['id_user'].'\'');

        }
    
      ?>
</nav>
    
            <ul>
			<li>Nom: <?php echo '<strong>'.$_SESSION['name_user'].'</strong>'; ?> </li>
            <li>Prenom: <?php echo '<strong>'.$_SESSION['prenom_user'].'</strong>'; ?> </li>
            <li>Age: <?php echo '<strong>'.$_SESSION['age_user'].'</strong>'; ?></li>
            <li>Telephone: <?php echo '<strong>'.$_SESSION['tel_user'].'</strong>'; ?></li>
            <li>Email: <?php echo '<strong>'.$_SESSION['mail_user'].'</strong>'; ?></li>
            <li>bio: <?php echo '<strong>'.$_SESSION['bio_user'].'/</strong>'; ?></li>
            <li>Current status: <?php echo '<strong>'.$_SESSION['current_status_user'].'</strong>'; ?> </li>
		</ul>
</body>
      
</html>