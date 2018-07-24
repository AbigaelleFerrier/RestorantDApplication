<?php

include 'css/header.php'; 

if(isset($_SESSION['user']) && ($_SESSION['user']== 'AdminMenu')) {
    // On affiche alors le panel d'admin, soit tout le code ci-dessous
    
    ?>    
    </head>
    <body>
        <?php             
            try {
                 include('coBD.php');
                 
            $id = $_GET['id'];
            $date = $_POST['Dat'];
            $nbCli  = $_POST['nbCli'];
            $titre = $_POST['Titre'];
            $Entree = $_POST['Entree'];
            $Plat   = $_POST['Plat'];
            $Dessert = $_POST['Dessert'];
            $Autre = $_POST['autre'];
            $moment = $_POST['moment'];
            $From = $_POST['From'];
            $Com = $_POST['Com'];
            
            $entree = str_replace("\n",'<br/>',$Entree);
            $plat = str_replace("\n",'<br/>',$Plat);
            $dessert = str_replace("\n",'<br/>',$Dessert);
            
            $req = "UPDATE menu SET dateM=?, MidiSoir=?, nbMaxClient=?, Titre=?, libelleE=?, libelleP=?, libelleD=?, Fromage=?, autres=?, Com=? where idM=?";
            
            $Traitement = $connect -> prepare($req);
            $Traitement -> bindParam(1, $date);
            $Traitement -> bindParam(2, $moment);
            $Traitement -> bindParam(3, $nbCli);
            $Traitement -> bindParam(4, $titre);
            $Traitement -> bindParam(5, $entree);
            $Traitement -> bindParam(6, $plat);
            $Traitement -> bindParam(7, $dessert);
            $Traitement -> bindParam(8, $From);
            $Traitement -> bindParam(9, $Autre);
            $Traitement -> bindParam(10, $Com);
            $Traitement -> bindParam(11, $id);
            
            $Traitement -> execute();
                                 
            header('location:adminpanel.php?msgS=MMenu');
            
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