<?php
    include 'css/header.php'; 
    if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
?>    
    </head>
    <body>
        <?php             
            try {
                 include('coBD.php');
                 $dat = $_POST['Dat'];
                 $nbPers = $_POST['nbPers'];
                 $Nom = $_POST['Nom'];
                 $Tel = $_POST['Tel'];
                 $Mail = $_POST['Mail'];
                 $idM = $_POST['id'];
                 $Presence = $_POST['Presence'];
                 
                 if($Presence == "Aconfirmé"){
                     $Presence = "En attente de confirmation";
                     $fidelite = 0;
                 }else{
                     $fidelite = 1;
                 }
                                  
                 $Req = "INSERT INTO client (NomPrenom, mail, Tel, fidelite) VALUES (?,?,?,?) ";
                 $Traitement = $connect -> prepare($Req);
                 $Traitement -> bindParam(1, $Nom);
                 $Traitement -> bindParam(2, $Mail);
                 $Traitement -> bindParam(3, $Tel);
                 $Traitement -> bindParam(4, $fidelite);
                 $Traitement -> execute();
                 
                 $idCli = $connect -> lastInsertId();
                                 
                    $req = "INSERT INTO reservation (nbPerso, idCli ,idM, etatReserv) VALUES(?,?,?,?) ";
                    $traitement = $connect ->prepare($req);
                    $traitement -> bindParam(1, $nbPers);
                    $traitement -> bindParam(2, $idCli);
                    $traitement -> bindParam(3, $idM);
                    $traitement -> bindParam(4, $Presence);
                    $traitement -> execute();
                    
                     $Req3 = "Select nbReserv from menu where idM=?";
                   $Traitement3 = $connect -> prepare($Req3);
                   $Traitement3 -> bindParam(1, $idM);
                   $Traitement3 -> execute();
                   $row2 = $Traitement3->fetch();
                   
                   $nb = $row2['nbReserv'] + $nbPers;  
                   
                $Req2 = "UPDATE menu SET nbReserv=nbReserv+? where idM=?";
                $Traitement2 = $connect -> prepare($Req2);
                $Traitement2 -> bindParam(1, $nb);
                $Traitement2 -> bindParam(2, $idM);
                $Traitement2 -> execute();
                    
            header('location:PannelReservAdmin.php?msgS=Rs');
            
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
    header('location:index.php');
}
?>