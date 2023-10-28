const UserModel = require("../../models/users/userModel.js");
class UserRepository {
  static async create(userData) {
    try {
      const newUser = new UserModel(userData);
      
      const existing=await this.getByEmail(userData.email);
      console.log(existing);
      if(existing)
      {
        throw new Error(`Vous aviez deja un compte et votre username est: ${existing.username}`);
       return existing;
      }
     return await newUser.save();
    } catch (error) {
      throw error;
    }
  }
  static async getByUsername(userFind) {
    try {
      const users = await UserModel.findOne({ username: userFind });

      return users;
    } catch (error) {
      throw error;
    }
  }
  static async getByEmail(usermail){
    try{
      const user=await UserModel.findOne({email:usermail});

     return user ? user:null;
    }catch(erreur)
    {
      throw erreur;
    }
  }
  static async login(loginData) {
    try {
      const user = await this.getByUsername(loginData.username);
      if (!user) {
        throw new Error(
          `Vous n \' avez pas de compte!! avec: ${loginData.username} `
        );
      }
      const isPass = (user.password === loginData.password);
      if (!isPass) {
        throw new Error(
          `Mot de passe incoreect!! avec: ${loginData.password} `
        );
      }
      return user;
    } catch (error) {
      throw error;
    }
  }
  static async getById(userId) {
    try{
      return await UserModel.findById(userId);

    }catch(error)
    {
      throw error;
    }
  }
  static async getByIds(userIds) {
    try{
      return await UserModel.find({_id:{$in:userIds}});

    }catch(error)
    {
      throw error;
    }
  }
  static async getAll(){
    try{
      return await UserModel.find({});

    }catch(err)
    {
      throw err;
    }
  }
  
 
}

module.exports = UserRepository;
