const mongoose = require('mongoose');

// Schéma du modèle de session
const sessionSchema = new mongoose.Schema({
  nom: {
    type: String,
    required: true,
  },
  dateDebut: {
    type: Date,
    required: true,
  },
  dateFin: {
    type: Date,
    required: true,
  },
  lienVisioconference: {
    type: String, // Vous pouvez personnaliser le type selon vos besoins
  },
  cours: {
    type: mongoose.Schema.Types.ObjectId,
    ref: 'Cours', // Référence au modèle de cours
    required: true,
  },
},
{
  timestamps:true,
});

// Modèle de session basé sur le schéma
const Session = mongoose.model('Session', sessionSchema);

module.exports = Session;