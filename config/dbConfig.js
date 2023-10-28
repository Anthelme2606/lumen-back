const mongoose=require("mongoose");
const DB_URI=process.env.MONGO_URI || "mongodb://127.0.0.1:27017/lumen";
async function connect() {
    mongoose
    .connect(DB_URI,{
        useNewUrlParser:true,
        useUnifiedTopology:true
    })
    .then(()=>{
        console.log("Connexion a la base de donnees Mongo db avec success");
    })
    .catch((error)=>{
        console.error('Erreur de connexion a la base donnees');
    });
};
module.exports={
    connect,
}