
import React, { useState } from 'react';
import Navbar from 'react-bootstrap/Navbar';
import Nav from 'react-bootstrap/Nav';
import NavDropdown from 'react-bootstrap/NavDropdown';
import Form from 'react-bootstrap/Form';
import FormControl from 'react-bootstrap/FormControl';
import Container from 'react-bootstrap/Container';
import { Card, Button, Badge, Row, Col } from 'react-bootstrap';
import { BrowserRouter as Router, Routes, Route, Link, NavLink } from "react-router-dom";
import { PUBLIC_URL } from '../../constant';

const Footer = () => {
    const [URL, setUrl] = useState("beeda-frontend/");
    return (
        <>
            <div style={{backgroundColor: "#010a57"}}>
                <section id="contact">
                    <div className="container">
                        <div className="row wow fadeInUp">
                            <div className="col-lg-12 col-md-12 col-12">
                                <img className="beeda_logo" src="{{ asset('/assets/front/img/6th_section/beeda_logo.png') }}" alt="" />
                            </div>

                            <div className="col-lg-2 col-md-6 col-6">
                                <div className="contact-about">
                                    <h3>Learn More</h3>
                                    <div>
                                        <a href="" target="_blank"><Link to={`about-us`}><Nav.Link href="#link">About Us</Nav.Link></Link></a>
                                    </div>
                                    <div>
                                        <a href="" target="_blank"><Link to={`press-releases`}><Nav.Link href="#link">Press Releases</Nav.Link></Link></a>
                                    </div>
                                    <div>
                                        <a href="" target="_blank"><Link to={`jobs`}><Nav.Link href="#link">Jobs</Nav.Link></Link></a>
                                    </div>
                                    <div>
                                        <a href="{{ route('drivers_centre') }}" target="_blank"><Link to={`drivers-centre`}><Nav.Link href="#link">Drivers Centre</Nav.Link></Link></a>
                                    </div>
                                    <div>
                                        <a href="{{ route('investors_relation') }}" target="_blank"><Link to={`investor-relation`}><Nav.Link href="#link">Investor Relation</Nav.Link></Link></a>
                                    </div>
                                    <div>
                                        <a href="{{ route('beeda_ads') }}" target="_blank"><Link to={`beeda-ads`}><Nav.Link href="#link">Beeda Ads</Nav.Link></Link></a>
                                    </div>
                                    <div>
                                        <a href="{{ route('beeda_pay') }}" target="_blank"><Link to={`beeda-pay`}><Nav.Link href="#link">Beeda Pay</Nav.Link></Link></a>
                                    </div>
                                    <div>
                                        <a href="{{ route('fraud_prevention') }}" target="_blank"><Link to={`fraud-prevention`}><Nav.Link href="#link">Fraud Prevention</Nav.Link></Link></a>
                                    </div>
                                    <div>
                                        <a href="" target="_blank" title="Beeda Mega App- A Mega App Platform"><Nav.Link href="http://beedamegaapp.com/" target="_blank">Mega_App</Nav.Link></a>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-2 col-md-6 col-6">
                                <div className="contact-about">
                                    <h3>Policies</h3>
                                    <div>
                                        <a href="" target="_blank"><Link to={`privacy-policy`}>Privacy Policy</Link></a>
                                    </div>
                                    <div>
                                        <a href="" target="_blank"><Link to={`terms-of-use`}>Terms Of Use</Link></a>
                                    </div>
                                    <div>
                                        <a href="" target="_blank"><Link to={`terms-of-service`}>Terms Of Service</Link></a>
                                    </div>
                                    <div>
                                        <a href="" target="_blank"><Link to={`refund-policy`}>Refund Policy</Link></a>
                                    </div>
                                </div>
                            </div>
                            <div className="col-lg-2 col-md-6 col-6">
                                <div className="contact-about">
                                    <h3>FAQ'S</h3>
                                    <div>
                                        <a href="" target="_blank"><Link to={`how-it-works`}><Nav.Link href="#link">How it works</Nav.Link></Link></a>
                                    </div>
                                    <div>
                                        <a href="" target="_blank"><Link to={`trust-and-safety`}><Nav.Link href="#link">Trust & Safety</Nav.Link></Link></a>
                                    </div>
                                    <div>
                                        <a href="" target="_blank"><Link to={`locations`}><Nav.Link href="#link">Locations</Nav.Link></Link></a>
                                    </div>
                                    <div>
                                        <a href="" target="_blank"><Link to={`data-security`}><Nav.Link href="#link">Data Security</Nav.Link></Link></a>
                                    </div>
                                    <div>
                                        <a href="" target="_blank"><Link to={`sustainability`}><Nav.Link href="#link">Sustanability</Nav.Link></Link></a>
                                    </div>
                                </div>
                            </div>

                            <div className="col-lg-3 col-md-6 col-6">
                                <div className="contact-about">
                                    <h3>Contact Us</h3>
                                    <div>
                                        <p>Customer Support: +17543991127</p>
                                    </div>
                                    <div>
                                        <p>Merchant Support: +1800beeda</p>
                                    </div>
                                    <div>
                                        <p>Email: support@beeda.com</p>
                                    </div>
                                </div>
                                
                            </div>

                            <div className="col-lg-3 col-md-12 col-12">
                                <div className="row">
                                    <div className="col-lg-12 col-md-6 col-6">
                                        <div className="contact-about">
                                            <h3>Social</h3>
                                                <div className="social-links">
                                                    <a href=""
                                                    className="facebook" target="_blank"><i className="fab fa-facebook-f"></i></a>
                                                    <a href=""
                                                    className="instagram" target="_blank"><i className="fab fa-instagram"></i></a>
                                                    <a href=""
                                                    className="twitter" target="_blank"><i className="fab fa-twitter"></i></a>
                                                    <a href=""
                                                    className="linkedin" target="_blank"><i className="fab fa-youtube"></i></a>
                                                </div>
                                        </div>
                                    </div>
                                    <div className="col-lg-12 col-md-6 col-6">
                                        <div className="contact-about">
                                            
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <footer id="footer">
                    <div className="container">
                        <div className="row mt-1">
                            <div className="col-lg-6 text-lg-left text-center">
                                <div style={{paddingTop:10}} className="text-white">
                                    Beeda Inc . All Rights Reserved. 2019-2022
                                </div>
                            </div>
                            <div className="col-lg-6 text-lg-right text-center">
                                <img src={'https://d2t5292uahafuy.cloudfront.net/public/assets/img/image20.png'} alt="Download App for Android-Beeda" />
                                <img src={'https://d2t5292uahafuy.cloudfront.net/public/assets/img/image21.png'} alt="Download App for Apple-Beeda" />
                                <img src={'https://d2t5292uahafuy.cloudfront.net/public/assets/img/image22.png'} alt="Download App for Huawei-Beeda" />
                            </div>
                        </div>
                    </div>
                </footer>

                <a href="#" className="back-to-top"><i className="fas fa-chevron-up"></i></a>
            </div>
        </>
    );
}

export default Footer;