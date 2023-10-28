const mongoose = require('mongoose');

// Schéma des informations personnelles de l'étudiant
const informationPersonnelleSchema = new mongoose.Schema({
  profile:Object,
  
 etudiant:{
    type:mongoose.Schema.Types.ObjectId,
    ref:'User', 
    required: true,
    unique:   true,
    
 },
  dateNaissance: {
    type: String,
  },
  
  adresse: {
    type: String,
  },
  codePostal: {
    type: String,
  },
  ville: {
    type: String,
  },
  pays: {
    type: String,
  },
  numeroTelephone: {
    type: String,
  },
  sexe: {
    type: String,
    enum: ['Homme', 'Femme', 'Autre'],
  },
  nationalite: {
    type: String,
  },
  profession: {
    type: String,
  },
  langueMaternelle: {
    type: String,
  },
  diplomePrecedent: {
    type: String,
  },
  statutFamilial: {
    type: String,
  },
 
},
{
  timestamps:true,
});

const InformationPersonnelle = mongoose.model('InformationPersonnelle', informationPersonnelleSchema);

module.exports = InformationPersonnelle;