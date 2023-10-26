const MatiereModel= require('../../models/matieres/matiereModel');

class MatiereRepository {
  static async create(data,image) {
    try {
      data.image=image;
      const nouvelleMatiere = new MatiereModel(data);
      const matiereCreee = await nouvelleMatiere.save();
      return matiereCreee;
    } catch (erreur) {
      throw erreur;
    }
  }
  static async getById(matId){
    try{
    const matFind= await MatiereModel.findById(matId);
    if(!matFind){
      throw new Error("Aucun Module avec cette clé");
    }
    return matFind;
    }catch(error)
    {
      throw error;
    }

  }
  
  static async getByIds(matiereIds){
    try{
      return await MatiereModel.find({_id:{$in:matiereIds}});
    }
    catch(err){
      throw err;
    }
  }

  static async update(id, data,image) {
    try {
      data.image=image;
      const matiereMiseAJour = await MatiereModel.findByIdAndUpdate(id, data, {
        new: true, 
      });
      return matiereMiseAJour;
    } catch (erreur) {
      throw erreur;
    }
  }

  static async getAll() {
    try {
      const toutesLesMatieres = await MatiereModel.find({});
      return toutesLesMatieres;
    } catch (erreur) {
      throw erreur;
    }
  }

  
  static async getMatieresByEnseignant(enseignantId) {
    try {
      const matieresDeLEnseignant = await MatiereModel.find({ enseignants:enseignantId} );
      return matieresDeLEnseignant;
    } catch (erreur) {
      throw erreur;
    }
  }
}

module.exports = MatiereRepository;