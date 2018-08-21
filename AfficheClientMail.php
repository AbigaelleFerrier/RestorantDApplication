<?php
    session_start();
    if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
    try{
            header('Content-Type:text/plain;');
            include('coBD.php');
            
            $req = "SELECT * FROM `client` WHERE `mail` IS NOT NULL ORDER BY `fidelite` DESC";
            $traitement = $connect ->prepare($req);
            $traitement -> execute();
        
            echo "<div class=\"row\">";

            echo '<hr class="hr">';

            while($row = $traitement->fetch()) {
                echo '<div id="div'. $row['idCli'] .'" class="col-3 displayClient" onclick="mailSelectClient('. $row['idCli'] .')">'.
                        '<p>Nom : ' . $row['NomPrenom'] . '  <input value="'. $row['mail'] .'" name="ClientSelectionner[]" type="checkbox" id="input'. $row['idCli'] .'" style="display:  none;">'.
                        "<br> Est venu(e) : " . $row['fidelite'] . " fois<br></p>" .
                     "</div>";
            }

            echo '<hr class="hr">';

        } catch (Exception $ex) {
            die('Erreur : '.$ex->getMessage());
        }
    }

    else{
        header('location:index.php');
    }

?>