<?php
    include ("css/header.php");
?>
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
        			<h1 style="margin-bottom: 1em;">Accéder au panel d'administration</h1>
        			
                    <form action="verifAdmin.php" method="post">
                        <fieldset>
                            <input type="text" name="Nom" required autofocus maxlength="32" placeholder="Nom" class="btn"/><br/>
                            <input type="password" name="pwd" maxlength="32" required placeholder="Mot de passe" class="btn" style="margin-bottom: 2em;" /><br/>
                            
                            <input type="submit" value="S'identifier" class="btn btn-bg"/>
                        </fieldset>						
                    </form>
            </article>
              <div style="clear:both;height:40px"></div>
            <!-- fin du contenu principale -->
                
        </section>  
        <!-- fin partie principale --> 
          
        </div>  
        </div>  
      </div> 
    </div>
      <?php
        include ("css/footer.php");
    ?>
  </body>
  
</html>
