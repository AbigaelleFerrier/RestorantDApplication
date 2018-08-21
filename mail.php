<?php 
    if ( isset($_SESSION['user']) && ($_SESSION['user']=='AdminReserv')) {
?>

<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>Template mailing Alsacreations</title>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <style type="text/css">
    /* Fonts and Content */
    #mailPeytavin body, td { font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif; font-size:14px; }
    #mailPeytavin body { /* BG */ background-image: linear-gradient(to top, #d5d4d0 0%, #d5d4d0 1%, #eeeeec 31%, #efeeec 75%, #e9e9e7 100%); margin: 0; padding: 0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; }
    mailPeytavin h2{ padding-top:12px; /* ne fonctionnera pas sous Outlook 2007+ */color:#0E7693; font-size:22px; } 
    #logo h1,h3 {
        text-align: center;
        font-family: 'Abel', sans-serif;
    }    
    #logo h1 {
        font-size: 250%; 
    }
    #logo h3 {
        font-size: 1.5em;
    }
    #mailPeytavin a {
        color: #fff !important;
    }

     #menu h3::before { 
        letter-spacing: -3px;
        margin-right: 15px;
        content: "-----";
    }

    #menu h3::after {
        letter-spacing: -3px;
        margin-left: 15px;
        content: "-----";
    }

    @media only screen and (max-width: 480px) { 

        table[class=w275], td[class=w275], img[class=w275] { width:135px !important; }
        table[class=w30], td[class=w30], img[class=w30] { width:10px !important; }  
        table[class=w580], td[class=w580], img[class=w580] { width:280px !important; }
        table[class=w640], td[class=w640], img[class=w640] { width:300px !important; }
        img{ height:auto;}
        table[class=w180], td[class=w180], img[class=w180] { 
            width:280px !important; 
            display:block;
        }    
        td[class=w20]{ display:none; }    
    } 

</style>

