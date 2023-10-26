const { merge }=require("lodash");
const  resolver={};
const EtudiantResolver=require("./etudiants/etudiantResolver");
const InfoPersonnelleResolver=require("./users/infoPersoResolver");
const MatiereResolver=require("./matieres/matiereResolver");
const DemandeResolver=require("./enseignants/demandeResolver");
const UserResolver=require("./users/userResolver");
const CourseResolver=require("./cours/coursResolver");

const resolvers=merge(resolver,
    EtudiantResolver,

    InfoPersonnelleResolver,

    MatiereResolver,

    DemandeResolver,
    UserResolver,
    CourseResolver,



    );
module.exports=resolvers;