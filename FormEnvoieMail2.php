<?php
    try{
        header('Content-Type:text/plain;');
        include('coBD.php');
        $date = $_GET['date'];

        $req = "SELECT * FROM menu where dateM=? ORDER BY MidiSoir desc ";
        $traitement = $connect ->prepare($req);
        $traitement -> bindParam(1, $date);
        $traitement -> execute();
        
        echo '<div class="slideInRight mail-menu">';

        $sorti =  true;

        while($row = $traitement->fetch()) {
            
            $sorti =  false;


            echo '<div class="row">';

            if($row['etat'] == 1){    
                

                // TITRE //
                echo '<div class="col-12 titre">';
                    echo '<h3>';
                        echo $row['Titre'];
                        echo " ";
                        echo $row['dateM'];
                    echo '</h3>';

                    echo '<p class="midiSoir">';
                       
                        if ($row['MidiSoir'] == 0){
                                echo 'Le soir';
                        }else{
                               echo'Le midi';
                        }
                    echo '</p>';

                echo '</div>';
                ////////////
                    
                // ENTREE //   
                echo '<div class="col-4  slideInRightL">';
                    echo '<h4>Entree</h4>';         
                  
                    echo '<p>';
                        echo $row['libelleE'] . '<br>';
                    echo '</p>';
                echo '</div>';
                ////////////
                
                // PLAT //
                echo '<div class="col-4  slideInRightL">';
                    echo '<h4>Plat</h4>';         
                
                    echo '<p>';
                        echo $row['libelleP'] . '<br>';
                           if ($row['Fromage'] == 0){
                                echo '<br>Plateau de frommages';
                           }else{
                               echo'<br>Assiette de fromages';
                           }
                    echo '</p>';   
                echo '</div>';
                ////////////

                // DESSERT //
                echo '<div class="col-4 slideInRightL">';
                    echo '<h4>Dessert</h4>';         
                        echo '<p>';
                               echo $row['libelleD'] . '<br>';
                        echo '</p>';    
                echo '</div>';
                /////////////

                // AUTRES //
                if ($row['autres'] != "") {
                    echo '<div class="col-12 slideInRightL">';         
                        echo '<p>';
                            echo $row['autres'] . '<br>';
                        echo '</p>';
                    echo '</div>';
                }
                ////////////
                    
            
                
                echo '</div>';

                echo '<div class="row">';
                    echo "<hr>";
                echo '</div>';
                
            }
                
            else if($row['etat'] == 0)
            {
                echo $date . '<div class="row"><div class="col-12 slideInRightL mail-menu">Cette date a été annulée</div></div>';
            }

            else
            {
                echo $date . '<div class="row"><div class="col-12 slideInRightL mail-menu">Il n\'y a pas de menu enregistré à cette date</div></div>';
            }
            
        }

        if ($sorti) {
            echo '<div class="row">';
                echo '<div class="col-12 titre">';
                    echo '<h2>';
                        echo $date;
                    echo '</h2>';
                echo '</div>';

                 echo '<div class="col-12 menu slideInRightL">';
                    echo '<h3>Il n\'y a pas de menu pour ce jour</h3>';          
                echo '</div>';

            echo '</div>';
        }


    } catch (Exception $ex) {
        die('Erreur : '.$ex->getMessage());
    }
    
    echo '</div>';  