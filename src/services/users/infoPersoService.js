const InformationPersonnelleRepository = require("../../repositories/users/infoPersoRepository");
const Upload = require("../../publics/functions/upload");
class InformationPersonnelleService {
  static async saveInfo(data, profile) {
    try {
      console.log(profile);
      if (!profile) {
        profile= "../lumen/src/publics/uploads/defualt.jpg";
        
        //profile = await Upload.uploadFileToo(profile);
       // throw new Error(`prfile is undefined`);
        
        return await InformationPersonnelleRepository.saveInfo(data, profile);
       
      } else {
        profile = await Upload.uploadFileToo(profile);

        return await InformationPersonnelleRepository.saveInfo(data, profile);
      }
    } catch (err) {
      throw err;
    }
  }
  static async getByUser(userId) {
    return InformationPersonnelleRepository.getByUser(userId);
  }
  static async updateInfo(id, data,profile) {
    return InformationPersonnelleRepository.updateInfo(id, data,profile);
  }
}
module.exports = InformationPersonnelleService;
