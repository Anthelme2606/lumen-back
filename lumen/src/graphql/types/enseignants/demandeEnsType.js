const { gql } = require("apollo-server-express");
module.exports = gql`
  type Demande {
    id:ID!
    enseignant:User
    curriculumVitae: Upload
    lettreMotivation: Upload
    casierJudiciaire: Upload
    demandeAcceptee: String!
    enseignant_matieres: [Matiere!]
  }

  input demandeInput {
    enseignant: ID!
    matiere: String
    curriculumVitae: Upload
    lettreMotivation: Upload
    casierJudiciaire: Upload
   
    quittance:Float
  }

  input UpdateDemandeInput {
    
    matiere: String
    curriculumVitae: Upload
    lettreMotivation: Upload
    casierJudiciaire: Upload
    quittance:Float
  }
  type DemandeReponse {
    success: Boolean
    message: String
  }
  scalar Upload
`;
