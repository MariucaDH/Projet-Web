<?php  session_start(); ?>


<!DOCTYPE html>
<html>
<head>
	
    <link rel="stylesheet" type="text/css" href="profil.css">
    <link rel="stylesheet" href="style.css" />
	<title>Profil</title>

</head>

<body>


    <nav id = "boutons"> 
            <div> &nbsp;&nbsp;     
            <img src="ECElogo.png" class="logo" height="100" width="100" style="margin-right:25px";/></div>
        <div id ="bouton"> <a href="accueil.php"> Accueil</a> </div>
        <div id="bouton">  <a href="reseau.php">Reseau</a> </div>
        <div id="bouton"> Mon profil </div>
        <div id="bouton"> <a href="messagerie.php"> Messagerie </a></div>
        <div id="bouton">  <a href="notifications.php"> Notifications </a> </div>
        <div id="bouton"> <a href="emplois.php">Emplois </a> </div>  
        <div id="boutondeco" > <a href="formulaire.php"> Deconnexion </a></div>
    </nav>

<div id="monprofil">
	
<div id="profil">

    <div id="imgperso">
            <!-- Inserer photo du profil de la bdd --> 
	     <?php   echo '<img src="'.$_SESSION['photo_user'].'" />';  ?> 
     
    </div>
        <nav id="modif">
        <a style="font-style:italic; "> Vous souhaitez modifier votre description personnelle ? </a>
        <br/><br/>
    <form method="post" action="profil.php">
        <label for="age">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Age :  </label><input name="age" type="number" id="age" size="30" /> &nbsp;<br/>
        <label for="tel">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Telephone :  </label><input name="tel" type="text" id="tel" size="30"/> &nbsp;<br/>
        <label for="mail">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-Mail :  </label><input name="mail" type="text" id="mail" size="30"/> &nbsp;<br/>
        
        <label for="bio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Biographie  :  </label><input name="bio" type="text" id="bio"size="30" /> &nbsp;<br/>
         <label for="statut">Situation actuelle  :  </label><input name="statut" type="text" id="statut" size="30"/> &nbsp;<br/>   
	        <input type="submit" value="Modifier" />
    </form>
   <?php 

        //on verifie que l'utilisateur a bien entré les differentes entrées du formulaires
        if(empty($_POST['age'])) $_POST['age'] = $_SESSION['age_user'];
        if(empty($_POST['tel'])) $_POST['tel'] = $_SESSION['tel_user'];
        if(empty($_POST['mail'])) $_POST['mail'] = $_SESSION['mail_user'];
        if(empty($_POST['statut'])) $_POST['statut'] = $_SESSION['current_status_user'];
        if(empty($_POST['bio'])) $_POST['bio'] = $_SESSION['bio_user'];  
   
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
    
            $_SESSION['age_user']= $_POST['age'];
            $_SESSION['tel_user']= $_POST['tel']; 
            $_SESSION['mail_user']= $_POST['mail']; 
            $_SESSION['bio_user']= $_POST['bio']; 
            $_SESSION['current_status_user']= $_POST['statut']; 
            
            
      ?>
</nav>
    <!-- INFOS PERSONNELLES -->
	<nav id="infosperso">
        <!-- Inserer la description de la bdd --> 
        <ul class="liste">
			<li>Nom: <?php echo '<strong>'.$_SESSION['name_user'].'</strong>'; ?> </li>
            <li>Prenom: <?php echo '<strong>'.$_SESSION['prenom_user'].'</strong>'; ?> </li>
            <li>Age: <?php echo '<strong>'.$_SESSION['age_user'].'</strong>'; ?></li>
            <li>Telephone: <?php echo '<strong>'.$_SESSION['tel_user'].'</strong>'; ?></li>
            <li>Email: <?php echo '<strong>'.$_SESSION['mail_user'].'</strong>'; ?></li>
            <li>bio: <?php echo '<strong>'.$_SESSION['bio_user']. '</strong>'; ?></li>
            <li>Current status: <?php echo '<strong>'.$_SESSION['current_status_user'].'</strong>'; ?> </li>
		</ul>
	</nav>

    
  </div>  
    
    <br/><br/><br/>
