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
            $numR = $_GET['id'];
            $req = "Select * from reservation, client where client.idCli = reservation.idCli and numR=?";
            $traitement = $connect ->prepare($req);
            $traitement -> bindParam(1, $numR);
            $traitement -> execute();
            $row = $traitement -> fetch();
        ?>
        
        <a class="button-pannel" href="PannelReservAdmin.php"> Revenir en arrière </a> 

        <form method="post" name="formulaire"  action="ModifReservCli.php?id=<?php echo $row['numR'];?>"> 
            <label for='Nom'> Nom :      </label>
            <input type="text" name="Nom" id="Nom" value="<?php echo $row['NomPrenom']; ?>" />
            <br/>
            
            <label for='actu'> État actuel :      </label>
            <input type="text" name="actu" id="actu" value="<?php echo $row['etatReserv']; ?>" />
            <br/>
            
            <input type="radio" name="etat" value="Confirmé" id="1" checked/> <label for="Confirmé"> Confirmer la présence </label>
            <br/>
            <input type="radio" name="etat" value="Annulé" id="0"/> <label for="Annulé"> Annuler la réservation </label>
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