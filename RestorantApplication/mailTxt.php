<?php
	session_start();

	var_dump($_SESSION);

	if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {

		echo  '** RESTAURANT D\'APPLICATION -- LYC&#201;E EMILE PEYTAVIN **\n';
		echo  '-------------------------------------------------------\n';

		echo  preg_replace('/<[^>]*>/' , "" , $_SESSION['Post-Mail']['mce_0']);
		echo  ('\n');

		if (isset($_SESSION['Post-Mail']['dateChoixMail'])) { 
			try{
				include('coBD.php');
				$date = $_SESSION['Post-Mail']['dateChoixMail'];

                $req = "SELECT * FROM menu where dateM=?";
                $traitement = $connect ->prepare($req);
                $traitement -> bindParam(1, $date);
                $traitement -> execute();

                if($row = $traitement->fetch()) {
                	echo $row['Titre'];
					echo " ";
					echo $row['dateM'];
					echo  ('\n');


					if ($row['MidiSoir'] == 0){
                            echo 'Le soir';
                    }else{
                           echo'Le midi';
                    }


                    echo  ('\n');
                    echo  ('\n');

                    echo 'Entree';
                    echo  ('\n');
                    echo $row['libelleE'];
					

					echo  ('\n');
                    echo  ('\n');

                    echo 'Plat';
                    echo  ('\n');
                    echo $row['libelleP'];


					echo  ('\n');
                    echo  ('\n');

                    echo 'Dessert';
                    echo  ('\n');
                    echo $row['libelleD'];


                    echo  ('\n');
                    echo  ('\n');
                    echo  ('\n');

                    echo $row['autres'] . '<br>';


                    echo  ('\n');
                    echo  ('\n');

                    echo " Se d&#233;sinscrire : cirill@asheart.fr";
                }
            } catch (Exception $ex) {
                die('Erreur : '.$ex->getMessage());
            }
		}
	}
?>
