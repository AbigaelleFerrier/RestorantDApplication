<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'css/header.php';
        if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
        ?> 
               
    </head>
    <body>
        
        <?php
            include('coBD.php');
            $idCli = $_GET['id'];
            $req = "Select * from client where idCli=?";
            $traitement = $connect ->prepare($req);
            $traitement -> bindParam(1, $idCli);
            $traitement -> execute();
            $row = $traitement -> fetch();
        ?>
        
        <a class="button-pannel" href="PannelReservAdmin.php"> Revenir en arrière </a> 

        <form method="post" name="formulaire"  action="ModifCli.php?id=<?php echo $row['idCli'] ?>"> 
            <label for='Nom'> Nom :      </label>
            <input type="text" name="Nom" value="<?php echo $row['NomPrenom']; ?>" required />
            <br/>
            
            <label for='Tel'> Téléphone :      </label>
            <input type="text" name="Tel" value="<?php echo $row['Tel']; ?>" required />
            <br/>
            
            <label for='Mail'> Adresse mail :      </label>
            <input type="text" name="Mail" value="<?php echo $row['mail']; ?>" />
            <br/>
            
            <input type="radio" name ="action" value="Modif" id="1" checked/> <label for="Modif"> Modifier les informations </label>
            <br/>
            <input type="radio" name ="action" value="Sup" id="0"/> <label for="Sup"> Supprimer le client </label>
            <br/>   
            
            <input type="submit" value="Appliquer">
               
        </form>
        
       
        
        <?php
            include_once('css/footer.php');
        ?> 
        
    </body>
</html>
<?php
        }else{
            header('location:index.php');
        }
?>