const EnseignantRepository=require("../../repositories/enseignants/demandeRepository");
const MatiereRepository=require("../../repositories/matieres/matiereRepository");

const Upload=require("../../publics/functions/upload");
//console.log(Upload.readFile("file.png"));

class EnseignantService {

    static async demandeEnseignant(data,cv) {
      try{
        
        if(!cv)
         {
          throw new Error("un ou tous les champs de upload est vide..");
         }
         
         
         cv= await Upload.uploadFileToo(cv);
     

           return await EnseignantRepository.demandeEnseignant(data,cv);
      }catch(erreur)
      {
        throw erreur;
      }

    }
   static async accepterDemandeEnseignement(enseignantId)
    {
      return await EnseignantRepository.accepterDemandeEnseignement(enseignantId);
    }
   static async refuserDemandeEnseignement(enseignantId)
    {
      return await EnseignantRepository.refuserDemandeEnseignement(enseignantId);
    }
    static async findEnseignantById(enseignantId)
    {
      return await EnseignantRepository.findEnseignantById(enseignantId);
    }
static async getEnseignants()
{
  return await EnseignantRepository.getEnseignants();
}
static async getMatieres(id){
  return await MatiereRepository.getMatieresByEnseignant(id);
}
}
module.exports=EnseignantService;