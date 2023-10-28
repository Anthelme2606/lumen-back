const CoursService=require("../../../services/cours/courseService");
const CourseResolver={
    Query:{
getAllCourses:async(parent)=>{
    return await CoursService.getAll();
},getSingle:async(parent,{id})=>{
    return await CoursService.getSingle(id);
},
    },
    Mutation:{
        createCourse:async(parent,{data},context)=>{
           try {

            
            const {user}=context;
            console.log(user);
            if(user.userType!=="ENSEIGNANT"){
     throw new Error(`${user.username} n'est pas enseignant`);
            }
            data.enseignant=user._id;
            return await CoursService.create(data);
        }catch(erreur)
        {
            throw erreur;
        }
        },
        deleteCourse:async(parent,{id},context)=>{
            try
            {const {user}=context;
            if(user.userType!=="ENSEIGNANT")
            {
                throw new Error("Vous ne pouvez pas effectuer cette operation");
            }
            return await CoursService.delete(id);
        }catch(error)
            {
                throw error;
            }


        },
        updateCourse:async(parent,{id,data},context)=>{
            try
            {const {user}=context;
            if(user.userType!=="ENSEIGNANT")
            {
                throw new Error("Vous ne pouvez pas effectuer cette operation");
            }
            return await CoursService.update(id,data);
        }catch(error)
            {
                throw error;
            }
        },
        


    },
    Course:{
        enseignant:async(parent)=>{
return await CoursService.getUserById(parent.enseignant);
        }
    }

}
module.exports=CourseResolver;