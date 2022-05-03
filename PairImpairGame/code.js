/*----------------------------PairImpair le jeu-----------------------------------------------*/

MesNoix = 10; /*ma quantité de noix au début*/
/* pour afficher la nouvel valeur a chaque fois que je change la barre de valeur du pari*/
function afficheValeur(nouvelleValeur) {
document.getElementById("affichePari").innerHTML = nouvelleValeur;
}

function NbNoixAleatoire() {
var mainJ1 = Math.floor(Math.random() * 5) + 1;
var mainJ2 = Math.floor(Math.random() * 5) + 1;
document.getElementById("noix").innerHTML = mainJ1 +"  et (joueur2) : "+ mainJ2;
return (mainJ1 + mainJ2);
}
function GagnerOuPerdre() {
var nombre = NbNoixAleatoire() % 2;
ss = (nombre == 1) ? "Impair" : "Pair"; /* verification si var nombre est pair ou impair */ 
document.getElementById("PairOuImpair").innerHTML = ss;

if (MesNoix > 0) {
var LePari = parseInt(document.getElementById("FaireUnPari").value);
if (choixPairOuImpair == nombre){
document.getElementById("msg").innerHTML = "Vous avez deviné correctement, vous récupérer le pari misé!"
MesNoix += LePari;
}
else{
    document.getElementById("msg").innerHTML = "désolé! Vous avez perdu, vous perdez le pari misé!"
    MesNoix -= LePari;
}
document.getElementById("Noix").innerHTML = MesNoix;
}
else
alert("Vous n'avez plus de noix à miser!" )

}
/*----------------------------PairImpair le jeu-----------------------------------------------*/

/*----------------------------les controles de saisie-----------------------------------------*/

function veriftel() {
	exp2=/[^0-9]/;
	document.getElementById('nombre').value = document.getElementById('nombre').value.replace(exp2,'');
}
function zonetel() {
	let test = true;
	if ( document.getElementById('nombre').value.length != 8 ) test = false;

	if (test == false) alert('Tel : uniquement 8 chiffres');
}


/*----------------------------les controles de saisie-----------------------------------------*/