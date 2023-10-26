const UserRepository = require("../../repositories/users/userRepository");
const Generator = require("../../publics/functions/generator");
const Upload=require("../../publics/functions/upload");
const MatiereRepository = require("../../repositories/matieres/matiereRepository");
const InformationPersonnelleRepository = require("../../repositories/users/infoPersoRepository");
const secretKey = process.env.JWT_SECRET;

const jwt = require("jsonwebtoken");

class UserService {
  static async upload(file)
  {
    try{
      const uniq=await Upload.readFile(file);
      if(uniq){
        return {sucess:true,message:uniq}
      }
      else{
        return {sucess:false,message:"erreur pour l'upload de fichier"};
      }
      
    }catch(err){
      throw err;
    }
  }
  static async create(userData) {
    try {
      const complet = userData.nom + userData.prenom;
      const email = userData.email;
      const username = await Generator.generateUsername(complet, email);
      userData.username = username;

      userData.dateInscription = await Generator.formatDateInscription(
        new Date()
      );
      const user = await UserRepository.create(userData);
      const token = jwt.sign({ user }, secretKey, {
        expiresIn: "1h",
      });
      return { token, user };
    } catch (error) {
      throw error;
    }
  }
  static async getAll() {
    return await UserRepository.getAll();
  }
  static async addEnsToMatiere(ensId, matiereId) {
    try {
      const matiere = await MatiereRepository.getById(matiereId);
      const ens = await this.getById(ensId);

      if (matiere && ens) {
        if (matiere.enseignants.includes(ens._id)) {
          throw new Error("Cet enseignant est déjà associé à cette matière.");
        }

        matiere.enseignants.push(ens._id);
        await matiere.save();

        return {
          success: true,
          message: "Ajout réussi.",
        };
      } else {
        return {
          success: false,
          message: "Une erreur s'est déclenchée pendant l'ajout.",
        };
      }
    } catch (error) {
      throw error;
    }
  }
  static async getById(userId) {
    try {
      return await UserRepository.getById(userId);
    } catch (error) {
      throw error;
    }
  }
  static async login(loginData) {
    const user = await UserRepository.login(loginData);
    const token = jwt.sign({ user }, secretKey, {
      expiresIn: "1h",
    });
   
    return { token, user };
  }
  static async getInfoPerso(id) {
    return await InformationPersonnelleRepository.getByUser(id);
  }
  static async getById(userId) {
    return await UserRepository.getById(userId);
  }

  static async getMatiereChoose(userId) {
    try {
      const user = await this.getById(userId);
      if (!user) {
        throw new Error("User Not Find");
      }
      const matiereIds = user.matierePaid.map((achat) => achat.matiereId);
      const matieres =  await MatiereRepository.getByIds(matiereIds);
     
      return  matieres;
    } catch (err) {
      throw err;
    }
  }
  static async getMatiere(userId) {
    try {
      return await MatiereRepository.getMatieresByEnseignant(userId);
    } catch (error) {
      throw error;
    }
  }
  static async addMatiereToChoice(userId, matiereId) {
    try {
      const user = await this.getById(userId);
      const matiere = await MatiereRepository.getById(matiereId);
      const dateAchat = await Generator.formatDateInscription(new Date());
      if (!user || !matiere) {
        throw new Error("Utilisateur ou matière non trouvés.");
      }

      // Utilisez un Set pour stocker les ID des matières déjà achetées par l'utilisateur

      if (
        !user.matierePaid.some(
          (achat) => achat.matiereId.toString() === matiereId
        )
      ) {
        user.matierePaid.push({ matiereId, dateAchat });
        await user.save();

        // Utilisez un Set pour stocker les ID des utilisateurs qui ont choisi cette matière
        const utilisateursChoisis = new Set(
          matiere.userWhoChoose.map((choix) => choix.userId.toString())
        );
       
        utilisateursChoisis.add(userId);
        matiere.userWhoChoose = Array.from(utilisateursChoisis).map(
          (userId) => ({ userId, dateAchat })
        );
        matiere.nombreInscrits=matiere.userWhoChoose.length;
        await matiere.save();

        return { success: true, message: "Matière achetée avec succès." };
      } else {
        return {
          success: false,
          message: "L'utilisateur a déjà acheté cette matière.",
        };
      }
    } catch (error) {
      throw error;
    }
  }
}
module.exports = UserService;
