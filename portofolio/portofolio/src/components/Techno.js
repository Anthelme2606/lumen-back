import React from 'react';
import { Container, Row, Col, Card } from 'react-bootstrap';
import jsImage from '../utils/images/javascript.jpg';
import phpImage from '../utils/images/php.jpg';
import nodejsImage from '../utils/images/nodejs.jpg';
import laravelImage from '../utils/images/laravel.jpg';
import mongodbImage from '../utils/images/mongo.jpg';
import mysqlImage from '../utils/images/mysql.jpg';
import reactImage from '../utils/images/react.jpg';
import vuejsImage from '../utils/images/vuejs.jpg';

const cardsData = [
  {
    id: 1,
    image: jsImage,
    name: 'JavaScript',
    description: 'JavaScript is a versatile programming language primarily used for web development.'
  },
  {
    id: 2,
    image: phpImage,
    name: 'PHP',
    description: 'PHP is a popular scripting language especially suited to web development.'
  },
  {
    id: 3,
    image: nodejsImage,
    name: 'Node.js',
    description: 'Node.js is a runtime environment that allows you to run JavaScript on the server-side.'
  },
  {
    id: 4,
    image: laravelImage,
    name: 'Laravel',
    description: 'Laravel is a PHP framework designed for building robust web applications.'
  },
  {
    id: 5,
    image: mongodbImage,
    name: 'MongoDB',
    description: 'MongoDB is a NoSQL database known for its high performance and flexibility.'
  },
  {
    id: 6,
    image: mysqlImage,
    name: 'MySQL',
    description: 'MySQL is a relational database management system based on SQL.'
  },
  {
    id: 7,
    image: reactImage,
    name: 'React',
    description: 'React is a JavaScript library for building user interfaces.'
  },
  {
    id: 8,
    image: vuejsImage,
    name: 'Vue.js',
    description: 'Vue.js is a progressive JavaScript framework for building user interfaces.'
  },
];

const Techno = () => {
  return (
    <Container className="mt-5">
      <h2 className="text-center mb-4">I work with the latest technology</h2>
      <p className="text-center">I have experience working with a wide range of technologies including Node.js, PHP, Laravel, Vue.js, and React.</p>
      <Row>
        {cardsData.map((card) => (
          <Col key={card.id} xs={12} md={6} lg={3} className="mb-4">
            <Card className="h-100">
              <Card.Img variant="top" src={card.image} />
              <Card.Body>
                <Card.Title>{card.name}</Card.Title>
                <Card.Text>{card.description}</Card.Text>
              </Card.Body>
            </Card>
          </Col>
        ))}
      </Row>
    </Container>
  );
};

export default Techno;