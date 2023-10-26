const mongoose = require('mongoose');

const matiereSchema = new mongoose.Schema({
    nom: {
        type: String,
        required: true,
        unique:true,
    },
    image: Object,
    description: String,
    enseignants: [
        {
            type: mongoose.Schema.Types.ObjectId,
            ref: 'Enseignant',
        },
    ],
    cours: [
        {
            type: mongoose.Schema.Types.ObjectId,
            ref: 'Cours',
        },
    ],
    niveauDifficulte: String,

    nombreInscrits: {
        type:Number,
        default:0,
    },

    dureeCours: String,

    prerequis: String,

    langueEnseignement: String,

    objectifsApprentissage: String ,

    coutAchat: {
        type: Number,
        required: true,
        min: 0,
    },
    userWhoChoose:[{
        userId:{type:mongoose.Schema.Types.ObjectId,ref:"LumenUser"},
        dateAchat:{type:String},
    },],
},
{
    timestamps:true,
});

const Matiere = mongoose.model('Matiere', matiereSchema);

module.exports = Matiere;