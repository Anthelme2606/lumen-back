#partie des modules ou matiere
Sur une matiere on peut avoir:
id,nom,description,
image,
niveauDifficulte,
nombreInscrits,
dureeCours,
prerequis,
langueEnseignement,
objectifApprenant,
coutAchat,
courses[retournes tous les cours issus des matieres],
etudiants[affiches tous les etudiants inscripts dans une matieres]

NB:tu vas devoir afficher seulement quelques informatiosn de matiere sur la page d'accueil et c'est a la lecture des matiers qu'on peut avoir tous les information sur la matieres et ca concerne l'adminstrateur puisque seul lui peut connaitre les autres informations comme la listes des etudiants ...
EndPoint:  
{
[createMatiere]:permet decreer une matiere en fonction des attributs primaires de la matiere(cote admin)
[getAllMatiere]: affiche tous les matieres et ces informations(cotes administrateurs)

[GetMatiereById(id)]: retournes une seule matiere specifique si la matieres existes(cotes utilisateurs)
[updatematiere]:mets a jour un ou plusieurs champs sur la matieres

[!!!!]:je ne recommande pas la suppressio d'une matiere ou module pour des des quelques petites raisons..

}
