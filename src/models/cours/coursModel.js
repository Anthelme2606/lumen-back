const mongoose = require('mongoose');

// Schéma du modèle de cours
const coursSchema = new mongoose.Schema({
  nom: {
    type: String,
    required: true,
  },
  description: {
    type: String,
    required: true,
  },
  fichier:{
    type:String,
  },
  matiere: 
    {
        type: mongoose.Schema.Types.ObjectId,
        ref: 'Cours',
    },

  enseignant: {
    type: mongoose.Schema.Types.ObjectId,
    ref: 'Enseignant', 
    required: true,
  },
},{
  timestamps:true,
});

const Cours = mongoose.model('Cours', coursSchema);

module.exports = Cours;