<!DOCTYPE html>
<html>
    <head> 
    
        <?php
            include ("css/header.php");
        ?>
        
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
    </div>
</div>
            
            
            
    <script type="text/javascript">
        var DateNow = new Date(Date.now());
        Req(DateNow.getUTCFullYear() + '-0' + DateNow.getUTCMonth()+ '-' + DateNow.getDay());
        console.log(DateNow.getUTCFullYear() + '-' + DateNow.getUTCMonth().parse()+ 1 + '-' + DateNow.getDay());
    </script>       
            
            
    <div id="pop"></div>
           
    </body>
    
</html>
