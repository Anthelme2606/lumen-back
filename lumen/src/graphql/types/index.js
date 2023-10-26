const { gql } = require("apollo-server-express");

const EtudiantType = require("./etudiants/etudiantType");

const InfoPersoType = require("./users/infoPersoType");
const MatiereType = require("./matieres/matiereType");
const DemandeType = require("./enseignants/demandeType");
const UserType = require("./users/userType");
const CourseType = require("./cours/courseType");

module.exports = gql`
  scalar Upload
  type Query {
    getUserById(userId: String): User
    getAll: [Etudiant!]
    getUsers: [User]
    getById(id: String!): Etudiant!
    getAllMatiere: [Matiere!]
    findEnseignantById(id: String!): Demande!
    getEnseignants: [Demande!]

    #course
    getAllCourses: [Course!]!
    getSingle(id: String): Course!
  }
  type Mutation {
    upload(file: Upload): DemandeReponse
    addMatiereToChoice(userId: String, matiereId: String): DemandeReponse
    addEnsToMatiere(ensId: String, matiereId: String): DemandeReponse!
    signup(userData: UserInput): AuthPayload!
    login(loginData: loginInput): AuthPayload!
    creerCompte(data: EtudiantInput!): Etudiant!
    updateEtudiant(id: String!, data: EtudiantInput): Etudiant!
    saveInfo(
      data: InformationPersonnelleInput
      profile: Upload
    ): InformationPersonnelle
    updateInfo(
      id: String!
      data: InformationPersonnelleInput
      profile: Upload
    ): InformationPersonnelle!
    deleteEtudiantById(id: String): Etudiant!

    createMatiere(data: MatiereInput, image: Upload): Matiere!

    updateMatiere(
      id: String!
      data: MatiereUpdateInput
      image: Upload
    ): Matiere!

    demandeEnseignant(
      data: demandeInput,cv: Upload): Demande!

    accepterDemandeEnseignement(enseignantId: String): DemandeReponse!

    refuserDemandeEnseignement(enseignantId: String!): DemandeReponse!

    #Course
    createCourse(data: CourseInput): Course!
    deleteCourse(id: String): Course
    updateCourse(id: String, data: CourseUpdateInput): Course!
  }
  ${EtudiantType}
  ${InfoPersoType}
  ${MatiereType}
  ${DemandeType}
  ${UserType}
  ${CourseType}
`;
