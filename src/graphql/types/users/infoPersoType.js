const {gql}=require("apollo-server-express");
module.exports=gql`
type InformationPersonnelle {
  id: ID
  profile:String
 dateNaissance: String
  adresse: String
 codePostal: String
  ville: String
  pays: String
  numeroTelephone: String
  sexe: sexeEnum
  nationalite: String
  profession: String
  langueMaternelle: String
  diplomePrecedent: String
  statutFamilial: String
}
enum sexeEnum {
    Homme
    Femme
    Autre
}
input InformationPersonnelleInput {
  etudiant: ID
  dateNaissance: String
  adresse: String

  codePostal: String
  ville: String
  pays: String
  numeroTelephone: String
  sexe: sexeEnum
  nationalite: String
  profession: String
  langueMaternelle: String
  diplomePrecedent: String
  statutFamilial: String
}
type  pp {
 
 userInfo:InformationPersonnelle
  
}
scalar Upload




`;