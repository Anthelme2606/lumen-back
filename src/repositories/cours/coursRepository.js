const Cours = require('../../models/cours/coursModel'); // Assurez-vous d'importer le modèle de cours

class CoursRepository {
  static async create(data) {
    try {
      const newCourse = new Cours(data);
      return await newCourse.save();
    } catch (error) {
      throw error;
    }
  }

  static async update(id, data) {
    try {
      return await Cours.findByIdAndUpdate(id, data, { new: true });
    } catch (error) {
      throw error;
    }
  }

  static async getSingle(id) {
    try {
      return await Cours.findById(id);
    } catch (error) {
      throw error;
    }
  }
static  async getByIds(courseIds){
  try{
return await Cours.find({_id:{$in:courseIds}});
  }catch(err)
  {
    throw err;
  }
}
  static async getAll() {
    try {
      return await Cours.find({});
    } catch (error) {
      throw error;
    }
  }

  static async delete(id) {
    try {
      return await Cours.findByIdAndDelete(id);
    } catch (error) {
      throw error;
    }
  }
}

module.exports = CoursRepository;