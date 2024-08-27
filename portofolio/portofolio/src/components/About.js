import React from 'react';
import { Container, Row, Col, Card, Image } from 'react-bootstrap';
import {Link} from 'react-router-dom';
import image from '../utils/images/hero.jpg';
import { BsCheck, BsGithub, BsLinkedin, BsEnvelope } from 'react-icons/bs';

function About() {
  return (
    <section className="about">
      <Container>
        <Row>
          <Col md={6}>
          <Image
  src={image} 
  alt="Your Name"
  roundedCircle
  className="mb-3"
  style={{ width: 150, height: 150 }} // Set desired width and height
/>
            <h2>Anthelme KPODAR</h2>
            <p> Web Developer</p>
            <p>Lome , Togo</p>
          </Col>
          <Col md={6}>
            <p>
              I'm a web developer with 2 years of experience. I specialize in creating fast, responsive, and user-friendly websites. I'm passionate about building products that people love to use. 
              My technical skills include HTML, CSS, PHP,Laravel,JavaScript, React, and Node.js.
            </p>
          </Col>
        </Row>
        <Row className="mt-4">
          <Col md={4}>
            <Card>
              <Card.Header>Skills</Card.Header>
              <Card.Body>
                <ul className="list-unstyled">
                  <li>
                    <BsCheck /> HTML5, CSS3, Bootstrap,TailwindCss
                  </li>
                  <li>
                    <BsCheck /> JavaScript, React, Vuejs
                  </li>
                  <li>
                    <BsCheck /> Node.js, Express.js
                  </li>
                  <li>
                    <BsCheck /> Responsive web design
                  </li>
                  <li>
                    <BsCheck /> Version control (Git)
                  </li>
                  <li>
                    <BsCheck /> Project management (Agile)
                  </li>
                </ul>
              </Card.Body>
            </Card>
          </Col>
          <Col md={4}>
            <Card>
              <Card.Header>Projects</Card.Header>
              <Card.Body>
                <ul className="list-unstyled">
                  <li>
                    <Link to="#">
                      <BsCheck /> E-commerce website
                    </Link>
                  </li>
                  <li>
                    <Link to="#">
                      <BsCheck /> SaaS application
                    </Link>
                  </li>
                  
                </ul>
              </Card.Body>
            </Card>
          </Col>
          <Col md={4}>
            <Card>
              <Card.Header>Contact</Card.Header>
              <Card.Body>
              <ul className="contact-list list-unstyled">
                  <li>
                    <Link to="https://github.com/anthelme2606" className="contact-link">
                      <BsGithub size={30} /> GitHub
                    </Link>
                  </li>
                  <li>
                    <Link
                      to="https://www.linkedin.com/in/t%C3%AAko-anthelme-kpodar-3324ab239?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                      className="contact-link"
                    >
                      <BsLinkedin size={30} /> LinkedIn
                    </Link>
                  </li>
                  <li>
                    <Link to="mailto:tekoanthelmekpodar@gmail.com" className="contact-link">
                      <BsEnvelope size={30} /> Email
                    </Link>
                  </li>
                </ul>
              </Card.Body>
            </Card>
          </Col>
        </Row>
      </Container>
    </section>
  );
}

export default About;
