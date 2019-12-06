


function  acheter(idprod) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("demo").innerHTML = this.responseText;
            if(this.responseText == "200"){
                notie.alert({
                    type: 5, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
                    text: "ajouté dans le panier",
                    stay: false, // optional, default = false
                    time: 2, // optional, default = 3, minimum = 1,
                    position: 'top' // optional, default = 'top', enum: ['top', 'bottom']
                });
                requestcaddy();
            }
            else {
                //error
                notie.alert({
                    type: 3, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
                    text: "Probleme dans l'ajout",
                    stay: false, // optional, default = false
                    time: 2, // optional, default = 3, minimum = 1,
                    position: 'top' // optional, default = 'top', enum: ['top', 'bottom']
                });
            }
        }
    };
    xhttp.open("GET", "../metier/commandeutilisateur.php?idprod="+idprod, false);
    xhttp.send();

}

function requestcaddy() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('panier').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../metier/panierutilisateur.php", true);
    xhttp.send();
}

function validerachat() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == "200") {
                    notie.alert({
                        type: 5, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
                        text: "Votre panier a été validé",
                        stay: false, // optional, default = false
                        time: 2, // optional, default = 3, minimum = 1,
                        position: 'top' // optional, default = 'top', enum: ['top', 'bottom']
                    });
                    requestcaddy();
                } else {
                    //error
                    notie.alert({
                        type: 3, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
                        text: "Désolé probléme de connexion",
                        stay: false, // optional, default = false
                        time: 2, // optional, default = 3, minimum = 1,
                        position: 'top' // optional, default = 'top', enum: ['top', 'bottom']
                    });
                }
            }
        }
    }
        ;
        xhttp.open("GET", "../metier/validerachats.php", true);
        xhttp.send();

}

function deletecmd(idcmd) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == "200"){
                notie.alert({
                    type: 5, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
                    text: "Supprimé du panier",
                    stay: false, // optional, default = false
                    time: 2, // optional, default = 3, minimum = 1,
                    position: 'top' // optional, default = 'top', enum: ['top', 'bottom']
                });
                requestcaddy();
            }
            else {
                //error
                notie.alert({
                    type: 3, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
                    text: "Désolé probléme de connexion",
                    stay: false, // optional, default = false
                    time: 2, // optional, default = 3, minimum = 1,
                    position: 'top' // optional, default = 'top', enum: ['top', 'bottom']
                });
            }
        }
    };
    xhttp.open("GET", "../metier/supprimerdupanierutilisateur.php?idcmd="+idcmd, true);
    xhttp.send();



}
function requestcom() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('panier').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../datamanager/commandeutilisateur.php", true);
    xhttp.send();
}
function deletecom(idcmd) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "200") {
                notie.alert({
                    type: 5, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
                    text: "Supprimé du panier",
                    stay: false, // optional, default = false
                    time: 2, // optional, default = 3, minimum = 1,
                    position: 'top' // optional, default = 'top', enum: ['top', 'bottom']
                });
                requestcom();
            } else {
                //error
                notie.alert({
                    type: 3, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
                    text: "Désolé probléme de connexion",
                    stay: false, // optional, default = false
                    time: 2, // optional, default = 3, minimum = 1,
                    position: 'top' // optional, default = 'top', enum: ['top', 'bottom']
                });
            }
        }
    };
    xhttp.open("GET", "../metier/supprimerdupanierutilisateur.php?idcmd=" + idcmd, true);
    xhttp.send();
}
function requestit() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('panier').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../datamanager/gestiondecommandes.php", true);
    xhttp.send();
}
function solder(idcmd) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == "200") {
                notie.alert({
                    type: 5, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
                    text: "Supprimé du panier",
                    stay: false, // optional, default = false
                    time: 2, // optional, default = 3, minimum = 1,
                    position: 'top' // optional, default = 'top', enum: ['top', 'bottom']
                });
                requestit();
            } else {
                //error
                notie.alert({
                    type: 3, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
                    text: "Désolé probléme de connexion",
                    stay: false, // optional, default = false
                    time: 2, // optional, default = 3, minimum = 1,
                    position: 'top' // optional, default = 'top', enum: ['top', 'bottom']
                });
            }
        }
    };
    xhttp.open("GET", "../metier/mettreajourstock.php?idcmd=" + idcmd, true);
    xhttp.send();
}

