<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'css/header.php';
        if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
        ?> 
        <script type="text/javascript">
            function Req(val){
                var xhr = new XMLHttpRequest();
                                
                xhr.open("GET", "afficheMenu.php?date="+ val);
                xhr.onreadystatechange = function(){
                    if (xhr.readyState == 4 && xhr.status == 200){
                        document.getElementById('ListMenu').innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            }
        </script>
        
    </head>
    <body>
        
        <a class="button-pannel" href="PannelReservAdmin.php"> Revenir en arrière </a> 

        <form method="post" name="formulaire"  action="Reserv.php"> 
            <label for='Nom'> Nom :      </label>
            <input type="text" name="Nom" required />
            <br/>
            
            <label for='Dat'> Date :</label>
            <input type="date" name="Dat" required onblur="Req(this.value);" />
            <br/>

            <label for='nbPers'> Nombre de personnes :</label>
            <input type="text" name="nbPers" required />
            <br/>

            <label for='Tel'> Téléphone :      </label>
            <input type="text" name="Tel" id="Tel" required />
            <br/>
            
            <label for='Mail'> Adresse mail :      </label>
            <input type="text" name="Mail" id="Mail" />
            <br/>
            
            <input type="radio" name ="Presence" value="Confirmé" id="1" checked/> <label for="Confirmé"> Présence sûre </label>
            <br/>
            <input type="radio" name ="Presence" value="Aconfirmé" id="0"/> <label for="Aconfirmé"> Á confirmer </label>
            <br/>    
            
            <br/>
             <div id="ListMenu"></div>
        </form>
        
       
        
        <?php
            include_once('css/footer.php');
        ?> 
        
    </body>
</html>
<?php
        }else{
            header('location:index.php');
        }
?>