import React, { useEffect, useState } from "react";
import AboutStyle from "../../../css/aboutUs.module.css";
import {
    BrowserRouter as Router,
    Routes,
    Route,
    Link,
    NavLink,
} from "react-router-dom";
import { CDN_URL } from "../../constant";
const AboutUs = () => {
    const [URL, setUrl] = useState("beeda-frontend/");
    const [showMore,setShowMore]=useState(false)
    const divdata= {
            paragraph :`Beeda Mega App aims to give you
            everything with a single tap. In Beeda,
            all the services are there; you can just
            click on the app and get the needed one. Apart from that, we create a great
            subscription-based platform for all
            businesses. Using the Beeda platform,
            you can build up and grow your business
            in order to run through the country. For
            that, our world-class team is there to
            help you in every way possible. Thus, we
            ensure the best use of technology to
            make life easier.`
        }
    
    const {text}=divdata
    
    
    useEffect(() =>{
        window.scrollTo(0, 0)
    }, [])
    console.log(divdata[0])
    return (
        <>
            <img
                src="img/about-us/Vector (1).png"
                alt="vector"
                className={`${AboutStyle.torusIcon} ${AboutStyle.vector1}`}
            />
            <img
                src="img/about-us/Torus.png"
                alt="vector"
                className={`${AboutStyle.torusIcon} ${AboutStyle.torus1}`}
            />
            <img
                src="img/about-us/Vector (2).png"
                alt="vector"
                className={`${AboutStyle.torusIcon} ${AboutStyle.vector2}`}
            />
            <img src="img/about-us/Torus2.png" alt="vector" className={`torusIcon torus2`} />
            <img
                src="img/about-us/Torus3.png"
                alt="vector"
                className={`${AboutStyle.torusIcon} ${AboutStyle.torus3}`}
            />
            <div
                className={`aboutUsBanner d-flex justify-content-center align-items-center`}
            >
                {/* <img src={AboutBannerImg} alt="about-us banner" /> */}
                <section className="w-100">
                    <div className="container">
                        {/* <div className="row">
                            <div className="col-6"></div>
                            <div className="col-6 m-auto d-flex justify-content-end">
                                <img
                                    src={BeedaIcon}
                                    alt="beeda icon"
                                    className="beedaIcon"
                                />
                            </div>
                        </div> */}
                        <div className="row">
                            <div className="col-8 m-auto">
                                <div className="aboutHeadLine">
                                    All about{" "}
                                    <span className={`aboutSubHeadLine`}>
                                        Beeda
                                    </span>
                                    !!
                                    <img
                                        src="/img/about-us/beeda-icon.svg"
                                        alt="beeda icon"
                                        className="beedaIcon"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                {/* <Container>
                    <section id="about" className="section-bg mb-5">
                        <div className="container">
                            <div className="row">
                                <div className="col-4 m-auto">
                                    All about Beeda!!
                                </div>
                            </div>
                        </div>
                    </section>
                </Container> */}
            </div>
           

            <div className="wrapper">
                <div id="whatIsBeeda">
                    <div className="container-fluid p-0">
                        <div className="row">
                            <div className="col-lg-6">
                                <img
                                    src="/img/about-us/Beeda.jpg"
                                    alt="Beeda"
                                    width="490"
                                />
                            </div>
                            <div className="col-lg-6 d-flex flex-column justify-content-start">
                                <h3>What is Beeda?</h3>
                                <p>
                                    Beedamall was created as part of a Mega
                                    ecosystem of online and on demand services,
                                    where users can find everything they do on
                                    their mobile in one place, under one tap, at
                                    Beeda you’ll be empowered to drive impact
                                    across the world, working with our talented
                                    team to build a world class product that
                                    nations will run on.
                                </p>
                                <p>
                                    whether you’re creating codes for our Mega-
                                    App or finding new ways to bring our
                                    platform to the people in your city. You’ll
                                    have the opportunity to learn and grow every
                                    day, and develop your skills alongside
                                    talented and inspiring people from around
                                    the Globe.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="whatIsBeeda">
                    <div className="container-fluid p-0">
                        <div className="row">
                            <div className="col-lg-6 d-flex flex-column justify-content-start order-2 order-lg-1">
                                <h3>Our Motive</h3>
                                <p>
                                    Beeda leaders are purpose driven and
                                    motivated. To keep on pushing the boundaries
                                    forward, by leveraging technology to
                                    simplify and improve lives of millions.
                                </p>
                                <p>
                                    We are building an awesome organisation, and
                                    a global platform that offers subscription
                                    model over the old commission system,
                                    therefore allowing vendors, drivers and
                                    businesses to earn more, our vison at Beeda
                                    is to always remember that the only way to
                                    win is for everyone to win.
                                </p>
                            </div>
                            <div className="col-lg-6 order-1">
                                <img
                                    src="/img/about-us/Beeda-Mega App.jpg"
                                    alt="Beeda Mega App"
                                    width="490"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div id="whatIsBeeda">
                    <div className="container-fluid p-0">
                        <div className="row">
                            <div className="col-lg-6">
                                <img
                                    src="/img/about-us/Beeda-Business With Beeda.png"
                                    alt="Small Business With Beeda"
                                    width="490"
                                />
                            </div>
                            <div className="col-lg-6 d-flex flex-column justify-content-start">
                                <h3>Small Business</h3>
                                <p>
                                    Beeda is determined to continue partnering
                                    with small business owners in the local
                                    community and believes that creating the
                                    soil for small businesses to grow and making
                                    the local community prosperous is the way
                                    for Beeda to truly grow.
                                </p>
                                <span
                                    className={`link-page d-flex align-items-center ${AboutStyle.clickToRegister}`}
                                >
                                    Click here to register
                                    <span className="material-symbols-outlined ml-2">
                                        arrow_circle_right
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="whatIsBeeda">
                    <div className="container-fluid p-0">
                        <div className="row">
                            <div className="col-lg-6 d-flex flex-column justify-content-start order-2 order-lg-1">
                                <h3>Grow Business with Beeda Mega App</h3>
                                <p>
                                    Beeda customers can easily and quickly
                                    access the products of small business owners
                                    starting their business through Beeda Mega
                                    Platform, allowing small business owners to
                                    acquire more sales opportunities based on
                                    customer trust in Beeda platform. 
                                </p>
                                <p>
                                    The growth of these small businesses leads
                                    to the development of the local economy, and
                                    leads to a virtuous cycle of win-win growth
                                    with the local community, sellers, and
                                    customers.
                                </p>
                            </div>
                            <div className="col-lg-6 order-1">
                                <img
                                    src="/img/about-us/Beeda-Grow your Business.jpg"
                                    alt="Grow Your Business With Beeda Mega App"
                                    width="490"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div className="wrapper">
                <div className="whoWeAre-content">
                    <div className="container-fluid p-0">
                        <div className="row">
                            <div className="col-12 m-auto">
                                <div id="whoWeAre" className="desktop">
                                    <h2>Who are we?</h2>
                                    <p className="fs-8 text-justify">
                                        Beeda Mega App aims to give you
                                        everything with a single tap. In Beeda,
                                        all the services are there; you can just
                                        click on the app and get the needed one.
                                        Apart from that, we create a great
                                        subscription-based platform for all
                                        businesses. Using the Beeda platform,
                                        you can build up and grow your business
                                        in order to run through the country. For
                                        that, our world-class team is there to
                                        help you in every way possible. Thus, we
                                        ensure the best use of technology to
                                        make life easier.
                                    </p>
                                    
                             
                                </div>
                                <div id="whoWeAre" className="mobile">
                                <h2>Who are we?</h2>
                                     
                                      <p className="fs-8 text-justify">
                                      {showMore ? divdata.paragraph : `${divdata.paragraph.substring(0, 296)}`}
                                      <span onClick={() => setShowMore(!showMore)}>{showMore ? <span className="showless">Show less</span>: <span className="showmore">Show more</span>}</span>
                                      </p>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div className="container">
                <div className="row">
                    <div className="col-12 col-lg-7 m-auto p-relative">
                        <div id="thankU">
                            <h3>Thank You</h3>
                            <p>
                                Thank you for being a loyal customer, partner,
                                or vendor, we look forward to serving you for
                                many generations to come, Beeda Let’s Go Further
                                Together
                            </p>
                        </div>
                        <img
                            src="/img/about-us/happy.png"
                            alt="happy"
                            width="315"
                            height="306"
                            className="thankUImg desktop"
                        />
                        <img
                            src="/img/about-us/happy.png"
                            alt="happy"
                            width="315"
                            height="306"
                            className="thankUImg mobile"
                        />
                    </div>
                </div>
            </div>
        </>
    );
};

export default AboutUs;
