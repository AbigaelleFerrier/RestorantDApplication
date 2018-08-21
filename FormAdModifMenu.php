<?php
    include 'css/header.php'; 

if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminMenu')) {
    // On affiche alors le panel d'admin, soit tout le code ci-dessous
    
    ?>    
    </head>
    <body>
        <a class="button-pannel" href="adminpanel.php"> Revenir en arrière </a> 
        <?php             
            try {
                 include('coBD.php');
            $id = $_GET['id'];

            $req = "SELECT * FROM menu where idM=?";
            $traitement     = $connect ->prepare($req);
            $traitement     -> bindParam(1, $id);
            $traitement     -> execute();
            
            $row = $traitement->fetch();
         ?>
        <form method="post" name="formulaire" action="modif.php?id=<?php echo $row['idM']; ?>">
            <label for='Dat'> Date :      </label>
                <input type="text" name="Dat" value="<?php echo $row['dateM']; ?>" required /> <br/>
                
               <?php if($row['MidiSoir'] == 1){ ?>
                   <input type="radio" name ="moment" value="1" id="1" checked/> <label for="midi">Le midi</label>
                <br/>
                <input type="radio" name ="moment" value="0" id="0"/> <label for="soir">Le soir</label>
            <br/>    
               <?php }else{ ?>
                   <input type="radio" name ="moment" value="1" id="1"/> <label for="midi">Le midi</label>
                <br/>
                <input type="radio" name ="moment" value="0" id="0" checked/> <label for="soir">Le soir</label>
            <br/>    
              <?php } ?>
                
            <label for='Titre'> Titre :      </label>
                <input type="text" name="Titre" value="<?php echo $row['Titre']; ?>" /> <br/>
            <label for='nbCli'> Nombre de client maximum :      </label>
                <input type="text" id="nbCli" name="nbCli" value="<?php echo $row['nbMaxClient']; ?>" /> <br/>
             <table id="AdE"> Entrée(s) : <br/>
                 <textarea type="text" cols="50" name="Entree"><?php echo $row['libelleE'];?> </textarea>
                </table> 
                <br/><table id="AdP"> Plat(s) : <br/>
                    <textarea type="text" cols="50" name="Plat"> <?php echo $row['libelleP'];?> </textarea> 
                </table> 
                
                <?php if($row['Fromage'] == 1){ ?>
                   <input type="radio" name ="From" value="1" id="Assiette" checked/> <label for="Assiette">Assiette de fromages</label>
                <br/>
                <input type="radio" name ="From" value="0" id="plateau"/> <label for="Plateau">Plateau de fromages</label> <br/>
               <?php }else{ ?>
                   <input type="radio" name ="From" value="1" id="Assiette"/> <label for="Assiette">Assiette de fromages</label>
                <br/>
                <input type="radio" name ="From" value="0" id="plateau" checked/> <label for="Plateau">Plateau de fromages</label> <br/>
              <?php } ?>
                
            <br/><table id="AdD"> Dessert(s) : <br/>
                <textarea type="text" cols="50" name="Dessert"> <?php echo $row['libelleD'];?> </textarea>
                </table>
            <label for='autre'> Autre information :      </label>
                <input type="text" id="autre" name="autre" value="<?php echo $row['autres'];?>" /> <br/>
            <label for='Com'> Commentaire :      </label>
                <input type="text" id="Com" name="Com" value="<?php echo $row['Com'];?>" /> <br/>

            <input type="submit" value="Valider"/> <br/>
          <?php
            }
            catch (Exceptions $ex){
                    echo "Problème avec PDO : ".$ex->getMessage();
            }
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