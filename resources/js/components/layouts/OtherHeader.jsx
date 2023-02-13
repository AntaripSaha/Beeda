import React, { useState } from "react";
import Navbar from "react-bootstrap/Navbar";
import Nav from "react-bootstrap/Nav";
import NavDropdown from "react-bootstrap/NavDropdown";
import Form from "react-bootstrap/Form";
import FormControl from "react-bootstrap/FormControl";
import Container from "react-bootstrap/Container";
import { Card, Button, Badge, Row, Col } from "react-bootstrap";
import {
    BrowserRouter as Router,
    Routes,
    Route,
    Link,
    NavLink,
} from "react-router-dom";
import { PUBLIC_URL, CDN_URL } from "../../constant";

const OtherHeader = () => {
    const [URL, setUrl] = useState("beeda-frontend/");
    return (
        <>
        
            {/* <Navbar bg="primary" variant="dark">
            <Container>
            <Navbar.Brand href="#home"><img className='w-50'  src={'public/assets/front/img/beeda_white_logo.png'} /></Navbar.Brand>
              <div className='float-right'>
                  <Nav className="me-auto">
                    <Link to={`${URL}`}><Nav.Link href={`${URL}about`}>Home</Nav.Link></Link>
                      <Nav.Link href="#features">Partner with us</Nav.Link>
                      <Nav.Link href="#pricing">About Us</Nav.Link>
                      <Nav.Link href="#home">More Features</Nav.Link>
                      <Nav.Link href="#features">Store Login</Nav.Link>
                      <Link to={`${URL}contact`}><Nav.Link href="#link">Contact Us</Nav.Link></Link>
                      <Link to={`${URL}about`}><Nav.Link href="#link">About Us</Nav.Link></Link>
                  </Nav>
              </div>
            </Container>
          </Navbar> */}
            <header id="header" className="sticky-top">
                <div className="container">
                    <div id="logo" className="pull-left">
                        <h1>
                            <a href="#intro" className="scrollto"  >
                                <Link to="/">
                                    <img
                                        src={
                                            "/assets/front/img/beeda_white_logo.png"
                                        }
                                        alt="Beeda- Mega App"

                                    />
                                </Link>
                            </a>
                        </h1>
                    </div>
                    <nav id="nav-menu-container">
                        <ul className="nav-menu">
                            <li className="menu-active">
                                <NavLink to={``} activeClassName="nav-active">
                                    Home
                                </NavLink>
                            </li>
                            <li>
                                {/* <NavLink to={`partner-with-us`}>
                                    Partner With Us
                                </NavLink> */}
                                <NavLink to={`partner-with-us`}>
                                    Partner With Us
                                </NavLink>
                            </li>
                            <li>
                                <NavLink to={`about-us`}>About Us</NavLink>
                            </li>
                            {/* <li>
                                <a href="#advanced-features" target="_blank">
                                    More Features
                                </a>
                            </li> */}
                            <li>
                                <a
                                    href={`${CDN_URL}login`}
                                    target="_blank"
                                    rel="noreferrer"
                                >
                                    Store Login
                                </a>
                            </li>
                            <li>
                                <NavLink to={`blogs`}>Blog</NavLink>
                            </li>
                            <li>
                                <NavLink to={`contact-us`}>Contact Us</NavLink>
                            </li>
                            <li className="dropdown">
                                <button className="dropbtn">
                                    <a
                                        href=""
                                        className=""
                                        data-toggle="dropdown"
                                    >
                                        <img
                                            className=""
                                            src={"/assets/front/img/vector.svg"}
                                            alt=" "
                                        />
                                        EN&nbsp;
                                        <i className="fa fa-chevron-down"></i>
                                    </a>
                                </button>
                                <div className="dropdown-content">
                                    <a href="">ES</a>
                                    <a href="">FR</a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>
        </>
    );
};

export default OtherHeader;
