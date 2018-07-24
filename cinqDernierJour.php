<?php 
    try{
        include('coBD.php');

        $dateNow = date('Y-m-d');
        
        $req = "SELECT * from menu where dateM >= ? order by dateM asc, MidiSoir desc limit 5";

        $traitement = $connect ->prepare($req);
        $traitement -> bindValue(1, $dateNow);
        $traitement -> execute();     

        $sorti = true;

        while($row = $traitement->fetch()) {
            $sorti = false;

            if ($row['MidiSoir'] == 1) {
              $midiSoir = "";  
            }
            else {
              $midiSoir = " (soir)";
            }
            
            echo '<a onclick="Req(\''.$row['dateM'].'\');"><li>'. $row['dateM'] . $midiSoir .'</li></a>';

        }

        if ($sorti) {
            echo '<hr><p>Les prochaines dates n\'ont pas encore été enregistrées</p>';
        }

    } catch (Exception $ex) {
        die('Erreur : '.$ex->getMessage());
    }
?>