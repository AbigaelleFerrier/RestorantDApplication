<?php
    include 'css/header.php'; 
    if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
?>    
    </head>
    <body>
        <?php             
            try {
                 include('coBD.php');
                 $idCli = $_GET['id'];
                 $Nom = $_POST['Nom'];
                 $Tel = $_POST['Tel'];
                 $Mail = $_POST['Mail'];
                 $action = $_POST['action'];
                   
                 if($action == "Modif"){
                    $Req = "UPDATE client SET NomPrenom=?, Tel=?, mail=? where idCli=?";
                    $Traitement = $connect -> prepare($Req);
                    $Traitement -> bindParam(1, $Nom);
                    $Traitement -> bindParam(2, $Tel);
                    $Traitement -> bindParam(3, $Mail);
                    $Traitement -> bindParam(4, $idCli);
                    $Traitement -> execute();
                    
                    header('location:PannelReservAdmin.php?msgS=Mc');
                    
                 }else{
                    $Req = ('Delete from client where idCli=?');
                    $traitement  = $connect->prepare($Req);
                    $traitement -> bindValue(1, $idCli);
                    $traitement -> execute(); 
                    
                    header('location:PannelReservAdmin.php?msgS=Sc');
                 }
                 
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