<?php
    session_start();
    try{
        header('Content-Type:text/plain;');
        include('coBD.php');
        $date = $_GET['date'];

        $req = "SELECT * FROM menu where dateM=? ORDER BY MidiSoir desc ";
        $traitement = $connect ->prepare($req);
        $traitement -> bindParam(1, $date);
        $traitement -> execute();
        
        echo '<div class="slideInRight">';

        $sorti =  true;

        while($row = $traitement->fetch()) {
            
            $sorti =  false;


            echo '<div class="row">';

            if($row['etat'] == 1){    
                if (($_SESSION['user']=='AdminMenu')) {
                    ?> <a href="AnnulMenu.php?id=<?php echo $row['idM']; ?>"> Cliquez ici pour annuler cette date </a> <br/>
                    <?php echo '<p>'; 
                    echo "Nombre de client maximum : ". $row['nbMaxClient'];
                    echo '</p>';
                }

                // TITRE //
                echo '<div class="col-12 titre">';
                    echo '<h2>';
                        echo $row['Titre'];
                        echo " ";
                        echo $row['dateM'];
                    echo '</h2>';

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
                echo '<div class="col-12 menu slideInRightL">';
                    echo '<h3>Entree</h3>';         
                  
                    echo '<p>';
                        echo $row['libelleE'] . '<br>';
                    echo '</p>';
                echo '</div>';
                ////////////
                
                // PLAT //
                echo '<div class="col-12 menu slideInRightL">';
                    echo '<h3>Plat</h3>';         
                
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
                echo '<div class="col-12 menu slideInRightL">';
                    echo '<h3>Dessert</h3>';         
                        echo '<p>';
                               echo $row['libelleD'] . '<br>';
                        echo '</p>';    
                echo '</div>';
                /////////////

                // AUTRES //
                if ($row['autres'] != "") {
                    echo '<div class="col-12 menu slideInRightL">';         
                        echo '<p>';
                            echo $row['autres'] . '<br>';
                        echo '</p>';
                    echo '</div>';
                }
                ////////////
                    
                if ($_SESSION['user']== 'AdminReserv')
                {
                    echo '<div class="col-12">';
                        ?>
                            <input type="text" name="id" value="<?php echo $row['idM']; ?>" style="display:none" />
                            <input type="submit" value="Réserver"/> <br/>
                <?php 
                    echo '</div>';
                    
                }
                
                echo '</div>';

                echo '<div class="row">';
                    echo "<hr>";
                echo '</div>';
                
            }
                
            else if($row['etat'] == 0)
            {
                echo $date . '<br>Cette date a été annulée <br>';
                if ($_SESSION['user']== 'AdminMenu')
                {
                    ?> <a href="DesAnnulMenu.php?id=<?php echo $row['idM']; ?>"><button class="button" style="margin-bottom: 15px; "> Remmetre le menu </button></a> <?php
                }
            }

            else
            {
                echo $date . '<br> Il n\'y a pas de menu enregistré à cette date <br>';
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
        
/*
        
SELECT m.idM, e.libelleE 
FROM   menu m, entree e
WHERE  e.idM   = m.idM 
AND    m.dateD = '2018-04-16';

SELECT m.idM, p.libelleP
FROM   menu m, plat p
WHERE  p.idM   = m.idM 
AND    m.dateD = '2018-04-16';

SELECT m.idM, d.libelleD 
FROM   menu m, dessert d
WHERE  d.idM   = m.idM 
AND    m.dateD = '2018-04-16';
          
         
*/
