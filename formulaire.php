<?php session_start() ?>
<!DOCTYPE html>

<html> 
    
    <head> 
        <meta charset="utf-8" />
        <title>Identification</title>
        <link rel="stylesheet" href="formulaire.css" />
    </head>

<body>
  
<div id="haut"> 
        <nav id="logo"> <img src="logoecenv.png" width="170px" height="40px" /> </nav>
        <div id="bienvenue"> Bienvenue sur ECExPERT Network </div>   
</div>
    
<!-- Connexion--> 
    
<div id="connexion">
       
       <form  action="formulaire.php" method="GET">
            <label for="email">Pseudo :  </label><input name="pseudo" type="text" id="pseudo" /> &nbsp;
            <label for="password">Mot de passe : </label><input type="password" name="password" id="password" />
    
            <input type="submit" value="Se connecter" />
       </form>
   
</div>  
        <?php 
        //on verifie que l utilisateur a bien entrer un pseudo et un mot de passe
        if(empty($_GET['pseudo'])) $_GET['pseudo'] = NULL;
        if(empty($_GET['password'])) $_GET['password'] = NULL;

        if(isset($_GET['pseudo']) AND isset($_GET['password']))
        {
            //on ouvre la bdd en verifiant son ouverture
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
                    $reponse = $bdd_connexion->query('SELECT * FROM user WHERE pseudo_user=\'' . $_GET['pseudo'] . '\'');
                    $donnees = $reponse->fetch();
            //on verifie que le mot de passe correspond 
                    if ($donnees['password_user']==$_GET['password'])
                    {
                        $_SESSION['id_user'] = $donnees['id_user'];
                        $_SESSION['name_user'] = $donnees['name_user'];
                        $_SESSION['prenom_user'] = $donnees['prenom_user'];
                        $_SESSION['pseudo_user'] = $donnees['pseudo_user'];
                        $_SESSION['tel_user'] = $donnees['tel_user'];
                        $_SESSION['age_user'] = $donnees['age_user'];
                        $_SESSION['sexe_user'] = $donnees['sexe_user'];
                        $_SESSION['mail_user'] = $donnees['mail_user'];
                        $_SESSION['current_status_user'] = $donnees['current_status_user'];

                        header('Location: accueil.php');

                        exit();
                    }
                    else
                    {
                        echo'<div id="echec">';
                        echo 'Mot de passe ou pseudo incorrect';
                        echo '</div>';
                        //echo '<div id="echec"> Vous avez rempli un mauvais mot de passe ou un mauvais email</div>'; 
                        // ici reprendre le css pour que ca s affiche bien mais on affiche un encart pour dire echec connexion
                    }
        }
        



        ?>
    


  <div id="formulaire">  


<!-- Inscription --> 
    
<div id="inscription"> 


    <center>  <a style="font-size: 30px; letter-spacing: 2px; " >Inscription </a> </center>
    <br/>
    <!-- formulaire pour rentrer les donnees--> 

<form method="POST" action="formulaire.php">
    <label for="pseudo">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;Pseudo :  </label><input name="pseudo" type="text" id="pseudo" placeholder="Ex : monpseudo42" size="30"/><br/><br/>
    <label for="nom">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Nom :  </label><input name="nom" type="text" id="nom" placeholder="Ex : Segado" size="30"/><br/><br/>
    
    <label for="prenom">&nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;Prénom :  </label><input name="prenom" type="text" id="prenom" size="30" placeholder="Ex : Jean-Pierre"/><br/>
    <br/>
    <label for="mail">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;E-mail : </label><input name="mail" type="text" id="mail" size="30" placeholder="Ex : jean-pierre.segado@edu.ece.fr"/><br/>
    <br/>
    <label for="pass">Mot de passe : </label><input type="password" name="pass" id="pass" size="30"/><br/><br/>
    
    <label for="tel">&nbsp; &nbsp;&nbsp;Telephone :  </label>  <input type="text" name="tel" id="tel" size="30" placeholder="Ex : 0606100000"/><br/><br/>
    <label for="age">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Age :   </label>     <input type="number" name="age" id="age" /><br/><br/>
    <label for="sexe">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Sexe : </label>
    <select name=sexe id=sexe>
        <option value="homme">Homme</option>
        <option value="femme">Femme</option>
        <option value="Autre">Autre</option>
    </select> 
    <br/> <br/>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="S'inscrire" />
    &nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="Effacer">
    
</form>
    </div>
    
   <?php 
        //on verifie que l utilisateur a bien entrer les differentes entrees du formulaires
        if(empty($_POST['pseudo'])) $_POST['pseudo'] = NULL;
        if(empty($_POST['nom'])) $_POST['nom'] = NULL;
        if(empty($_POST['prenom'])) $_POST['prenom'] = NULL;
        if(empty($_POST['mail'])) $_POST['mail'] = NULL;
        if(empty($_POST['pass'])) $_POST['pass'] = NULL;
        if(empty($_POST['tel'])) $_POST['tel'] = NULL;
        if(empty($_POST['age'])) $_POST['age'] = NULL;
     

        if(isset($_POST['pseudo']) AND isset($_POST['pass']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['mail']) AND isset($_POST['tel']) AND isset($_POST['age']))
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
            $bdd_inscription->exec('INSERT INTO user (id_user,name_user, prenom_user, pseudo_user, password_user, tel_user, age_user,photo_user,sexe_user,mail_user,current_status_user,bio_user) VALUES(2,\'cordonier\', \'Patrick\', \'pat\',\'yo\', 0660912718, 22 ,1,\'male\',\'wahou@hotmailfr \',\'raaa\',\'jpp\')');
            echo '<div id="echec">';
            echo '<strong>L\'utilisateur a bien été ajouté !, vous pouvez maintenant vous connecter<strong>';
            echo'</div>';
        }
        else
        {
            echo '<div id="echec">';
            echo 'Tous les champs sont obligatoires';
            echo '</div>';
            // ici reprendre le css pour que ca s affiche bien mais on affiche un encart pour dire echec connexion
        }
       
        



        ?>
    
</div>
    
    
    <footer>
 Nicolas CHOLLET - Mariuca DE HILLERIN - Sophie-Anne CORDONNIER   
        
        
    </footer>
    
    
   
</body>

</html>
<!-- a faire plutard : blinder la saisie dans l inscription pour verifier si le pseudo est deja pris