const { gql } = require("apollo-server-express");
module.exports = gql`
  type User {
    id: ID!
    nom: String
    prenom: String
    username: String
    email: String
    userType: UserType
    infoPerso:InformationPersonnelle
    ensChoice:[Matiere]
    etuChoice:[Matiere]
  }

  enum UserType {
    ETUDIANT
    ENSEIGNANT
    SECRETAIRE
    ADMIN
  }
  type AuthPayload {
    token: String
    user: User
  }
  input UserInput {
    nom: String!
    prenom: String!
    email: String!
    password:String!
    
    userType: UserType
  }
  input loginInput {
    username:String!
    password:String!
  }
  scalar Upload
  
`;
