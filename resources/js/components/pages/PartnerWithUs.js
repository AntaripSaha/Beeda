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

const PartnerWithUs = () => {
    const [URL, setUrl] = useState("beeda-frontend/");
    useEffect(() =>{
        window.scrollTo(0, 0)
    }, [])
    return (
        <>
            <div id="partnerWithUs">
                <div className="contactUs-banner">
                    {/* <img
                        src="/img/banner-side-snap-1.png"
                        alt="banner-side-snap"
                        className="banner-side-snap-1"
                    /> */}
                    <div className="wrapper">
                        <div className="partnerWithUs-content">
                            <div className="container-fluid d-flex align-items-center p-0">
                                <div className="row">
                                    <div className="col-12 col-md-7 d-flex align-items-center">
                                        <div className="contactHeadLine">
                                            Become a{" "}
                                            <span
                                                className={`aboutSubHeadLine position-relative`}
                                            >
                                                Partner
                                                <img
                                                    src="/img/Vector.png"
                                                    alt="vector"
                                                    className="VectorImg"
                                                />
                                            </span>
                                        </div>
                                    </div>
                                    <div className="col-5 d-none d-md-flex">
                                        <img
                                            src="/img/partner/partner-with-us-banner-img.png"
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
                    <div className="contact-body partner-body">
                        <div className="container-fluid p-0">
                            <div className="row">
                                <div className="col-sm-3 d-flex justify-content-center align-items-center">
                                    <div className="contactHeadLine">
                                        We’re here to{" "}
                                        <span className={`aboutSubHeadLine`}>
                                            Help!
                                        </span>
                                    </div>
                                </div>
                                <div className="col-sm-6 d-flex justify-content-center align-items-center">
                                    <img
                                        src="/img/partner/Section 1.png"
                                        alt="Section 1 image"
                                        className="partner-head-img"
                                    />
                                    <img
                                        src="/img/partner/Vector 1.png"
                                        alt="Vector"
                                        className="vector-cla"
                                    />
                                </div>
                                <div className="col-sm-3 d-flex justify-content-center align-items-center">
                                    <div className="contactHeadLine">
                                        Grow your{" "}
                                        <span className={`aboutSubHeadLine`}>
                                            Business!
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div className="row mt-3">
                                <div className="col-lg-5">
                                    <img
                                        src="/img/partner/Employees.png"
                                        alt="Employees img"
                                        className="contact-body-img"
                                    />
                                </div>
                                <div className="col-lg-7 d-flex align-items-center">
                                    <div className="cbc-details">
                                        <div className="cbc-details-head text-center text-lg-left">
                                            Employees
                                        </div>
                                        <div className="cbc-details-middle text-center text-lg-left ">
                                            There are many variations of
                                            passages of Lorem Ipsum available,
                                            but the majority have suffered
                                            alteration in some form, by injecte
                                            humour, or randomised words which
                                            don't look even slightly believable.
                                            If you are going to use a passage of
                                            Lorem Ipsum, you.
                                        </div>

                                        <div className="cbc-details-bottom d-flex justify-content-center justify-content-lg-start">
                                            <button className="cbc-details-bottom-btn">
                                                Join <span className="text-lowercase">As</span> Employee
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-lg-5 order-1 order-lg-2">
                                    <img
                                        src="/img/partner/Driving Partner.png"
                                        alt="Driving Partner img"
                                        className="contact-body-img"
                                    />
                                </div>
                                <div className="col-lg-7 d-flex align-items-center order-2 order-lg-1">
                                    <div className="cbc-details">
                                        <div className="cbc-details-head text-center text-lg-left">
                                            Driving Partner
                                        </div>
                                        <div className="cbc-details-middle text-center text-lg-left">
                                            There are many variations of
                                            passages of Lorem Ipsum available,
                                            but the majority have suffered
                                            alteration in some form, by injecte
                                            humour, or randomised words which
                                            don't look even slightly believable.
                                            If you are going to use a passage of
                                            Lorem Ipsum, you.
                                        </div>

                                        <div className="cbc-details-bottom d-flex justify-content-center justify-content-lg-end">
                                            <button className="cbc-details-bottom-btn">
                                                Join <span className="text-lowercase">As</span>  Driver
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-lg-5">
                                    <img
                                        src="/img/partner/Merchant.png"
                                        alt="contact-body-img"
                                        className="contact-body-img"
                                    />
                                </div>
                                <div className="col-lg-7 d-flex align-items-center">
                                    <div className="cbc-details">
                                        <div className="cbc-details-head text-center text-lg-left">
                                            Merchant
                                        </div>
                                        <div className="cbc-details-middle text-center text-lg-left">
                                            There are many variations of
                                            passages of Lorem Ipsum available,
                                            but the majority have suffered
                                            alteration in some form, by injecte
                                            humour, or randomised words which
                                            don't look even slightly believable.
                                            If you are going to use a passage of
                                            Lorem Ipsum, you.
                                        </div>

                                        <div className="cbc-details-bottom d-flex justify-content-center justify-content-lg-start">
                                            <button className="cbc-details-bottom-btn">
                                                Join <span className="text-lowercase">As</span>  Merchant
                                            </button>
                                        </div>
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

export default PartnerWithUs;
