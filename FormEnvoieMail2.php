<?php
    include 'css/header.php'; 

if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
    // On affiche alors le panel d'admin, soit tout le code ci-dessous
    include('coBD.php');
    $num = $_GET['num'];
    
    if($num == 1){
        $req = "Select * from menu";
        $traitement = $connect->prepare($req);
        $traitement -> execute();
        while($row = $traitement -> fetch()){
            echo $row['dateM']."<br>";
        }
    }else{
        $req = "Select * from menu";
        $traitement = $connect->prepare($req);
        $traitement -> execute();
        ?> <select name="obj"> <?php
        while($row = $traitement -> fetch()){
            if ($row['MidiSoir'] == 1){
                $moment = "midi";
            }else{
                $moment = "soir";
            }
            echo "<option value='" . $row['idM'] . "'>".  $row['dateM'] . "(le " .$moment . ") </option>" ;
        }
        ?> </select> <?php
    }
    

}else {
    // sinon : la variable session user n'est pas défini ou différente de 'admin'
    header('location:index.php');
}
?>