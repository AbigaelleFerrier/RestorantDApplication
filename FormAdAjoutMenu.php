<?php
    include 'css/header.php'; 

if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminMenu')) {
    // On affiche alors le panel d'admin, soit tout le code ci-dessous
    
    ?>    

    

    </head>
    <body>
        <a class="button-pannel" href="adminpanel.php"> Revenir en arrière </a> 
        
        <form method="post" name="formulaire" action="Ajout.php">
            <label for='Dat'> Date :      </label>
                <input type="date" id="Dat" name="Dat" required /> <br/>
                
                <input type="radio" name ="moment" value="1" id="1" checked/> <label for="midi">Le midi</label>
                <br/>
                <input type="radio" name ="moment" value="0" id="0"/> <label for="soir">Le soir</label>
            <br/>    
            <label for='nbCli'> Nombre de client maximum :      </label>
                <input type="text" id="nbCli" name="nbCli" /> <br/>
            <label for='Titre'> Titre :      </label>
                <input type="text" name="Titre" value="" /> <br/>
                <table id="AdE"> Entrée(s) : <br/>
                    <textarea required cols="50" name="Entree"></textarea>
                </table>  
                <table id="AdP"> Plat(s) : <br/>
                    <textarea type="text" cols="50" name="Plat" required></textarea> 
                </table>
                
                <input type="radio" name ="From" value="1" id="Assiette" checked/> <label for="Assiette">Assiette de fromages</label>
                <br/>
                <input type="radio" name ="From" value="0" id="plateau"/> <label for="Plateau">Plateau de fromages</label>
                
            <br/> <table id="AdD"> Dessert(s) : <br/>
                <textarea type="text" cols="50" name="Dessert" required></textarea>
            </table>  <br/>
            <label for='autre'> Autre information :      </label>
                <input type="text" id="autre" name="autre" /> <br/>
                
            <input type="submit" value="Valider"/> <br/>
         <?php 
            include_once('css/footer.php');
        ?> 
    </body>
</html>
 <?php

}else {
    // sinon : la variable session user n'est pas défini ou différente de 'admin'
    header('location:index.php');
}
?>