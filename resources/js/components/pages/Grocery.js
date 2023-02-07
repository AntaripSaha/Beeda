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
const Grocery = () => {
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
                <div className="rideShareHeadline">Grocery</div>
              </div>
              <div>
                <img
                  src="/img/grocery/logo2.png"
                  alt="beeda icon"
                  className="mobile"
                />

                <img
                  src="/img/grocery/logo1.png"
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
                  src="/img/grocery/grocery1.jpg"
                  alt="Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>About Beeda Grocery Delivery Service</h3>
                <p>
                  Beeda's grocery delivery service benefits both customers and business owners.
                  It provides customers with a convenient and efficient way to order groceries online,
                  saving time and hassle. With a wide selection of products, fast delivery options, and
                  a user-friendly interface, Beeda makes grocery shopping easy and stress-free.
                  For business owners, Beeda's grocery delivery service provides a new revenue stream and
                  helps them reach a wider customer base. Enlisting their store on the platform allows business
                  owners to expand their reach and sell more products. Beeda aims to bring customers
                  and businesses together, making it easier and more enjoyable for everyone to get what they need.

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
                  Beeda’s goal is to bridge the gap between
                  customers and business owners with our grocery
                  delivery service. Our aim is to make grocery shopping
                  effortless for customers and allow business owners to
                  expand their reach, increase their revenue streams, and
                  create a seamless, efficient, and mutually beneficial solution
                  that serves the needs of both customers and business owners.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/grocery/grocery2.jpg"
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
                  src="/img/grocery/grocery3.jpg"
                  alt="Small Business With Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>Get Fresh Groceries at Your Doorsteps</h3>
                <p>
                  Get fresh groceries at your doorstep with Beeda's grocery delivery service.
                  Our platform offers an extensive selection of products, fast and reliable delivery,
                  and an easy-to-use interface. Say goodbye to crowded
                  stores and long lines and enjoy the convenience of having your
                  groceries delivered right to your home. Shop with confidence.
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
                <h3>Grow Your Grocery Business</h3>
                <p>
                  Expand your grocery business with Beeda's platform. Our subscription-based model
                  connects you with a larger customer base and streamlines your delivery operations.
                  With real-time tracking capabilities, a user-friendly interface, and efficient delivery options,
                  Beeda empowers your business to grow and meet market demands. Join Beeda today and take your
                  grocery business to the next level.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/grocery/grocery4.jpg"
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

export default Grocery;