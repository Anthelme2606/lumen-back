
import NavBar from './NavBar';
import Hero from './Hero';
import React, { useEffect } from 'react';
import AOS from 'aos';
import 'aos/dist/aos.css';
export default function Home(){
    useEffect(() => {
        AOS.init();
      }, []);
return (
    <>
    <div className="content" >
     <NavBar/>  
     </div>
     
    </>
);

}