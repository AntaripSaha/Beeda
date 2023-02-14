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
    const [showMore, setShowMore] = useState(false)
    const divdata = {
        paragraph: `Beeda Mega App aims to give you
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

    const { text } = divdata


    useEffect(() => {
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
                <section className="w-100">
                    <div className="container">
                        <div className="row">
                            <div className="col-8 m-auto">
                                <h1 className="aboutHeadLine">
                                    All about{" "}
                                    <span className={`aboutSubHeadLine`}>
                                        Beeda
                                    </span>
                                    !
                                    <img
                                        src="/img/about-us/beeda-icon.svg"
                                        alt="beeda icon"
                                        className="beedaIcon"
                                    />
                                </h1>
                            </div>
                        </div>
                    </div>
                </section>
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
                                    Beeda offers a one-stop solution for all your daily needs.
                                    With just a tap, you can access a vast array of services.
                                    Business owners can also benefit from Beeda by listing their
                                    businesses and easily reaching their targeted customers.
                                    Whether you run a small to medium-sized business or simply
                                    want to meet your personal needs, Beeda is the right choice.
                                    From e-commerce to water and gas, flowers, liquor, ride-sharing,
                                    food, groceries, and over 50 other services, Beeda has got you covered.
                                    Simplify your life by utilizing our convenient services.
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
                                    Our motive is to revolutionize the way people live and work through
                                    innovative digital solutions. That's why we've adopted a subscription-based
                                    business model, which offers more value and benefits compared to the traditional
                                    commission-based approach. By using our platforms, vendors, drivers,
                                    and businesses can reach their targeted audience quickly and effectively
                                    without having to worry about any technicalities. Our expert tech team is
                                    there to help you in every possible way.
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
                                    At Beeda, we understand the unique challenges faced by small
                                    local businesses in today's competitive market. That's why we're
                                    committed to being a trusted partner and offering a platform that
                                    helps you grow and reach your targeted audience easily. We believe
                                    in empowering entrepreneurs and creating opportunities for local
                                    businesses to thrive. Whether you're just starting out or looking
                                    to expand your reach, Beeda is here to support you every step of the way.
                                </p>
                                <span
                                    className={`link-page d-flex align-items-center ${AboutStyle.clickToRegister}`}
                                >
                                    <a href="#" className="text-primary">Click here to register</a>
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
                                <h3>Grow with Beeda</h3>
                                <p>
                                    Beeda is changing the game for businesses of all sizes and industries.
                                    Our innovative approach connects businesses with their targeted audience,
                                    allowing them to reach new heights and achieve their goals. Our platform
                                    has millions of users globally, providing businesses with a vast and diverse
                                    audience to tap into. Whether you're a local shop looking to expand,
                                    a service provider seeking new clients, or a growing startup looking to
                                    make a big impact, Beeda can help.
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
                                    <p className="fs-8 text-center">
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

                                    <p className="fs-8 text-center">
                                        {showMore ? divdata.paragraph : `${divdata.paragraph.substring(0, 296)}`}
                                        <span onClick={() => setShowMore(!showMore)}>{showMore ? <span className="showless ms-2"> Show less</span> : <span className="showmore ms-2">Show more</span>}</span>
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
