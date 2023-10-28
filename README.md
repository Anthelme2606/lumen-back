## partie des modules ou matiere
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

## NB:tu vas devoir afficher seulement quelques informatiosn de matiere sur la page d'accueil et c'est a la lecture des matiers qu'on peut avoir tous les information sur la matieres et ca concerne l'adminstrateur puisque seul lui peut connaitre les autres informations comme la listes des etudiants ...
EndPoint:  
{
[createMatiere]:permet decreer une matiere en fonction des attributs primaires de la matiere(cote admin)
[getAllMatiere]: affiche tous les matieres et ces informations(cotes administrateurs)

[GetMatiereById(id)]: retournes une seule matiere specifique si la matieres existes(cotes utilisateurs)
[updatematiere]:mets a jour un ou plusieurs champs sur la matieres

[!!!!]:je ne recommande pas la suppressio d'une matiere ou module pour des des quelques petites raisons..

}

# Documentation de signup et login

Ce document fournit une description des fonctions `signup` et `login` ainsi que leurs entrées et sorties.

## Fonction signup

La fonction `signup` permet à un utilisateur de s'inscrire sur la plateforme. Elle accepte un objet `userData` contenant les informations nécessaires pour créer un compte. La fonction renvoie un objet `AuthPayload` qui contient un jeton d'authentification et des détails sur l'utilisateur.

### Entrée (userData: UserInput)

- `nom` (String, requis) : Le nom de l'utilisateur.
- `prenom` (String, requis) : Le prénom de l'utilisateur.
- `email` (String, requis) : L'adresse e-mail de l'utilisateur.
- `password` (String, requis) : Le mot de passe de l'utilisateur.
- `userType` (UserType) : Le type de l'utilisateur (ETUDIANT, ENSEIGNANT, SECRETAIRE, ADMIN).

### Sortie (AuthPayload)

- `token` (String) : Un jeton d'authentification valide pour l'utilisateur.
- `user` (User) : Un objet utilisateur contenant des détails tels que l'ID, le nom, le prénom, etc.

Exemple de requête GraphQL pour signup :

```graphql
mutation {
  signup(userData: {
    nom: "John",
    prenom: "Doe",
    email: "john.doe@example.com",
    password: "motdepasse123",
    userType: ENSEIGNANT
  }) {
    token
    user {
      id
      nom
      prenom
    }
  }
}

## Type Matiere
Le type Matiere représente une matière ou un cours dans le système.

## Champs
id (ID) : L'identifiant unique de la matière.
nom (String) : Le nom de la matière.
description (String) : La description de la matière.
image (String) : L'URL de l'image associée à la matière.
niveauDifficulte (String) : Le niveau de difficulté de la matière.
nombreInscrits (Int) : Le nombre d'étudiants inscrits à la matière.
dureeCours (String) : La durée des cours.
prerequis (String) : Les prérequis pour la matière.
langueEnseignement (String) : La langue d'enseignement.
objectifsApprentissage (String) : Les objectifs d'apprentissage.
coutAchat (Float) : Le coût d'achat de la matière.
courses ([Course]) : Les cours associés à la matière.
etudiants ([User]) : Les étudiants inscrits à la matière.

## Entrée (MatiereInput)
nom (String, requis) : Le nom de la matière.
description (String) : La description de la matière.
niveauDifficulte (String) : Le niveau de difficulté de la matière.
dureeCours (String) : La durée des cours.
prerequis (String) : Les prérequis pour la matière.
langueEnseignement (String) : La langue d'enseignement.
objectifsApprentissage (String) : Les objectifs d'apprentissage.
coutAchat (Float, requis) : Le coût d'achat de la matière.

## Entrée (MatiereUpdateInput)
nom (String) : Le nom de la matière.
description (String) : La description de la matière.
niveauDifficulte (String) : Le niveau de difficulté de la matière.
nombreEtudiantsInscrits (Int) : Le nombre d'étudiants inscrits à la matière.
dureeCours (String) : La durée des cours.
prerequis (String) : Les prérequis pour la matière.
langueEnseignement (String) : La langue d'enseignement.
objectifsApprentissage ([String]) : Les objectifs d'apprentissage.
coutAchat (Float) : Le coût d'achat de la matière.

## Type Demande
Le type Demande représente une demande d'enseignement soumise par un enseignant.

## Champs
id (ID) : L'identifiant unique de la demande.
domainesExpertise (String) : Les domaines d'expertise de l'enseignant.
curriculumVitae (String) : Le curriculum vitae de l'enseignant.
demandeAcceptee (String) : Statut de la demande (acceptée ou non).
enseignant_matieres ([Matiere]) : Les matières associées à l'enseignant.
quittance (Int) : Le numéro de quittance de la demande.
## Entrée (demandeInput)
domainesExpertise (String, requis) : Les domaines d'expertise de l'enseignant.
quittance (Int) : Le numéro de quittance de la demande.
## Entrée (UpdateDemandeInput)
domainesExpertise (String) : Les domaines d'expertise de l'enseignant.
Sortie (DemandeReponse)
success (Boolean) : Indique si l'opération a réussi.
message (String) : Message associé à l'opération.







