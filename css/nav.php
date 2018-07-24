            <!-- NAV -->
                <div class="nav col-3" id="nav">
                    <div class="container">
                        <div id="logo" class="row">
                            <div class="col-12">
                                <h1> Restaurant d'Application</h1>
                                <h3>Lycée Emile Peytavin</h3>
                                <hr>
                            </div>
                        </div>
                        <div id="menuMob">
                            <a onclick="pop()">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>

                        
                        
                        <div>
                            <center id="calendrier" >
                                <h4>Rechercher une date</h4>
                                
                                <input type="date" name="date" class="btn" onchange="Req(this.value)" value="<?php echo(date('Y-m-d'))?>">
                                
                                <script type="text/javascript">
                                    Req(<?php echo(date('Y-m-d'))?>);
                                </script>    

                            </center>
                            <h5 style="margin-top: 3em">Les 5 prochaines dates : </h5>
                            <ul id="dat">
                                
                                <?php include 'cinqDernierJour.php'?>
                            </ul>



                        </div>
                    </div>
                </div>

                <!-- POP -->

                <script type="text/javascript">           
                    var popMob = true;

                    function pop() {
                        if (popMob) {
                            document.getElementById('nav').style.position = "fixed";

                            document.getElementById('pop').innerHTML = '<div id="popDiv"><center id="calendrier" ><h4>Rechercher une date</h4><input type="date" name="date" onchange="Req(this.value)" value="<?php echo(date('Y-m-d'))?>">'
                                + '</center><h5 style="margin-top: 3em">Les 5 prochaines dates : </h5><ul id="dat">'
                                + '<?php include 'cinqDernierJour.php'?>'
                                +'</ul></div>';
                            popMob = false;
                        }
                        else {
                            document.getElementById('nav').style.position = "initial"
                            document.getElementById('pop').innerHTML = '';
                            popMob = true;
                        }
                    }
                </script>