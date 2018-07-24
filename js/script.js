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

