import React from "react";
import { Link } from "react-router-dom";
import NavLink from "../links/link";
import Hero from './Hero';
export default function NavBar() {
  return (
    <>
      <nav className="navbar navbar-expand-lg navbar-dark bg-nav fixed-top">
        <div className="container-fluid">
          <Link className="navbar-brand px-2 mx-2" to="#">
            Portfolio
          </Link>

          <button
            className="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span className="navbar-toggler-icon"></span>
          </button>
          <div className="collapse navbar-collapse" id="navbarNav">
            <ul className="navbar-nav ms-auto">
              {NavLink.map((link) => (
                <li key={link.id} className="nav-item {link && active}">
                  <Link
                    className="nav-link badge mx-2 px-4 py-2 my-1"
                    aria-current="page"
                    to={link.link}
                  >
                    {link.name}
                  </Link>
                </li>
               
              ))}
            </ul>
          </div>
        </div>
      </nav>
      <Hero/>
    </>
  );
}