</head>
<body style="margin:0px; padding:0px; -webkit-text-size-adjust:none;" id="mailPeytavin">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:rgb(42, 55, 78)">
        <tbody>
            <tr style="/* BG */ background-image: linear-gradient(to top, #d5d4d0 0%, #d5d4d0 1%, #eeeeec 31%, #efeeec 75%, #e9e9e7 100%);">
                <td align="center" bgcolor="#d4d4d4">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>                            
                            <tr>
                                <td class="w640" width="1080" height="50"></td>
                            </tr>
                            
                            <!-- entete -->
                            <tr class="pagetoplogo">
                                <td class="w640" width="1080">
                                    <table class="w640" width="1080" cellpadding="0" cellspacing="0" border="0" bgcolor="#F2F0F0">
                                        <tbody>
                                            <tr>
                                                
                                                <td class="w580" width="1000" valign="middle" align="left" style="background-image: url('https://images.unsplash.com/photo-1516930828473-2d3b2a2e36fe?ixlib=rb-0.3.5&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;s=aa872492a9f3ffa83f1787f629338495&amp;auto=format&amp;fit=crop&amp;w=2134&amp;q=80'); background-position: center; background-repeat: no-repeat; background-size: cover;  ">
                                                    <div id="logo" class="pagetoplogo-content" style="background: rgba(64, 150, 238, 0.68); padding : 20px">
                                                        <h1 style="text-align: center; color: #fff; text-align: center; font-family: 'Abel', sans-serif;">Restaurant d'Application</h1>
                                                        <h2 style="text-align: center; color: #fff; text-align: center; font-family: 'Abel', sans-serif;">Lyc&#233;e Emile Peytavin</h2>                        
                                                    </div>
                                                </td> 
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <!-- separateur horizontal -->
                            <tr>
                                <td class="w640" width="1080" height="1" bgcolor="#d7d6d6"></td>
                            </tr>

                            <!-- contenu -->
                            <tr class="content" style="color: #000 !important">
                                <td class="w640" width="1080" bgcolor="#ffffff" >
                                    <table class="w640" width="1080" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td class="w30" width="30"></td>
                                                <td class="w580" width="1000">
                                                    <!-- une zone de contenu -->
                                                    <table class="w580" width="1000" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class="w580" width="1000">
                                                                    
                                                                </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="w580" width="1080" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                            
                                            <tr>
                                                <td class="w275" width="1000" valign="top" style="padding: 50px">
                                                    <?php echo "<p>" . $_SESSION['Post-Mail']['mce_0'] . "</p>" ; ?>
                                                </td>
                                            </tr>

                                            <?php if (isset($_SESSION['Post-Mail']['dateChoixMail'])) { 
                                                try{
                                                                include('coBD.php');
                                                                $date = $_SESSION['Post-Mail']['dateChoixMail'];
{

                                                                $req = "SELECT * FROM menu where dateM=?";
                                                                $traitement = $connect ->prepare($req);
                                                                $traitement -> bindParam(1, $date);
                                                                $traitement -> execute();

                                                                if($row = $traitement->fetch())                                             ?>
                                               
                                                <tr>
                                                    <td class="w275" width="1000" valign="top" style="padding: 50px; color: #000; text-align: center;" id="menu">



                                                                <?php
                                                                    echo '<div>';
                                                                        echo '<h3>';
                                                                            echo $row['Titre'];
                                                                            echo " ";
                                                                            echo $row['dateM'];
                                                                        echo '</h3>';

                                                                        echo '<p>';
                                                                            if ($row['MidiSoir'] == 0){
                                                                                    echo 'Le soir';
                                                                            }else{
                                                                                   echo'Le midi';
                                                                            }
                                                                        echo '</p>';
                                                                    echo '</div>';

                                                                    // ENTREE //   
                                                                    echo '<div>';
                                                                        echo '<h4>Entree</h4>';         
                                                                      
                                                                        echo '<p>';
                                                                            echo $row['libelleE'] . '<br>';
                                                                        echo '</p>';
                                                                    echo '</div>';
                                                                    ////////////
                                                                    
                                                                    // PLAT //
                                                                    echo '<div>';
                                                                        echo '<h4>Plat</h4>';         
                                                                    
                                                                        echo '<p>';
                                                                            echo $row['libelleP'] . '<br>';
                                                                               if ($row['Fromage'] == 0){
                                                                                    echo '<br>Plateau de frommages';
                                                                               }else{
                                                                                   echo'<br>Assiette de fromages';
                                                                               }
                                                                        echo '</p>';   
                                                                    echo '</div>';
                                                                    ////////////

                                                                    // DESSERT //
                                                                    echo '<div>';
                                                                        echo '<h4>Dessert</h4>';         
                                                                            echo '<p>';
                                                                                   echo $row['libelleD'] . '<br>';
                                                                            echo '</p>';    
                                                                    echo '</div>';
                                                                    /////////////

                                                                    // AUTRES //
                                                                    if ($row['autres'] != "") {
                                                                        echo '<div>';         
                                                                            echo '<p>';
                                                                                echo $row['autres'] . '<br>';
                                                                            echo '</p>';
                                                                        echo '</div>';
                                                                    }
                                                                    ////////////
                                                                }

                                                            } catch (Exception $ex) {
                                                                die('Erreur : '.$ex->getMessage());
                                                            }

                                                        ?>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                            <!-- pied de page -->
                                            <tr>
                                                <td class="w640" width="1080" height="60" style="padding: 20px 50px;color: #fff !important;background: #0056b3;text-align:  center;align-content: center;">
                                                    <?php include'css/footer.php' ?>
                                                    <p>
                                                        Se d&#233;sinscrire : <a href="mailto:cirill@asheart.fr?subject=EmilePeytavin_-_Me_desinscrire">cirill@asheart.fr</a>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                
                                <td class="w30" width="30"></td>
                                    </tr>
                                </tbody>
                                <tr>
                                <td class="w640" width="1080" height="50"></td>
                                </tr>
                            </table>
                            
                                <p style="margin-bottom: 25px; color: #aaa" >Cr&#233;ation : <a style="color: #aaa" href="www.asheart.fr">Asheart Communication</a></p>
                            
                            
                           

                        </td>


                    </tr>

                    <!--  separateur horizontal de 15px de haut -->
                    <tr>
                        

                    </tr>

                    

                </tbody>
            </table>
        
    



</body></html>

<?php 
    }
?>