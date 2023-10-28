const InformationPersonnelleModel = require("../../models/users/infoPersoModel");

class InformationPersonnelleRepository {
  static async saveInfo(data, profile) {
    try {
      data.profile=profile;
      const newInfo = new InformationPersonnelleModel(data);
      return await newInfo.save();
    } catch (erreur) {
      throw erreur;
    }
  }
  static async getByUser(userId) {
    try {
      const info = await InformationPersonnelleModel.findOne({ user: userId });
      return info;
    } catch (erreur) {
      throw erreur;
    }
  }

  static async updateInfo(id, data,image) {
    try {
      const infoPersonnelle = await InformationPersonnelleModel.findById(id);

      if (!infoPersonnelle) {
        throw new Error("Information personnelle non trouvée");
      }
      data.image=image;
      Object.keys(data).forEach((key) => {
        infoPersonnelle[key] = data[key];
      });

      const infoMiseÀJour = await infoPersonnelle.save();

      return infoMiseÀJour;
    } catch (erreur) {
      throw erreur;
    }
  }
}
module.exports = InformationPersonnelleRepository;
