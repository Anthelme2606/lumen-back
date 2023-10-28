const EtudiantModel = require("../../models/etudiants/etudiantModel");
class EtudiantRepository {


    static async creerCompte(data) {
        try {
            const nouvelEtudiant = new EtudiantModel(data);
            await nouvelEtudiant.save();
            return nouvelEtudiant;
        } catch (erreur) {
            throw erreur;
        }

    }

    static async getByUsername(usernameFind) {
        try {
            const usernames = await EtudiantModel.findOne({ username: usernameFind });

            return usernames
        } catch (erreur) {
            throw erreur;
        }
    }


    static async getById(id) {
        try {
            const etudiant = await EtudiantModel.findById(id);
            
            return etudiant;
        } catch (erreur) {
            throw erreur;
        }
    }

    static async getAll()
    {
        try {
            const etudiants = await EtudiantModel.find({});
            return etudiants;
        } catch (erreur) {
            throw erreur;
        }
    }

static async updateEtudiant(id,data)
{
    try {
        const etudiant = await EtudiantModel.findById(id);
        if(!etudiant)
        {
            throw new Error("Aucun Etudiant trouve");
        }
       if(data.nomComplet)
       {
        etudiant.nomComplet=data.nomComplet;
       }
       if(data.email)
       {
        etudiant.email=data.email;
       }
       if(data.motDePasse)
       {
        etudiant.motDePasse=data.motDePasse;
       }
      const EtudiantUp=await etudiant.save();
      return EtudiantUp;
    } catch (erreur) {
        throw erreur;
    }
    
}
static async deleteEtudiantById(id) {
    try {
      
      const etudiantSupprime = await EtudiantModel.findByIdAndRemove(id);

      if (!etudiantSupprime) {
        throw new Error("Étudiant non trouvé");
      }

      return etudiantSupprime;
    } catch (erreur) {
      throw erreur; 
    }
  }







}
module.exports = EtudiantRepository;