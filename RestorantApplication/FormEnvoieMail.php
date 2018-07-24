<?php
    include 'css/header.php'; 

if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
    // On affiche alors le panel d'admin, soit tout le code ci-dessous
    include('coBD.php');
    $num = $_GET['num'];
    
    if($num == 1){
        $req = "Select * from client";
        $traitement = $connect->prepare($req);
        $traitement -> execute();
        while($row = $traitement -> fetch()){
            echo $row['mail'] . "<br>";
        }
    }else{
        $req = "Select * from client";
        $traitement = $connect->prepare($req);
        $traitement -> execute();
        ?> <select name="obj"> <?php
        while($row = $traitement -> fetch()){
            echo "<option value='" . $row['mail'] . "'>".  $row['NomPrenom'] . " </option>" ;
        }
         ?> </select> <?php
    }
    

}else {
    // sinon : la variable session user n'est pas défini ou différente de 'admin'
    header('location:index.php');
}
?>