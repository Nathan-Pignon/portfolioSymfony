
function nb_aleatoire(min, max)
{
     var nb = min + (max-min+1)*Math.random();
     return Math.floor(nb);
}

if (onClick == true) {
	jeu()
}
function jeu() {

var saisie = prompt("Pour combien");
var nbr = Number(prompt(`Pour combien ${saisie} ?`));
var defi = nb_aleatoire(1, nbr);
 var resultat = Number(prompt(`Paris sur un nombre entre 1 et ${nbr} compris`));
if (resultat == defi) {
	alert("Perdu ! tu dois realiser le défi");
} else {
alert(`T'as eu de la chance pour cette fois, le chiffre etait ${defi}`);
}
}

function jeu3(){
	var manche = 0;
var resultat = 100;
function jeu2() {

var cpt1 = 1;
var saisie = Number(prompt("Choisis le nombre maximum"));
var r1 = Number(prompt(`Devinez un nombre entre 1 et ${saisie}`));
var nb1 = nb_aleatoire(1, saisie);
while (r1 != nb1) {

if (r1 > nb1) {
	r1 = Number(prompt("C'est moins !"));
}
if (r1 < nb1) {
	r1 = Number(prompt("C'est plus !"));
}
cpt1++;
}
	if (cpt1 < 5) {
	alert(`Felicitation ! vous avez trouvez en ${cpt1} coups` );
} if (cpt1 > 5 && cpt1 < 10) {
	alert(`Vous avez trouvez en ${cpt1} coups, vous pouvez mieux faire !`);
} if (cpt1 > 10) {
	alert(`Vous avez trouver en ${cpt1} coups, ce jeu n'est pas pour toi !`);
}
if (cpt1 < resultat) {
resultat = cpt1;
}
manche++;
}

jeu2();
var recommencer = confirm(`Vous avez joue ${manche} manche(s) et votre meilleur score est : ${resultat} coups. Voulez-vous rejouer ?`);
while (recommencer == true) {
	
jeu2();
recommencer = confirm(`Vous avez joue ${manche} manche(s) et votre meilleur score est : ${resultat} coups. Voulez-vous rejouer ?`);
	
}
}
