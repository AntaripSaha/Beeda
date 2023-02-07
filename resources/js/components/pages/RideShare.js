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
const RideShare = () => {
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
        <section className="w-100">
          <div className="container">
            <div className="d-flex align-items-center justify-content-between">
              <div className="">
                <div className="rideShareHeadline">Ride Share</div>
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
      </div>

      <div className="wrapper">
        <div id="whatIsBeeda">
          <div className="container-fluid p-0">
            <div className="row">
              <div className="col-lg-6">
                <img
                  src="/img/ride-share/ride1.jpg"
                  alt="Beeda"
                  width="490"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>About Beeda Ride Sharing</h3>
                <p>
                  Beeda ride-sharing service has become increasingly popular in recent years.
                  We connect both passengers and drivers in a single platform where users can request a ride,
                  and nearby drivers can accept the request. Requesting, tracking, paying, and rating,
                  everything is possible in this single platform.
                  It’s a more convenient and cost-effective option than the traditional transportation system.
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
                  Beeda is dedicated to revolutionizing transportation for everyone.
                  Our platform connects riders with drivers in a seamless, efficient manner.
                  Whether you're a driver looking to earn extra or a rider in need of a convenient and affordable ride,
                  Beeda has got you covered. With our user-friendly interface, secure payment options, and commitment to accessibility,
                  we're making transportation accessible and enjoyable for everyone.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/ride-share/ride2.jpg"
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
                  src="/img/ride-share/ride3.jpg"
                  alt="Small Business With Beeda"
                  width="490"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>Drive & Earn</h3>
                <p>
                  Beeda provides a unique opportunity for drivers to monetize their vehicles and turn their daily commute into a source of income.
                  With our flexible scheduling, you can choose when and how often you want to drive.
                  And with our secure payment system, you can easily receive your earnings.
                  Whether you're looking for a part-time or a full-time job,
                  Beeda provides a hassle-free way to earn extra income.
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
                <h3>Enjoy A Safe Ride</h3>
                <p>
                  Riders can easily book and pay for their rides using the Beeda wallet,
                  making it fast and convenient to travel.
                  Our platform connects riders with safe and reliable drivers,
                  ensuring a smooth and enjoyable ride experience.
                  And with our commitment to accessibility,
                  riders can enjoy affordable transportation no matter where they're located.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/ride-share/ride4.jpg"
                  alt="Grow Your Business With Beeda Mega App"
                  width="490"
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

export default RideShare;