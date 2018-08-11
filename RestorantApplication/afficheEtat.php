<?php
session_start();
if(isset($_SESSION['user']) && ($_SESSION['user']== 'AdminReserv')) {
    try{
            header('Content-Type:text/plain;');
            include('coBD.php');
            $date = $_GET['date'];

            $req = "SELECT * FROM menu where dateM=?";
            $traitement = $connect ->prepare($req);
            $traitement -> bindParam(1, $date);
            $traitement -> execute();
        
            while($row = $traitement->fetch()) {
        if($row['etat'] == 1){  
            $nb = $row['nbMaxClient'] - $row['nbReserv'] ;
                echo '<p>'; 
                echo "Nombre de client maximum : ". $row['nbMaxClient'] ." <br/>Nombre de personne ayant déjà réservé : " . $row['nbReserv']
                        . "<br> Nombre de client possible : " . $nb;
                echo '</p>';
            
                 $req3 = "Select * FROM client, reservation where client.idCli = reservation.idCli and idM=?";
                 $traitement3 = $connect ->prepare($req3);
                 $traitement3 -> bindParam(1,$row['idM']);
                 $traitement3 -> execute();
                                  
                 while($row3 = $traitement3->fetch()){
                    echo '<p>'; 
                    echo "Nom du client : ". $row3['NomPrenom'] ."<br/> Nombre de personne attendu : " . $row3['nbPerso'] . " <br/>Etat : " . $row3['etatReserv'];
                    ?><br> <a class="btn btn-bg btn-margin" href="FormModifReservCli.php?id=<?php echo $row3['numR']; ?>"> Modifier </a> <br/> <?php
                    echo '</p>';
                 } ?> <form method="post" name="formulaire" action="ModifCom.php?id=<?php echo $row['idM'];?>"><?php
                 echo "Note(s) : " ?> <br><textarea type="text" cols="50" name="Com"><?php echo $row['Com'];?> </textarea>  <br><input type="submit" class="btn btn-bg" value="Modifier"/> <br/> <?php
                 
                
        }
        else{
            echo $row['dateM'] . '<br>Cette date a été annulée <br><br>';
                 $req3 = "Select * FROM client, reservation where client.idCli = reservation.idCli and idM=?";
                 $traitement3 = $connect ->prepare($req3);
                 $traitement3 -> bindParam(1,$row['idM']);
                 $traitement3 -> execute();
                 
                while($row3 = $traitement3->fetch()){
                    echo '<p>'; 
                    echo "Nom du client : ". $row3['NomPrenom'] ."<br/> Téléphone : " . $row3['Tel'] . " <br/>Etat : " . $row3['etatReserv'];
                    echo '</p>';
                }
                
        }
            }
        } catch (Exception $ex) {
            die('Erreur : '.$ex->getMessage());
        }
        
}else{
    header('location:index.php');
}