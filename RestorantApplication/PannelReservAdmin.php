<!DOCTYPE html>
<html>
    <head> 
        <?php
            include 'css/header.php';

        // ----------------------------------------------------------------
        //  page sécurisée : on vérifie qu'une sesion admin soit présente -
        // ----------------------------------------------------------------

        if ( isset($_SESSION['user']) && ($_SESSION['user']== 'AdminReserv')) {
            // On affiche alors le panel d'admin, soit tout le code ci-dessous
         ?>

            <script type="text/javascript">
                var DateNow = new Date(Date.now());
                Req(DateNow);      
                    
                function ReqCli(){
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "AfficheClient.php");
                    xhr.onreadystatechange = function(){
                        if (xhr.readyState == 4 && xhr.status == 200){
                            document.getElementById('List').innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send();
                }
                
                function Req(val){
                    var xhr = new XMLHttpRequest();
                                    
                    xhr.open("GET", "afficheEtat.php?date="+ val);
                    xhr.onreadystatechange = function(){
                        if (xhr.readyState == 4 && xhr.status == 200){
                            document.getElementById('List').innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send();
                }
            </script>
    </head>

<body>
    <div class="container" id="main">
        <div class="row">
                
            <?php include'css/nav.php' ?>


            <!-- MAIN BODY -->
                
            <div class="col-9" style="padding: 0em" id="background">
                <div class="container" style="padding: 0em">
                    <div class="row" style="padding: 0em">
                        <div class="col-12">
                            <div id="ResMenu">
		                  
                                <article id="center">      
                                    <h1>Panel de Gestion des Réservations</h1>

                                    <p style="margin-top:  2em;">    

                                        <a href="FormReserv2.php">
                                            <button class="button btn btn-bg" style="margin-bottom: 15px; "> Nouvelle réservation </button>
                                        </a><br/>

                                        <a href="FormReserv.php">
                                            <button class="button btn btn-bg" style="margin-bottom: 15px; "> Réservation d'un nouveau client </button>
                                        </a><br/>


                                        <button class="button btn btn-bg" style="margin-bottom: 15px;"  onclick="ReqCli();"> Voir les clients </button><br/>


                                        <a href="SendMail.php">
                                            <button class="button btn btn-bg" style="margin-bottom: 15px; "> Envoie des menus par mail </button>
                                        </a><br/>
                                    </p>
                            
                                    <center id="calendrier" >
                                        <p>Rechercher une date</p>
                                        <input id="rechercherCalendrier" type="date" class="btn" value="<?php echo(date('Y-m-d'))?>" onchange="Req(this.value)" style="margin-bottom: 1em; min-width: 30%;"><br>
                                        
                                    </center>
                                </article>

                                <div style="background: rgba(75, 75, 75, 0.5); margin: 3em 0em 1em 0em; padding: 5em;  border: solid #63636387 1px;">
                                    <div id="List"    ></div>
                                    <div id="ResMenu" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php
                    include_once('css/footer.php');
                ?>
            </div>
        </div>
    </div>
</body>

<?php
if(isset($_GET['msgS'])){
    if ($_GET['msgS'] == 'Rs') {
        echo '<script>alert("Réservation OK");</script>';
    }if ($_GET['msgS'] == 'Mc') {
        echo '<script>alert("Modification OK");</script>';
    }if ($_GET['msgS'] == 'Sc') {
        echo '<script>alert("Suppression OK");</script>';
    }if ($_GET['msgS'] == 'EM') {
        echo '<script>alert("Envoie OK");</script>';
    }
}
?>

</html>
<?php

}else {
    // sinon : la variable session user n'est pas défini ou différente de 'admin'
    header('location:index.php');
}
?>