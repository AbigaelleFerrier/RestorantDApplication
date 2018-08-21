<?php
    include 'css/header.php'; 

if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminMenu')) {
    // On affiche alors le panel d'admin, soit tout le code ci-dessous
    
    ?>    
    </head>
    <body>
        <?php             
            try {
                 include('coBD.php');
            
                 $id = $_GET['id'];
            
                $Req = "UPDATE menu SET etat=1 where idM=?";
                $Traitement = $connect -> prepare($Req);
                $Traitement -> bindParam(1, $id);
                $Traitement -> execute();
            
            header('location:adminpanel.php?msgS=AnulMenu');
            
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