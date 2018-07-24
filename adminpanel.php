<?php
    include 'css/header.php';

// ----------------------------------------------------------------
//  page sécurisée : on vérifie qu'une sesion admin soit présente -
// ----------------------------------------------------------------

if ( isset($_SESSION['user']) && ($_SESSION['user']== 'AdminMenu')) {
    // On affiche alors le panel d'admin, soit tout le code ci-dessous
 ?>
        <script type="text/javascript">
            function Req(val){
                var xhr = new XMLHttpRequest();
                
                console.log(val);
                
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
        <div id="wrapper"> 
          <div id="bg"> 
            <div id="header"></div>         
            <div id="page"> 
              <div id="container"> 

              <!-- bannière -->  
                <div id="banner"></div>  
              <!-- fin bannière -->  

              <!--  partie principale -->  
                <section>

                  <!-- contenu principale de la page -->
                  <article id="center">				
                    <h1>Pannel de Gestion des Menus</h1>
                    <p style="margin-top:  15px;">    
                        
                        <table>
                                <tr>
                                    <td>
                                        <?php
                                        include 'coBD.php';
                                            $req = "SELECT dateM, idM from menu order by dateM";

                                            $traitement = $connect ->prepare($req); 
                                            $traitement -> execute();     

                                            while($row = $traitement->fetch()) {
                                                echo '<a onclick="Req(\''.$row['dateM'].'\');"><li>'. $row['dateM'] .'</li></a>';
                                        ?><br/>
                                        <a class="button-pannel" href="FormAdModifMenu.php?id=<?php echo $row['idM']?>"> Modifier </a> 
                                        <a class="button-pannel" href="SuppressionMenu.php?id=<?php echo $row['idM']?>"> Supprimer </a><br/><br/>
                                        <div id="ListMenu"> </div> <br><br>
                                    </td>
                                    <hr><?php } ?>
                                </tr>
                            </table>
                            <hr>
                            <a href="FormAdAjoutMenu.php"><button class="button" style="margin-bottom: 15px; "> Ajouter un menu </button></a><br/>
                        </div>
                    
                
                    </div>
                    <p style="clear:both" />
                  </article>
                  <div style="clear:both;height:40px"></div>
                <!-- fin du contenu principale -->

                </section>  
              <!-- fin partie principale --> 

              </div>  
            </div>  

            <!-- pied de page -->
            <div id="footerWrapper"> 
                <?php
                    include_once('css/footer.php');
                ?>
            </div> 
            <!-- fin pied de page -->

          </div> 
        </div> 
      </body>
      
      <?php
        if(isset($_GET['msgS'])){
            if ($_GET['msgS'] == 'MMenu') {
                echo '<script>alert("Modification OK");</script>';
            }if ($_GET['msgS'] == 'AMenu'){
                echo '<script>alert("Ajout OK");</script>';
            }if ($_GET['msgS'] == 'SMenu'){
                echo '<script>alert("Suppression OK");</script>';
            }if ($_GET['msgS'] == 'AnulMenu'){
                echo '<script>alert("Annulation OK");</script>';
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