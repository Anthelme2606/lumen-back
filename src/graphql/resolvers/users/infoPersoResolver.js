const InformationPersonnelleService=require("../../../services/users/infoPersoService");
const {graphqlUploadExpress}=require("graphql-upload-minimal");
const InformationPersonnelleResolver={
    //Upload:graphqlUploadExpress,
    
Query:{

},
Mutation:{
    saveInfo:async(_,{data,profile},context)=>{
       
        return await InformationPersonnelleService.saveInfo(data,profile);
    },
    updateInfo:async(_,{id,data})=>{

        return InformationPersonnelleService.updateInfo(id,data);
    },
   
},

}
module.exports=InformationPersonnelleResolver;