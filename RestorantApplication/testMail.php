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

<?php
	$_SESSION['Post-Mail'] = $_POST;	
?>





<body>
    <div class="container" id="main">
        <div class="row">
                
            <?php include'css/nav.php' ?>


            <!-- MAIN BODY -->
                
            <div class="col-9" style="padding: 0em" id="background">
                <div class="container" style="padding: 0em">
                    <div class="row" style="padding: 0em">
                        <div class="col-12" style="text-align: center; padding: 1em; background: rgba(0,0,0,0.7);">

                        	<h1>Visioner le mail</h1>
                        	<hr>
                        	<center>
                            	<div id="mailSimulation" >
                            		<?php include'mail.php' ?>
                            	</div>

                            	<hr>
                            	
                            	<div class="col-12" style="margin-top: 3em;" id="verifPopMail">
                            		<button class="btn btn-bg" onclick="popMailverif()">Envoyer</button>
                            	</div>
                            	<div class="col-12">
                            		<a href="SendMail.php"><button class="btn btn-bg btn-margin">Annuler</button>
                            	</div>
                            	
                            	

                        	</center>
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
	