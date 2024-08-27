import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import {  Button,Image} from 'react-bootstrap';
import { Outlet } from 'react-router-dom';
import image from '../utils/images/hero.jpg';
import Techno from './Techno';
const Hero = () => {
  return (
    <>
    <section className="hero">
      <div className="container">
        <div className="text">
            <h1>Hello, I'm Anthelme. A Full Stack web Developer.</h1>
            <p className="lead">
              I am a full stack web developer. I love to build web applications.
            </p>
            <div className="input-group">
              <input type="text" className="form-control" placeholder="Enter your email" aria-label="Enter your email" />
              <div className="input-group-append">
                <Button variant="primary">Get in touch</Button>
              </div>
            </div>
        </div>

        <div className="image mt-1 h-50" data-aos="zoom-in" data-aos-delay="100">
          <Image src={image} alt="Image de votre section Hero"/>
        </div>
      </div>
    </section>
    <div data-aos="fade-down" data-aos-delay="300">
      { <Outlet/>}
    </div>
   <div><Techno/></div>
    
    </>

  );
}

export default Hero;
