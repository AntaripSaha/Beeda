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
                                    Beeda has all the services that you need in your daily life.
                                    Users can find their needs with a single tap. Besides, the vendors can use Beeda platforms
                                    to enlist their business and reach their audience more easily. So, whether you have
                                    a small/medium business or need to get your needs, Beeda should be your first choice.
                                    E-commerce, water, gas, flower, liquor, ride-sharing, food, grocery, and 50+ services are available in Beeda.
                                    You can avail of all these services with a single tap and make your life easier.
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
                                    Making life easier with a digital solution is our main motive.
                                    We’ve introduced the subscription-based business model over the
                                    commission-based old model. All the vendors, drivers,
                                    and businesses can use our platforms and reach their audience
                                    within the shortest possible time. Our expert tech team is there
                                    to help you in every possible way.
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
                                    If you have a small local business and you’re looking for the best platform to grow,
                                    Beeda should be your first choice. We are committed to partnering with all
                                    the local businesses, no matter what the size is. We are creating the soil
                                    for entrepreneurs. You can enlist your business now and reach your audience
                                    easier than before.
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
                                <h3>Grow with Beeda</h3>
                                <p>
                                    Beeda has millions of users across the country.
                                    Therefore, you can easily reach your target audience and
                                    grow your business. So, enlist your business now,
                                    and reach your target audience easier than before.
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

                                    <p className="fs-8 text-center">&nbsp
                                        {showMore ? divdata.paragraph : `${divdata.paragraph.substring(0, 296)}`}
                                        <span onClick={() => setShowMore(!showMore)}>{showMore ? <span className="showless"> Show less</span> : <span className="showmore">Show more</span>}</span>
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
