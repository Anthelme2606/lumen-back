const EnseignantService = require("../../../services/enseignants/demandeService");
const EnseignantResolver = {
  Query: {
    findEnseignantById: async (_, { id }) => {
      return await EnseignantService.findEnseignantById(id);
    },
    getEnseignants: async () => {
      return await EnseignantService.getEnseignants();
    },
  },
  Mutation: {
    demandeEnseignant: async (_, { data, cv }, context) => {
      try {
        const { user } = context;
        if (user.userType !== "ENSEIGNANT" && user.userType !== "ADMIN") {
          throw new Error("Votre demande ne peut pas aboutir ");
        }
       data.enseignant=user._id;
        return await EnseignantService.demandeEnseignant(data, cv);
      } catch (err) {
        throw err;
      }
    },
    accepterDemandeEnseignement: async (_, { enseignantId }) => {
      return await EnseignantService.accepterDemandeEnseignement(enseignantId);
    },
    refuserDemandeEnseignement: async (_, { enseignantId }) => {
      return await EnseignantService.refuserDemandeEnseignement(enseignantId);
    },
  },
  Demande: {
    enseignant_matieres: async (parent) => {
      return await EnseignantService.getMatieres(parent.id);
    },
  },
};
module.exports = EnseignantResolver;
