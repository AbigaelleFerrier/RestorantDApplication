<!DOCTYPE html>
<html>
    <head> 
        <?php
            include 'css/header.php';

if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
    // On affiche alors le panel d'admin, soit tout le code ci-dessous
    
    ?>    

        <script type="text/javascript">
           
            function ReqMailChoix(val){
                var xhr = new XMLHttpRequest();
                                
                xhr.open("GET", "FormEnvoieMail2.php?date="+ val);
                xhr.onreadystatechange = function(){
                    if (xhr.readyState == 4 && xhr.status == 200){
                        document.getElementById('List2').innerHTML = xhr.responseText;
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
                            <div>
                                <article id="center">

                                    <h1>Gestionaire d'envoie de mail :</h1>

                                    <form method="post" name="mail" action="testMail.php">
                                        <div class="row" style="padding: 2em 1em; margin: 0em" >

                                            <div class="col-9" style="margin-bottom: 2em;">
                                                <!-- EDITEUR VISUEL -->
                                                <wysiwyg>
                                                    <h1>Un Titre</h1>
                                                    <p>Du Texte en vrac</p>
                                                </wysiwyg>
                                            </div>
                                            <div class="col-3">
                                                <div class="col-12">
                                                    <a class="btn btn-bg btn-sendMail" id="DC1" style="margin-bottom: 15px;" onclick="displayClient(false)"><span style="font-weight: 900; color: #5bc30d;"><i class="fas fa-check-circle"></i></span> Envoyer à tous les clients</a><br>
                                                    <a class="btn btn-bg btn-sendMail" id="DC2" style="margin-bottom: 15px;" onclick="displayClient(true)">Envoyer à un ou plusieur clients</a>
                                                </div>

                                                <div class="col-12">
                                                    <a class="btn btn-bg btn-sendMail" id="DM1" style="margin-bottom: 15px;" onclick="displayMenu(false)"><span style="font-weight: 900; color: #5bc30d;"><i class="fas fa-check-circle"></i></span> Tous les menus</a><br>
                                                    <a class="btn btn-bg btn-sendMail" id="DM2" style="margin-bottom: 15px;" onclick="displayMenu(true)">Un menu en particulier</a>
                                                </div>
                                            </div>

                                            <div class="col-9" id="List2"></div>
                                            <div class="col-3">
                                                <div id="fichier"><input type="file" id="cheminFile" class="btn btn-bg btn-margin" style="width: 90%" required></div>
                                                <div id="menuDisplay"></div>
                                            </div>
                                            <hr>
                                            <div class="col-9" id="clientList"></div>
                                            

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-bg btn-margin">Envoyer</button>
                                            </div>
                                            

                                            
                                        </div>
                                    </form>
                                    
                                </article>
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
</html>
 <?php

}else {
    // sinon : la variable session user n'est pas défini ou différente de 'admin'
    header('location:index.php');
}
?>