const mongoose = require('mongoose');
const InformationPersonnelle=require("../users/infoPersoModel");

const etudiantSchema = new mongoose.Schema({
  nomComplet: {
    type: String,
    required: true,
  },
  email: {
    type: String,
    required: true,
    unique: true,
  },
  username: {
    type: String,
    required: true,
    unique: true,
  },
  motDePasse: {
    type: String,
    required: true,
  },
  dateInscription:{
    type:String,
  },
});
etudiantSchema.pre("remove",async function(next)
{
  try{
  
await  InformationPersonnelle.deleteMany({etudiant:this._id});
next();

  }catch(erreur)
  {
    next(erreur);

  }
});

const Etudiant = mongoose.model('Etudiant', etudiantSchema);

module.exports = Etudiant;