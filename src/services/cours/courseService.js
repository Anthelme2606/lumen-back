const CoursRepository = require('../../repositories/cours/coursRepository');
const UserRepository=require("../../repositories/users/userRepository");
const MatiereRepository=require("../../repositories/matieres/matiereRepository");
const Upload=require("../../publics/functions/upload");
class CoursService {
static async create(data)

{
 try
{ 
    if(data.matiereId){
        const matiere=await  MatiereRepository.getById(data.matiereId);
        if(!matiere){
            throw new Error("Veuillez etre sur que le module existe avant la creation du cours");
    
        }
        //matiere.cours.push()
        const cours= await CoursRepository.create(data);
        if(!cours)
        {
            throw new Error("erreur lors de la recuperation du nouveau cours..");
        }
        cours.matiere=  matiere._id;
        matiere.cours.push(cours._id);
        await matiere.save();
        return cours.save();
    }
    
      
}catch(err){
    throw err;
}
}
static async getUserById(userId)
{
return await UserRepository.getById(userId);
}
static async getAll() {
    return await CoursRepository.getAll();
}
static async delete(courseId) {
    return await CoursRepository.delete(courseId);
}
static async update(id,data) {
    return await CoursRepository.update(id,data);
}
static async getSingle(id)
{
    return await CoursRepository.getSingle(id);
}
}
module.exports= CoursService ;
