<?php
    session_start();
    try {
         include('coBD.php');
         
        //la requete compte le nb de ligne correspondant au couple login/mdp
        $req = "select * from admin where nomA=:i and mdp=:p;";

        $traitement = $connect->prepare($req);

        $traitement->bindparam(':i', $_POST['Nom']);
        $traitement->bindparam(':p', $_POST['pwd']);

        $traitement->execute();

        if ($ligne=$traitement->fetch()) {
            $_SESSION['user']=$ligne['categ'];
            if ($_SESSION['user']== 'AdminMenu') {
                header('location:adminpanel.php');
            }
            else if($_SESSION['user']== 'AdminReserv'){
                header('location:PannelReservAdmin.php');
            }
            
        } else {        
            header('location:index.php');
        }
    }
    catch (PDOException $e){
        die("Source : ".$dsn." Erreur : ".$e->getMessage());
    }

?>