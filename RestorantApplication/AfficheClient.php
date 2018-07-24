<?php
    session_start();
    if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
    try{
            header('Content-Type:text/plain;');
            include('coBD.php');
            
            $req = "SELECT * FROM client order by fidelite desc";
            $traitement = $connect ->prepare($req);
            $traitement -> execute();
        
            while($row = $traitement->fetch()) {
                echo "Nom : " . $row['NomPrenom'] .
                        "<br> Adresse mail : " . $row['mail'] .
                        "<br> Téléphone : " . $row['Tel'] .
                        "<br> Est venu(e) : " . $row['fidelite']. " fois <br>";
                ?> <a href="FormModifCli.php?id=<?php echo $row['idCli']; ?>"> Modifier </a> <br/> <br> <?php
            }
        } catch (Exception $ex) {
            die('Erreur : '.$ex->getMessage());
        }
    }else{
        header('location:index.php');
    }