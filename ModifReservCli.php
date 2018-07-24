<?php
    include 'css/header.php'; 
    if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
?>    
    </head>
    <body>
        <?php             
            try {
                 include('coBD.php');
                 $numR = $_GET['id'];
                 $Nom = $_POST['Nom'];
                 $actu = $_POST['actu'];
                 $etat = $_POST['etat'];
                 
                 $req2 ="UPDATE reservation SET etatReserv=? where numR=?";
                 $traitement2 = $connect -> prepare($req2);
                 $traitement2 -> bindParam(1, $etat);
                 $traitement2 -> bindParam(2, $numR);
                 $traitement2 -> execute();
                 
                    if($etat == "Confirmé" || ($etat == "Confirmé" && $actu == "En attente de confirmation") ){
                        $Req = "UPDATE client SET fidelite=fidelite+1 where NomPrenom=?";
                        $Traitement = $connect -> prepare($Req);
                        $Traitement -> bindParam(1, $Nom);
                        $Traitement -> execute();
                        
                    }else if ($etat == "Annulé" && $actu=="Confirmé"){
                        $Req = "UPDATE client SET fidelite=fidelite-1 where NomPrenom=?";
                        $Traitement = $connect -> prepare($Req);
                        $Traitement -> bindParam(1, $Nom);
                        $Traitement -> execute();
                        
                        $Req2 = "Select * FROM menu, reservation where menu.idM = reservation.idM and numR=?";
                        $Traitement2 = $connect -> prepare($Req2);
                        $Traitement2 -> bindParam(1, $numR);
                        $Traitement2 -> execute();
                        $row = $Traitement2 -> fetch();
                        
                        $nb = ($row['nbReserv']-$row['nbPerso']);
                        
                        $Req3 = "Update menu set nbReserv=? where idM=?";
                        $Traitement3 = $connect -> prepare($Req3);
                        $Traitement3 -> bindParam(1, $nb);
                        $Traitement3 -> bindParam(2, $row['idM']);
                        $Traitement3 -> execute();
                        
                    }else if($etat == "Annulé" && $actu == "En attente de confirmation"){
                        $Req2 = "Select * FROM menu, reservation where menu.idM = reservation.idM and numR=?";
                        $Traitement2 = $connect -> prepare($Req2);
                        $Traitement2 -> bindParam(1, $numR);
                        $Traitement2 -> execute();
                        $row = $Traitement2 -> fetch();
                        
                        $nb = ($row['nbReserv']-$row['nbPerso']);
                        
                        $Req3 = "Update menu set nbReserv=? where idM=?";
                        $Traitement3 = $connect -> prepare($Req3);
                        $Traitement3 -> bindParam(1, $nb);
                        $Traitement3 -> bindParam(2, $row['idM']);
                        $Traitement3 -> execute();
                    }
                    
            header('location:PannelReservAdmin.php?msgS=Mc');
            
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