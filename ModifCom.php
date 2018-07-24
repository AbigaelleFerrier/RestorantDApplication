<?php
session_start();
if(isset($_SESSION['user']) && ($_SESSION['user']== 'AdminReserv')) {
    try{
            header('Content-Type:text/plain;');
            include('coBD.php');
            $id = $_GET['id'];
            $Com = $_POST['Com'];
                        
            $req = "Update menu SET Com=? where idM=?";
            $traitement = $connect ->prepare($req);
            $traitement -> bindParam(1, $Com);
            $traitement -> bindParam(2, $id);
            $traitement -> execute();
        
             header('location:PannelReservAdmin.php?msgS=Mc');
            
        } catch (Exception $ex) {
            die('Erreur : '.$ex->getMessage());
        }
        
}else{
    header('location:index.php');
}
