<?php  session_start(); ?>


<!DOCTYPE html>
<html> 
    <head>
	
	<title>Profil</title>

</head>
    <body>
<div id="ajouter">
        <a> Vous souhaitez ajouter un élément à votre CV ? </a>
        <br/><br/>
    <form method="post" action="test.php">
            <label for="struct">Structure :  </label><input name="struct" type="text" id="struct" /> &nbsp;<br/>
            <label for="type">Type : </label>
                    <select name=type id=type>
                            <option value="formation">Formation</option>
                            <option value="experience">Experience</option>
                    </select> 
            <label for="date">Date de début :  </label><input name="dated" type="date" id="date" /> &nbsp;<br/>
            <label for="date">Date de fin :  </label><input name="datef" type="date" id="date" /> &nbsp;<br/>
            <label for="description">Description : </label><input type="text" name="description" id="description" /><br/>
    
	        <input type="submit" value="Ajouter un élément au CV" />
    </form>
    
</div>
   
    <?php 

        //on verifie que l'utilisateur a bien entré les differentes entrées du formulaires
        if(empty($_POST['struct'])) $_POST['struct'] = NULL;
        //if(empty($_POST['type'])) $_POST['type '] = NULL;
        if(empty($_POST['description'])) $_POST['description'] = NULL;
        if(empty($_POST['dated'])) $_POST['dated'] = NULL;
        if(empty($_POST['datef'])) $_POST['datef'] = NULL;  
   
     if(isset($_POST['struct']) AND isset($_POST['description']) AND isset($_POST['dated']) AND isset($_POST['datef']) )
           
        {
              
            //on ouvre la bdd en verifiant son ouverture
                                try
                    {
           echo 'coucou';
                                  
                        // On se connecte à MySQL
                        $bdd_inscription = new PDO('mysql:host=localhost;dbname=excepert;charset=utf8', 'root','root');
                    }
                    catch(Exception $e)
                    {
                        // En cas d'erreur, on affiche un message et on arrête tout
                            die('Erreur : '.$e->getMessage());
                    }
            // On ajoute une entrée dans la table user
            $bdd_inscription->exec('INSERT INTO experience (id_user,structure_exp, description_exp, date_exp_begin, type_exp, date_exp_end,id_exp) VALUES(3,\'form\',\'coucou\', 2018-01-01, \'form\', 2019-02-01, 3 )');

            echo 'yesss';
        }
     
      ?>
        
         </body>
</html>

