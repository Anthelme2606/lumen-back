const EtudiantService=require("../../../services/etudiants/etudiantService");
const EtudiantResolvers={

    Query:{
getAll:async()=>{
    return EtudiantService.getAll();
},
getById:async(_,{id},context)=>{
    const {user}=context;
    console.log(user);
    return EtudiantService.getById(id);
}
    },
    Mutation:{
creerCompte:async (_,{data}) =>{
    return await EtudiantService.creerCompte(data);
},
updateEtudiant:async(_,{id,data})=>{
    return await EtudiantService.update(id,data);
},
deleteEtudiantById:async (_,{id})=>{
    return await EtudiantService.deleteEtudiantById(id);
}
    },
   
}

module.exports=EtudiantResolvers;