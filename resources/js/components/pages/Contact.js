import React, { useEffect, useState } from "react";
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

const Contact = () => {
    const [URL, setUrl] = useState("beeda-frontend/");
    useEffect(() =>{
        window.scrollTo(0, 0)
    }, [])
    return (
        <>
            <div className="contactUs-banner position-relative py-5">
                {/* <img
                    src="/img/banner-side-snap-1.png"
                    alt="banner-side-snap"
                    className="banner-side-snap-1"
                /> */}
                <div className="wrapper">
                    <div className="contact-content">
                        <div className="container-fluid p-0 d-flex align-items-center">
                            <div className="row">
                                <div className="col-6 p-0 d-flex align-items-center">
                                    <div className="contactHeadLine">
                                        Contact{" "}
                                        <span
                                            className={`aboutSubHeadLine position-relative`}
                                        >
                                            Us
                                            <img
                                                src="/img/Vector.png"
                                                alt="vector"
                                                className="VectorImg"
                                            />
                                        </span>
                                    </div>
                                </div>
                                <div className="col-6 p-0">
                                    <img
                                        src="/img/Contact us banner.png"
                                        alt="Contact us"
                                        className="ContactUsBanner"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div className="wrapper">
                <div className="contact-body">
                    <div className="container-fluid p-0">
                        <div className="row">
                            <div className="col-lg-6">
                                <img
                                    src="/img/contact-body-img-1.png"
                                    alt="contact-body-img"
                                    className="contact-body-img"
                                />
                            </div>
                            <div className="col-lg-6 d-flex align-items-center">
                                <div className="cbc-details">
                                    <div className="cbc-details-head text-center text-lg-left">
                                        Start a Live Chat
                                    </div>
                                    <div className="cbc-details-middle text-center text-lg-left">
                                        Do you have queries? You want to get a
                                        specific service from Beeda? Click below
                                        and start a live chat with us. We are
                                        here to help you in every way possible.
                                        Feel free to knock us anytime, we’re
                                        available 24/7 at your service.
                                    </div>

                                    <div className="cbc-details-bottom d-flex justify-content-center justify-content-lg-start">
                                       <a href="https://m.me/108826358751069" target="_blank">
                                       <button className="cbc-details-bottom-btn">
                                            Start Chatting
                                        </button>
                                       </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-lg-6 order-1 order-lg-2">
                                <img
                                    src="/img/contact-body-img-2.png"
                                    alt="contact-body-img"
                                    className="contact-body-img"
                                />
                            </div>
                            <div className="col-lg-6 d-flex align-items-center order-2 order-lg-1">
                                <div className="cbc-details">
                                    <div className="cbc-details-head text-center text-lg-right">
                                        Give us a Call
                                    </div>
                                    <div className="cbc-details-middle text-center text-lg-right">
                                        Prefer to call! Here you go. We’re 24/7
                                        active for you.
                                        <p className="text-center text-lg-right m-0">
                                            <img
                                                src="/img/phone-Vector.png"
                                                alt="carbon_phone-voice"
                                            />
                                            <strong className="ml-3">
                                                Phone:{" "}
                                            </strong>
                                            +1 754-399-1127
                                        </p>
                                    </div>

                                    <div className="cbc-details-bottom d-flex justify-content-center justify-content-lg-end">
                                        <button className="cbc-details-bottom-btn">
                                           <a className="text-white" href="tel:+1 754-399-1127">
                                            Call <span className="text-lowercase">Us</span> Now
                                           </a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-lg-6">
                                <img
                                    src="/img/contact-body-img-3.png"
                                    alt="contact-body-img"
                                    className="contact-body-img"
                                />
                            </div>
                            <div className="col-lg-6 d-flex align-items-center">
                                <div className="cbc-details">
                                    <div className="cbc-details-head text-center text-lg-left">
                                        Send us a Mail
                                    </div>
                                    <div className="cbc-details-middle text-center text-lg-left">
                                        If you want to contact us via e-mail you
                                        can do it. Click the button in bellow
                                        write down your problem and send us.
                                        <p className="text-center text-lg-left m-0">
                                            <img
                                                src="/img/mail-vector.png"
                                                alt="carbon_phone-voice"
                                            />
                                            <strong className="ml-3">
                                                E-mail:{" "}
                                            </strong>
                                            support@beeda.com
                                        </p>
                                    </div>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Email:</label>
                                                    <input type="text" class="form-control" id="recipient-name"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Subject:</label>
                                                    <input type="text" class="form-control" id="recipient-name"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Message:</label>
                                                    <textarea class="form-control" id="message-text"></textarea>
                                                </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Submit</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    <div className="cbc-details-bottom d-flex justify-content-center justify-content-lg-start">
                                       <button type="" className="cbc-details-bottom-btn">
                                         <a href="mailto:support@beeda.com" target="_blank" className="text-white">
                                         Send <span className="text-lowercase">A</span> mail
                                         </a>
                                       </button>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Contact;
