<!DOCTYPE html>
    
<html>
    <head>
        <meta charset="utf-8" />
        <title>Accueil</title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="accueil.css" />
    </head>

    <body>
        <nav id = "boutons">
            <div> &nbsp;&nbsp;     
            <img src="ECElogo.png" class="logo" height="100" width="100" style="margin-right:25px";/></div>
            
            <div class ="bienvenue"></div>
            <!-- DIV DES BOUTONS --> 
            <div id ="bouton"> Accueil</div>
            <div id="bouton">  <a href="reseau.html">Réseau</a> </div>
            <div id="bouton">  <a href="profil.html">Mon profil </a></div>
            <div id="bouton"> <a href="messagerie.html"> Messagerie </a></div>
            <div id="bouton">  <a href="notifications.html"> Notifications</a> </div>
            <div id="bouton"> <a href="emplois.html">Emplois </a> </div>  
            <div id="boutondeco" > <a href="formulaire.html"> Deconnexion </a></div>
        </nav>
    
    <div class="actualites">
        <div id="titre"> BIENVENUE SUR ECExPERTS</div>
        <div id="messageaccueil">Votre fil d'actualité :</div>
        <div>  <br><br>
            <div id="nomami">News 1</div> 
            <img src ="identite.png" class="imgpublication" width = "100px" height = "100px"/> <br><br><br>
             <div id="nomami">News 2</div> 
            <img src ="identite.png" class="imgpublication" width = "100px" height = "100px"/> <br><br><br>
             <div id="nomami">News 3</div> 
            <img src ="identite.png" class="imgpublication" width = "100px" height = "100px"/> <br><br><br>  
            <div id="nomami">News 4</div> 
            <img src ="identite.png" class="imgpublication" width = "100px" height = "100px"/> <br><br><br> 
            <div id="nomami">News 5</div> 
            <img src ="identite.png" class="imgpublication" width = "100px" height = "100px"/> <br><br><br> 
         </div>
    </div>
         
    <div class="publication"> 
        <div id="boutonpartage" > <a> Publier du contenu </a></div>
                <fieldset>
	               <p>
	               <label for="publication">Publication :</label><input/><br/>
	               <label for="date">Date :</label><input/><br/>
                   <label for="media">Ajouter un media :</label><br/>
                   <img src="photo.png" class="logo" height="30" width="30" style="margin-left: auto"/>
                   <img src="video.png" class="logo" height="30" width="30" style="margin-left: auto"/>  
                   <img src="event.png" class="logo" height="30" width="30" style="margin-left: auto"/>    
                       <br/>
                   <label for="humeur">Feeling :</label><input/><br/>
                   <label for="bouton"><a><input type="submit" value="Publier" /></a> </label> 
	               </p>
	            </fieldset>
         
    </div> 
    </body>
    
        
</html>

