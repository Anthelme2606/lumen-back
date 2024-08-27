import Home from '../components/Home.js';
import Skills from '../components/Skills.js';
import About from '../components/About.js';
import {createBrowserRouter}  from 'react-router-dom';
const routers=createBrowserRouter([
    {
        path:"/",
        element:<Home/>,
        
            children:[{
            path:"/skills",
            element:<Skills/>   
        },
        {
            path:"/about",
            element:<About/>   
        }
     
    ]  
        
    },
    
]);
export default routers;