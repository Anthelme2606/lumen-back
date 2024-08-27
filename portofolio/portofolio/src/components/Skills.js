import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

const skillsData = [
  {
    id: 1,
    name: 'JavaScript',
    level: 90,
  },
  {
    id: 2,
    name: 'PHP',
    level: 75,
  },
  {
    id: 3,
    name: 'Node.js',
    level: 80,
  },
  {
    id: 4,
    name: 'Laravel',
    level: 70,
  },
  {
    id: 5,
    name: 'MongoDB',
    level: 85,
  },
  {
    id: 6,
    name: 'MySQL',
    level: 80,
  },
  {
    id: 7,
    name: 'React',
    level: 95,
  },
  {
    id: 8,
    name: 'Vue.js',
    level: 70,
  },
  {
    id: 9,
    name: 'GitHub',
    level: 90,
  },
];

const Skills = () => {

  return (
    <>
    
    <div className="container  mt-5" data-aos="fade-up">

      <div className="row">
        <div className="col-12">
          {skillsData.map((skill) => (
            <div className="mb-3" key={skill.id}>
              <h5>{skill.name}</h5>
              <div className="progress">
                <div className="progress-bar" role="progressbar" style={{ width: `${skill.level}%` }} aria-valuenow={skill.level} aria-valuemin="0" aria-valuemax="100">{skill.level}%</div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
    </>
  );
};

export default Skills;
