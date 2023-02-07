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

const Water = () => {
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
                <div className="rideShareHeadline">Water</div>
              </div>
              <div>
                <img
                  src="/img/water/logo2.png"
                  alt="beeda icon"
                  className="mobile"
                />

                <img
                  src="/img/water/logo1.png"
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
                  src="/img/water/water1.jpg"
                  alt="Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>About Beeda Water Service</h3>
                <p>
                  Beeda offers a reliable and convenient water delivery service for both
                  customers and water delivery businesses. With fast and efficient delivery
                  options, customers can have fresh, clean water delivered directly to their
                  doorstep. At the same time, businesses can expand their reach and grow their
                  operations by enlisting on Beeda. The user-friendly interface and streamlined
                  ordering process make it easy for customers and businesses to get the water they need.
                  Join Beeda today and enjoy the benefits of a reliable water delivery service.
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
                  Our motive is to provide a reliable and convenient water delivery service that meets the needs of both individual
                  customers and businesses. By offering fast delivery and a user-friendly platform, we aim to make it easy for everyone
                  to stay hydrated and refreshed, no matter where they are. Whether you're looking for a regular supply of bottled water
                  for your home or office or a
                  business owner looking to keep your customers and employees hydrated, Beeda's water delivery service is here to help.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/water/water2.jpg"
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
                  src="/img/water/water3.jpg"
                  alt="Small Business With Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>Meet Your Thirst</h3>
                <p>
                  Beeda water delivery service brings fresh and clean water right to your doorstep.
                  Whether you need water for drinking, cooking, or other purposes, Beeda offers a
                  range of options to meet your needs. With fast delivery and a user-friendly platform,
                  ordering water has never been easier. Trust Beeda to quench your thirst and enjoy the
                  benefits of fresh, clean water delivered directly to you.
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
                <h3>Grow Your Water Business</h3>
                <p>
                  Beeda's water delivery service helps businesses to reach new customers and grow their sales.
                  With efficient delivery options and an easy-to-use platform, businesses can streamline their
                  operations and focus on delivering fresh, high-quality
                  water to their customers. Join Beeda today and tap into the growing demand for reliable,
                  convenient water delivery services.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/water/water4.jpg"
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

export default Water;