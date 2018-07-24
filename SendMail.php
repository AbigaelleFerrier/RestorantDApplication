<!DOCTYPE html>
<html>
    <head> 
        <?php
            include 'css/header.php';

if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
    // On affiche alors le panel d'admin, soit tout le code ci-dessous
    
    ?>    

        <script type="text/javascript">
            function Req(val){
                var xhr = new XMLHttpRequest();
                                
                xhr.open("GET", "FormEnvoieMail.php?num="+ val);
                xhr.onreadystatechange = function(){
                    if (xhr.readyState == 4 && xhr.status == 200){
                        document.getElementById('List').innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            }
            function Req2(val){
                var xhr = new XMLHttpRequest();
                                
                xhr.open("GET", "FormEnvoieMail2.php?num="+ val);
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
                            <div id="ResMenu">
                                <article id="center">
                                    <wysiwyg onkeyup="var sortie = document.getElementById('sortie'); var form = document.getElementById('tinymce'); sortie.innerHTML = form.innerHTML;"></wysiwyg>
                                </article>

                                <div style="background: rgba(75, 75, 75, 0.5); margin: 3em 0em 1em 0em; padding: 5em;  border: solid #63636387 1px;" id="sortie">
                                </div>
                                <!--
                                    <article id="center"> 
                                        <a class="button-pannel" href="PannelReservAdmin.php"> Revenir en arrière </a> 
                                        
                                        <form method="post" name="formulaire" action="envoieMail.php">
                                            
                                                <input type="checkbox" name ="destinateut"  value="1" id="1" onclick="Req(this.value);"/> <label for="Tous">Envoyer à tous les clients</label>
                                                <br/>
                                                <input type="checkbox" name ="destinateur"  value="0" id="0" onclick="Req(this.value);"/> <label for="Seul">Envoyer à un seul client</label>
                                                <br/> 
                                                
                                                <input type="checkbox" name ="nbMenu"       value="1" id="1" onclick="Req2(this.value);"/> <label for="Tous">Tous les menus</label>
                                                <br/>
                                                <input type="checkbox" name ="nbMenu"       value="0" id="0" onclick="Req2(this.value);"/> <label for="Seul">Un menu en particulier</label>
                                                <br/> 
                                            
                                                <div id="List" ></div>
                                                <div id="List2"></div>-->
                                                
                                            <!-- 
                                                <label for='Dat'> Envoyer le menu du :      </label>
                                                <input type="text" name="Dat" required /> <br/>
                                            
                                                

                                            <input type="submit" value="Valider"/> <br/>
                                        </form>
                                    </article>
                                -->
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