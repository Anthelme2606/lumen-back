const UserService=require("../../../services/users/userService");
const jwt=require("jsonwebtoken");
const  SECRET_KEY =process.env.JWT_SECRET;
const UserResolver={

     Query:{
       getUsers:async(_,{},context)=>{
        console.log("Coucou");
            try{
            /* const {user}=context;
                if(user.userType!=="ADMIN"){
                    throw new Error("vous ne pouvez pas effectuer cette requette");
                }*/
                return await UserService.getAll();

            }catch(err){
                throw err;
            }
  
       },
       getUserById:async(_,{userId})=>{
        return await UserService.getById(userId);
       },

    },
     Mutation:{
        signup:async(parent,{userData})=>{
            return await UserService.create(userData);
        },
        login:async(_,{loginData})=>{
            
            return await UserService.login(loginData);
        },
        addEnsToMatiere:async(parent,{ensId,matiereId},context)=>{
            try
           { const {user}=context;
            if(user.userType==="ADMIN"){
                return UserService.addEnsToMatiere(ensId,matiereId);
            }}catch(error){
                throw error;
            }
        },
        addMatiereToChoice:async(parent,{userId,matiereId},context)=>{
            try{
      const {user}=context;
      //console.log(user.userType);
      if(user.userType!=="ETUDIANT"){
        throw new Error("VOUS N ETES PAS AUTORISES POUR L\'achat des matieres");
      }else
          {userId=user._id;
         return await UserService.addMatiereToChoice(userId,matiereId);
        }
            }catch(error){
                throw error;
            }
        },
        upload:async(parent,{file})=>{
            return await UserService.upload(file);
        },

    },
    User:{
        infoPerso:async(parent)=>{
            return await UserService.getInfoPerso(parent.id);
        },
        ensChoice:async(parent)=>{
           try
           {
            
           return await UserService.getMatiere(parent._id);
         }catch(error){
            throw error;
         }

        },
        etuChoice:async(parent)=>{
            return await UserService.getMatiereChoose(parent._id );

        },
            },
}
module.exports=UserResolver;