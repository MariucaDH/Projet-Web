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
        <div id ="bouton"> <a href="accueil.html"> Accueil</a> </div>
        <div id="bouton">  <a href="reseau.html">Reseau</a> </div>
        <div id="bouton"> Mon profil </div>
        <div id="bouton"> <a href="messagerie.html"> Messagerie </a></div>
        <div id="bouton">  <a href="notifications.html"> Notifications </a> </div>
        <div id="bouton"> <a href="emplois.html">Emplois </a> </div>  
        <div id="boutondeco" > <a href="formulaire.html"> Deconnexion </a></div>
    </nav>

<div id="monprofil">
	
<div id="profil">

    <div id="imgperso">
            <!-- Inserer photo du profil de la bdd --> 
	       <img class="moi" src="identite.png" alt="moi" width="100px" height="100px">
    </div>
    <!-- INFOS PERSONNELLES -->
	<nav id="infosperso">
        <!-- Inserer la description de la bdd --> 
        <ul>
			<li>Nom</li>
			<li>Prenom</li>
            <li>Age</li>
			<li>Telephone</li>
			<li>Email</li>
			<li>bio</li>
			<li>Current status</li>
		</ul>
	</nav>
    
     <?php
  

        /*  try
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
               
echo '<div id="infosperso">';
        while($donnees = $reponse->fetch())
            //on verifie que le mot de passe correspond 
            
        {
           echo 'Age : '.$donnees['age_user'].'<br/>';
            echo 'E-mail : '. $donnees['mail_user'].'<br/>';  
            echo 'Situation actuelle : '.$donnees['current_status_user'].'<br/>'; 
            echo 'Biographie : '.$donnees['bio_user'].'<br/>'; 
        }
    
          echo '</div>';         
    */
        ?>
    
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
                    $reponse = $bdd->query('SELECT * FROM experience WHERE type_exp=\'formation\' AND id_user =\''.$_SESSION['id_user'].'\' ORDER BY \'date_exp\'');
               
echo '<div id="contenuf">';
        while($donnees = $reponse->fetch())
            //on verifie que le mot de passe correspond 
            
        {
           echo 'Structure : '.$donnees['structure_exp'].'<br/>';
            echo 'Description : '. $donnees['description_exp'].'<br/>';  
            echo 'Date de début : '.$donnees['date_exp_begin'].'<br/>'; 
            echo 'Date de fin : '.$donnees['date_exp_end'].'<br/>'; 
        }
          echo '</div>';         
       
        
        ?>
	
	
	</div>
        
        
        
    </div>
        
        
        
<br/>
        
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
            echo 'Structure : '.$donnees['structure_exp'].'<br/>';
            echo 'Description : '. $donnees['description_exp'].'<br/>';  
            echo 'Date de début : '.$donnees['date_exp_begin'].'<br/>'; 
            echo 'Date de fin : '.$donnees['date_exp_end'].'<br/>'; 
        }
          echo '</div>';         
     
        
        ?>
	</div>
	
	
	</div>

    
    

    <br/><br/><br/>
    
    <div id="ajouter">
        <a> Vous souhaitez ajouter un élément à votre CV ? </a>
        <br/><br/>
    <form method="get" action="formulaire.php">
            <label for="struct">Structure :  </label><input name="struct" type="text" id="struct" /> &nbsp;<br/>
            <label for="sexe">Type : </label>
    <input type="radio" name="type" value="form" id="form" /> <label for="form"> Formation</label>
    
    <input type="radio" name="type" value="exppro" id="exppro" /> <label for="homme">Expérience professionelle</label><br/>
        <label for="date">Date de début :  </label><input name="date" type="date" id="date" /> &nbsp;<br/>
        <label for="date">Date de fin :  </label><input name="date" type="date" id="date" /> &nbsp;<br/>
            <label for="description">Description : </label><input type="text" name="description" id="description" /><br/>
    
	        <a href="accueil.html"><input type="submit" value="Ajouter un élément au CV" /></a> 
        </form>
    
    </div>

</body>
      
</html>