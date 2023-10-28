const mongoose = require('mongoose');

const demandeSchema = new mongoose.Schema({
  enseignant: 
    {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'LumenUser',
    },
  matiere: 
    {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'Matiere',
    },
 
  curriculumVitae: String, 
  lettreMotivation: String,

  casierJudiciaire: String, 
  demandeAcceptee: {
    type:Boolean,
    default:false,
  }, 
  quittance:{
    type:Number,
    default:0,
  }
});

const Demande = mongoose.model('Demande', demandeSchema);

module.exports = Demande;