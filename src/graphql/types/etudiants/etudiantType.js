const {gql}=require("apollo-server-express");
module.exports=gql`
type Etudiant {
    id:ID!
    nomComplet:String!
    email:String!
    username:String!
    motDePasse:String!
    dateInscription:String!
  

}
input EtudiantInput {
    nomComplet:String
    email:String
    motDePasse:String
}








`;