const mongoose = require("mongoose");

const demandeSchema = new mongoose.Schema(
  {
    enseignant: {
      type: mongoose.Schema.Types.ObjectId,
      ref: "LumenUser",
    },

    matieres: [
      {
        type: mongoose.Schema.Types.ObjectId,
        ref: "Matiere",
      },
    ],

    curriculumVitae: Object,
    quittance: {
      type: Number,
    },

    demandeAcceptee: {
      type: Boolean,
      default: false,
    },
  },
  {
    timestamps: true,
  }
);

const Demande = mongoose.model("Demande", demandeSchema);

module.exports = Demande;
