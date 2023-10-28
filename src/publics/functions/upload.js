const fs = require("fs");
const uploadDir = "../lumen/src/publics/uploads";
const { createWriteStream } = require('fs');

const path = require('path');
class FileUploader {
  
  static async uploadFile(file) {
    if (!file) {
      throw new Error("Aucun fichier téléchargé.");
    }
    const uniqueFileName = `${Date.now()}_${file.name}`;
    const uploadPath = `${uploadDir}/${uniqueFileName}`;

    try {
      await file.mv(uploadPath);
      return uploadPath;
    } catch (error) {
      throw new Error("Erreur lors du téléchargement du fichier.");
    }
  }

  

  
  static async uploadFileToo(upload) {
    if (upload) {
      const { file } = await upload;
    
      const { createReadStream,mimetype, filename } = file;
  
      const uniqueFileName = `${Date.now()}_${filename}`;
  
      const uploadPath = path.join(uploadDir, uniqueFileName);
  
      
     await this.ensureDirectoryExistence(uploadPath);
  
      const writeStream = createWriteStream(uploadPath);
     
      return new Promise((resolve, reject) => {
        createReadStream()
          .pipe(writeStream)
          .on('finish', () => resolve(uploadPath))
          .on('error', reject);
      });
    }
  }
  
  static async  ensureDirectoryExistence(filePath) {
    const dirname = path.dirname(filePath);
    if (!fs.existsSync(dirname)) {
      fs.mkdirSync(dirname, { recursive: true });
    }
  }






static async  saveFile(upload) {
  return new Promise((resolve, reject) => {
    const { createReadStream, filename } =   upload;

    // Générer un nom de fichier unique basé sur Date.now()
    const uniqueFilename = `${Date.now()}_${filename}`;
    
    // Chemin complet de destination pour sauvegarder le fichier
    const filePath = path.join(uploadDir, uniqueFilename);

    // Créer un flux de lecture et écriture
    const fileStream = createReadStream.pipe(fs.createWriteStream(filePath));

    fileStream.on('finish', () => {
      resolve(uniqueFilename); // Renvoie le nom du fichier unique
    });

    fileStream.on('error', (error) => {
      fs.unlinkSync(filePath); // Supprime le fichier en cas d'erreur
      reject(error);
    });
  });
}


  static async uploadFile(file) {
    if (!file) {
      throw new Error("Aucun fichier téléchargé.");
    }
    const uniqueFileName = `${Date.now()}_${file.name}`;
    const uploadPath = `${uploadDir}/${uniqueFileName}`;

    try {
      await file.mv(uploadPath);
      return uploadPath;
    } catch (error) {
      throw new Error("Erreur lors du téléchargement du fichier.");
    }
  }
}
module.exports = FileUploader;
