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
const FoodDelivery = () => {
    const [URL, setUrl] = useState("beeda-frontend/");
    useEffect(() => {
      window.scrollTo(0, 0);
    }, []);
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
        <img
          src="img/about-us/Torus2.png"
          alt="vector"
          className={`torusIcon torus2`}
        />
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
              <div className="d-flex align-items-center justify-content-between">
                <div className="">
                  <div className="rideShareHeadline">Food Delivery</div>
                </div>
                <div>
                  <img
                    src="/img/ride-share/drive-image-mobile.png"
                    alt="beeda icon"
                    className="mobile"
                  />
  
                  <img
                    src="/img/ride-share/drive-image.png"
                    alt="beeda icon"
                    className="desktop"
                  />
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
                    src="/img/beedamall/beedamall1.png"
                    alt="Beeda"
                    width="430px"
                  />
                </div>
                <div className="col-lg-6 d-flex flex-column justify-content-start">
                  <h3>About Beeda ride sharing</h3>
                  <p>
                    Beedamall was created as part of a Mega ecosystem of online
                    and on demand services, where users can find everything they
                    do on their mobile in one place, under one tap, at Beeda
                    you’ll be empowered to drive impact across the world, working
                    with our talented team to build a world class product that
                    nations will run on.
                  </p>
                  <p>
                    whether you’re creating codes for our Mega- App or finding new
                    ways to bring our platform to the people in your city. You’ll
                    have the opportunity to learn and grow every day, and develop
                    your skills alongside talented and inspiring people from
                    around the Globe.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div id="whatIsBeeda">
            <div className="container-fluid p-0">
              <div className="row">
                <div className="col-lg-6 d-flex flex-column justify-content-start order-2 order-lg-1">
                  <h3>Travel smarter, not harder with Beeda ride sharing</h3>
                  <p>
                    Beeda leaders are purpose driven and motivated. To keep on
                    pushing the boundaries forward, by leveraging technology to
                    simplify and improve lives of millions.
                  </p>
                  <p>
                    We are building an awesome organisation, and a global platform
                    that offers subscription model over the old commission system,
                    therefore allowing vendors, drivers and businesses to earn
                    more, our vison at Beeda is to always remember that the only
                    way to win is for everyone to win.
                  </p>
                </div>
                <div className="col-lg-6 order-1">
                  <img
                    src="/img/ride-share/Beeda-Ride_Sharing_Service.jpg"
                    alt="Beeda Mega App"
                    width="430px"
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
                    width="430px"
                  />
                </div>
                <div className="col-lg-6 d-flex flex-column justify-content-start">
                  <h3>Enjoy the ride, leave the driving to us</h3>
                  <p>
                    Beeda is determined to continue partnering with small business
                    owners in the local community and believes that creating the
                    soil for small businesses to grow and making the local
                    community prosperous is the way for Beeda to truly grow.
                  </p>
                  <span
                    className={`d-flex align-items-center ${AboutStyle.clickToRegister}`}
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
                  <h3>Relax, we've got your ride covered</h3>
                  <p>
                    Beeda customers can easily and quickly access the products of
                    small business owners starting their business through Beeda
                    Mega Platform, allowing small business owners to acquire more
                    sales opportunities based on customer trust in Beeda
                    platform. 
                  </p>
                  <p>
                    The growth of these small businesses leads to the development
                    of the local economy, and leads to a virtuous cycle of win-win
                    growth with the local community, sellers, and customers.
                  </p>
                </div>
                <div className="col-lg-6 order-1">
                  <img
                    src="/img/about-us/Beeda-Grow your Business.jpg"
                    alt="Grow Your Business With Beeda Mega App"
                    width="430px"
                  />
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
                  Thank you for being a loyal customer, partner, or vendor, we
                  look forward to serving you for many generations to come, Beeda
                  Let’s Go Further Together
                </p>
              </div>
              <img
                src="/img/about-us/happy.png"
                alt="happy"
                width="315"
                height="306"
                className="thankUImg"
              />
            </div>
          </div>
        </div>
      </>
    );
};

export default FoodDelivery;