<!-- CV DU USER  -->
    
    <div id="exp">
	     <div id="formation">
<div id="nom">Formation </div><br/><br/>
              <?php
  
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
                    $reponse = $bdd->query('SELECT * FROM experience WHERE type_exp=\'formation\' AND id_user =\''.$_SESSION['id_user'].'\' ORDER BY \'date_exp_begin\'');
               
echo '<div id="contenuf">';
        while($donnees = $reponse->fetch())
            //on verifie que le mot de passe correspond 
            
        {
            echo '<p>';
            echo '<strong> Structure : </strong>'.$donnees['structure_exp'].'<br/>';
            echo '<strong>Description : </strong>'. $donnees['description_exp'].'<br/>';  
            echo '<strong>Date de début </strong>: '.$donnees['date_exp_begin'].'<br/>'; 
            echo '<strong>Date de fin : </strong>'.$donnees['date_exp_end'].'<br/>'; 
            echo '</p>';
            echo '<hr>'; 
        }
          echo '</div>';         
       
        
        ?>
	
	
	</div>
        
        
        
  
        
        
        
<br/><br/>
        
	<div id="expprof">
	<div id="nom">Expériences professionelles  </div><br/><br/>
	      <?php
  

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
                    $reponse = $bdd->query('SELECT * FROM experience WHERE type_exp=\'experience\' AND id_user =\''.$_SESSION['id_user'].'\' ORDER BY \'date_exp\'');
               
echo '<div id="contenue">';
        while($donnees = $reponse->fetch())
            //on verifie que le mot de passe correspond 
            
        {
            echo '<p>';
            echo '<strong>Structure : </strong>'.$donnees['structure_exp'].'<br/>';
            echo '<strong>Description : </strong>'. $donnees['description_exp'].'<br/>';  
            echo '<strong>Date de début </strong>: '.$donnees['date_exp_begin'].'<br/>'; 
            echo '<strong>Date de fin : </strong>'.$donnees['date_exp_end'].'<br/>'; 
            echo '<hr>'; 
            echo '</p>';
        }
          echo '</div>';         
     
        
        ?>
	</div>
	
	
	</div>

    
    
 </div>
    <br/><br/><br/>
    
   <div id="ajouter">
        <a style="font-style:italic; "> Vous souhaitez ajouter un élément à votre CV ? </a>
        <br/><br/>
    <form method="post" action="profil.php">
            <label for="struct">Structure :  </label><input name="struct" type="text" id="struct" /> &nbsp;<br/>
            <label for="type">Type : </label>
                    <select name=type id=type>
                            <option value="formation">Formation</option>
                            <option value="experience">Experience</option>
                    </select> <br/>
            <label for="date">Date de début :  </label><input name="dated" type="date" id="date" /> &nbsp;<br/>
            <label for="date">Date de fin :  </label><input name="datef" type="date" id="date" /> &nbsp;<br/>
            <label for="description">Description : </label><input type="text" name="description" id="description" /><br/>
    
	        <input type="submit" value="Ajouter un élément au CV" />
    </form>
    
</div>
   
    <?php 

        //on verifie que l'utilisateur a bien entré les differentes entrées du formulaires
        if(empty($_POST['struct'])) $_POST['struct'] = NULL;
        if(empty($_POST['type'])) $_POST['type '] = NULL;
        if(empty($_POST['description'])) $_POST['description'] = NULL;
        if(empty($_POST['dated'])) $_POST['dated'] = NULL;
        if(empty($_POST['datef'])) $_POST['datef'] = NULL;  
   
     if(isset($_POST['struct']) AND isset($_POST['description']) AND isset($_POST['dated']) AND isset($_POST['datef']) )
           
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
            $bdd_inscription->exec('INSERT INTO experience (id_user,structure_exp, description_exp, date_exp_begin, type_exp, date_exp_end) VALUES( \''.$_SESSION['id_user'].'\',\''.$_POST['struct'].'\',\''.$_POST['description'].'\',\''.$_POST['dated'].'\', \''.$_POST['type'].'\', \''.$_POST['datef'].'\' )');

        }
    
      ?>
     
</body>
      
</html>