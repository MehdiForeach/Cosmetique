function loadPage( nomFichier ) 
{
  const xhttp = new XMLHttpRequest();

  xhttp.onload = function () {
    document.getElementById("contenu").innerHTML = this.responseText;
  }

  xhttp.open("GET", nomFichier );
  xhttp.send();
}

function refresh() {
  location.reload();
}

document.addEventListener("DOMContentLoaded", function(event) {
  document.getElementById("btOK").disabled = true;
});

var mail = false;
var mess = false;

function cyclVerif() {

  setTimeout(cyclVerif, 500);

  if (mail && mess)
    document.getElementById("btOK").disabled = false;
  else document.getElementById("btOK").disabled = true;
}

cyclVerif();

function verifMail() {

  let saisie = document.getElementById("mail").value;
  let msg = document.getElementById('message').value;
  
  effaceMessage();

  let mailAro = saisie.split('@');
  let mailPoint = saisie.split('.');

  if (mailAro.length != 2 || mailPoint.length != 2 || mailAro[0] == "" || mailPoint[0] == "" || mailAro[1] == "" || mailPoint[1] == "") {
    message("Adresse mail incorrect");
    mail = false;
  }
  else mail = true;

  if (msg == "") {
    message("Le champ message est vide");
    mess = false;
  }
  else mess = true;

}

function effaceMessage() {
  document.getElementById("erreur").innerHTML = "";
  document.getElementById("erreur").style.backgroundColor = "";
}

function message(mes) {
  document.getElementById("erreur").innerHTML += mes+"<br>";
  document.getElementById("erreur").style.backgroundColor = "#e61616";
}