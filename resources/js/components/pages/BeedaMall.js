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

const BeedaMall = () => {
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
                <div className="rideShareHeadline">Beeda Mall</div>
              </div>
              <div>
                <img
                  src="/img/beedamall/logo2.png"
                  alt="beeda icon"
                  className="mobile"
                />
                <img
                  src="/img/beedamall/logo1.png"
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
                  src="/img/beedamall/beedamall1.jpg"
                  alt="Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>About BeedaMall</h3>
                <p>
                  Beedamall is a leading E-Commerce platform dedicated to providing a seamless shopping experience for customers worldwide.
                  Our platform offers a vast selection of products across multiple categories,
                  making it easy for customers to find what they need.
                </p>
                <p>
                  At the same time, vendors can enlist their business and all of their products and reach their target audience within the shortest possible time.
                  Millions of users are buying thousands of different products from BeedaMall. Since Beeda is a subscription-based platform,
                  any business owner can subscribe to our platform and grow their business accordingly.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div id="whatIsBeeda">
          <div className="container-fluid p-0">
            <div className="row">
              <div className="col-lg-6 d-flex flex-column justify-content-start order-2 order-lg-1">
                <h3>Beedamall’s Motive</h3>
                <p>
                  Our motive is to create a mutually beneficial platform for both customers and vendors.
                  We strive to offer a seamless and convenient shopping experience for customers and an effective marketplace
                  for vendors to expand their reach and grow their business. With thousands of vendors and an extensive range of products,
                  we aim to fulfill the diverse needs of our customers.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/beedamall/beedamall2.jpg"
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
                  src="/img/beedamall/beedamall3.jpg"
                  alt="Small Business With Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>Get Your Everyday Needs</h3>
                <p>
                  At Beeda, we are dedicated to providing a hassle-free shopping experience for all your daily essentials.
                  Our platform offers a wide selection of high-quality products at competitive prices,
                  so you can get everything you need without sacrificing quality.
                  With our user-friendly interface and quick delivery options,
                  shopping is much easier than before.
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
                <h3>Grow Your Busines</h3>
                <p>
                  Our platform offers vendors a unique opportunity to reach new customers and increase sales.
                  With a user-friendly interface, real-time analytics, and a commitment to quality,
                  Beeda provides the tools and support needed to
                  succeed in the e-commerce marketplace. Join us today and take your business to the next level.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/beedamall/beedamall4.jpg"
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

export default BeedaMall;