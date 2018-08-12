
 function Req(val){
    var xhr = new XMLHttpRequest(); 
    xhr.open("GET", "afficheMenu.php?date="+ val);
    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200){
            document.getElementById('ResMenu').innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}


var ligne = 0;

function SupLigne(Ligne) {
    if (ligne != 1){
        Ligne.remove();
        ligne--;
    }else{
        alert("Interdit");
    }
}

//Ajoute une ligne au formulaire
function  AjtLigneE(){
    var refTable = document.getElementById("AdE");
    var ligneT = refTable.insertRow(-1);    
    ligneT.innerHTML = '<input type="text" name="Entree" value=""/><input type="button" name="sup" value="X" onclick="SupLigne(this.parentNode);"> <br/>';
}

function  AjtLigneP(){
    var refTable = document.getElementById("AdP");
    var ligneT = refTable.insertRow(-1);    
    ligneT.innerHTML = '<input type="text" name="Plat" value=""/><input type="button" name="sup" value="X" onclick="SupLigne(this.parentNode);"> <br/>';
}

function  AjtLigneD(){
    var refTable = document.getElementById("AdD");
    var ligneT = refTable.insertRow(-1);    
    ligneT.innerHTML = '<input type="text" name="Dessert" value=""/><input type="button" name="sup" value="X" onclick="SupLigne(this.parentNode);"> <br/>';
}


//onblur="ChangeFormat(this.value);"
function ChangeFormat(Dated){
    console.log(Dated);
    var jour = Dated.substr(8);
    console.log(jour);
    var mois = Dated.substr(4, 6);
    console.log(mois);
    var annee = Dated.substr(-1,2);
    console.log(annee);
    var data = document.getElementById("Dat");
    data.value = annee+"-"+mois+"-"+jour;
}

function mailSelectClient(value) {
    var doc     = document.getElementById('div' + value);
    var input   = document.getElementById('input'+ value);

    if (!input.checked) {
        doc.classList.add(      "mailSelectClientOn");
        doc.classList.remove(   "mailSelectClientOff");
        input.checked = true;
        
    }
    else {
         doc.classList.add(     "mailSelectClientOff");
         doc.classList.remove(  "mailSelectClientOn");
        input.checked = false;
    }
}

function displayClient(value) {
    if (value) {
        document.getElementById('DC1').innerHTML = 'Envoyer à tous les clients';
        document.getElementById('DC2').innerHTML = '<span style="font-weight: 900; color: #5bc30d;"><i class="fas fa-check-circle"></i></span> Envoyer à un ou plusieur clients';


        var xhr = new XMLHttpRequest();
        xhr.open("GET", "AfficheClientMail.php");
        xhr.onreadystatechange = function(){
            if (xhr.readyState == 4 && xhr.status == 200){
                document.getElementById('clientList').innerHTML = xhr.responseText;
            }
        };
        xhr.send();

    }
    else {
        document.getElementById('DC1').innerHTML = '<span style="font-weight: 900; color: #5bc30d;"><i class="fas fa-check-circle"></i></span> Envoyer à tous les clients';
        document.getElementById('DC2').innerHTML = 'Envoyer à un ou plusieur clients';

        document.getElementById('clientList').innerHTML = "";
       
    }
}

function displayMenu(value) {
    if (value) {
        document.getElementById('DM1').innerHTML = 'Tous les menus';
        document.getElementById('DM2').innerHTML = '<span style="font-weight: 900; color: #5bc30d;"><i class="fas fa-check-circle"></i></span> Un menu en particulier';


        document.getElementById('fichier').innerHTML     = "";
        document.getElementById('menuDisplay').innerHTML = '<input required id="rechercherCalendrier" type="date" name="dateChoixMail" class="btn btn-sendMail" value="" onchange="ReqMailChoix(this.value)" style="margin-bottom: 1em; min-width: 30%;">';
    }
    else {
        document.getElementById('DM1').innerHTML = '<span style="font-weight: 900; color: #5bc30d;"><i class="fas fa-check-circle"></i></span> Tous les menus';
        document.getElementById('DM2').innerHTML = 'Un menu en particulier';

        document.getElementById('menuDisplay').innerHTML = "";
        document.getElementById('List2').innerHTML       = "";
        document.getElementById('fichier').innerHTML     = '<input type="file" id="cheminFile" class="btn btn-bg btn-margin" style="width: 90%" required>';
    }

}

function popMailverif() {
    document.getElementById('verifPopMail').innerHTML = '<h2 style="color:#fff;"> Vous êtes sûr ?</h2>'
    +' <div class="col-12"><a href="envoieMail.php"><button class="btn btn-bg" style="margin-bottom:0.5em">Oui</button></a></div>'
    +' <div class="col-12"><a href="SendMail.php"><button class="btn btn-bg" style="margin-bottom:3em">Non</button></a></div>';
}
