const { gql } = require("apollo-server-express");
module.exports = gql`
  type Demande {
    id: ID!
    domainesExpertise: String
    curriculumVitae: String
    demandeAcceptee: String!
    enseignant_matieres: [Matiere!]
    quittance:Int
  }

  input demandeInput {
    domainesExpertise: String!
    quittance:Int
  }

  input UpdateDemandeInput {
    domainesExpertise: String
  }
  type DemandeReponse {
    success: Boolean
    message: String
  }
  scalar Upload
`;
