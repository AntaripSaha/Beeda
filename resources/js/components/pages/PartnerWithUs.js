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
    useEffect(() => {
        window.scrollTo(0, 0)
    }, []);
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
                                        <h1 className="contactHeadLine">
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
                                        </h1>
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
                                            Beeda is a supportive and inclusive workplace that empowers
                                            employees to build careers and reach their full potential.
                                            We ensure continuous learning opportunities, mentorship programs,
                                            and more. Diversity and inclusion are valued,
                                            and employees are treated with respect and given equal opportunities to succeed.
                                            Join Beeda and take your career to new heights.
                                        </div>

                                        <div className="cbc-details-bottom d-flex justify-content-center justify-content-lg-start">
                                            <button className="cbc-details-bottom-btn">
                                               <a href="#" className="text-white"> Join <span className="text-lowercase">As</span> Employee </a>                                                
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
                                            Empower your career as a driving partner with Beeda.
                                            Enjoy the benefits of a flexible schedule, fair earnings,
                                            and supportive work culture. Reap the rewards of professional
                                            growth with training and resources provided. Start delivering
                                            exceptional riding experiences to customers and attain
                                            financial independence with Beeda.
                                        </div>

                                        <div className="cbc-details-bottom d-flex justify-content-center justify-content-lg-end">
                                            <button className="cbc-details-bottom-btn">
                                               <a href="#" className="text-white"> Join <span className="text-lowercase">As</span>  Driver</a>                                                
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
                                            Join Beeda as a merchant and expand your reach to millions of global users.
                                            Our subscription-based system provides a cost-effective solution for
                                            small and medium-sized businesses to connect with their target audience.
                                            Say goodbye to commission-based systems and enjoy a seamless and efficient
                                            process for growing your business with Beeda.
                                        </div>
                                        <div className="cbc-details-bottom d-flex justify-content-center justify-content-lg-start">
                                            <button className="cbc-details-bottom-btn">
                                               <a href="#" className="text-white"> Join <span className="text-lowercase">As</span>  Merchant</a>
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
