const EtudiantRepository = require("../../repositories/etudiants/etudiantRepository");
const InformationPersonnelleRepository=require("../../repositories/users/infoPersoRepository");
class EtudiantService {


    static async creerCompte(data) {

        try {
            const dateInscription = this.formatDateInscription(new Date());
            data.dateInscription = dateInscription;
            let username = await this.generateUsername(data.nomComplet, data.email);
            data.username = username;
            const nouvelEtudiant = await EtudiantRepository.creerCompte(data);
            return nouvelEtudiant;
        } catch (erreur) {
            throw erreur;
        }
    }

    static async generateUsername(nomComplet, email) {


        let username;
        const nomSansEspaces = nomComplet.replace(/\s+/g, '');
        const emailSansAt = email.replace(/@/g, '');
        let baseUsername = nomSansEspaces.substring(0, 3) + emailSansAt.substring(0, 3);
        username = baseUsername;
        let existingUsernames = await EtudiantRepository.getByUsername(username);
        let count = 1;
        while (existingUsernames) {
            username = baseUsername + count;
            count++;
            existingUsernames = await EtudiantRepository.getByUsername(username);
        }

        return username;
    }
    static formatDateInscription(date) {
        const options = {
            year: 'numeric',
            month: '2-digit',
            day: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false,
        };
        return date.toLocaleString(undefined, options);
    }
    static async getAll() {
        return await EtudiantRepository.getAll();
    }
    static async getById(id) {
        return await EtudiantRepository.getById(id);
    }
    static async updateEtudiant(id,data) {
        return await EtudiantRepository.update(id,data);
    }
    static async getInfoPerso(id)
    {
  return await InformationPersonnelleRepository.getByEtudiant(id);
    }
    static async deleteEtudiantById(id)
   { 
        return EtudiantRepository.deleteEtudiantById(id);
    }
    


}
module.exports = EtudiantService;