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

const Flower = () => {
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
                <div className="rideShareHeadline">Flower</div>
              </div>
              <div>
                <img
                  src="/img/flower/logo2.png"
                  alt="beeda icon"
                  className="mobile"
                />

                <img
                  src="/img/flower/logo1.png"
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
                  src="/img/flower/flower-delivery-service-with-beeda-mega-app.jpg"
                  alt="Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>About Beeda Flower Service</h3>
                <p>
                  Beeda connects florists with customers through its convenient flower delivery service.
                  Beeda allows florists to reach a wider audience and expand their business, while customers
                  can easily order fresh flowers and bouquets for fast delivery. With a user-friendly platform
                  and diverse floral options, Beeda makes it simple for both florists and customers to enjoy the
                  beauty of fresh flowers. Whether you're a florist looking to grow your business or a customer
                  seeking a simple and convenient way to order flowers, trust Beeda for all your floral needs.

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
                  At Beeda, our primary motive is to provide a seamless platform that connects florists and customers.
                  We aim to empower florists, help them grow their businesses, and reach a wider audience. At the same time,
                  we want to make it easy for customers to order fresh flowers and enjoy fast and convenient delivery. We strive to provide a
                  user-friendly interface and a wide selection of bouquets to meet the florists' and customers' needs and preferences.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/flower/flower2.jpg"
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
                  src="/img/flower/flower3.jpg"
                  alt="Small Business With Beeda"
                  width="430px"
                />
              </div>
              <div className="col-lg-6 d-flex flex-column justify-content-start">
                <h3>Get The Fresh Flower at Your Doorstep</h3>
                <p>
                  Beeda's flower delivery service brings a touch of nature to your doorstep.
                  With a wide variety of fresh blooms to choose from, you can easily find the
                  perfect bouquet for any occasion. Enjoy the convenience of fast delivery and
                  the ease of ordering through a user-friendly platform. Trust Beeda for all
                  your floral needs and bring the beauty of fresh flowers into your life.
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
                <h3>Grow Your Floral Business</h3>
                <p>
                  Beeda's flower delivery service provides the opportunity to grow your floral business.
                  By connecting you with customers and streamlining your delivery operations, Beeda helps
                  you expand your reach and serve a wider audience. Our user-friendly interface and fast
                  delivery options make it easy for you to provide beautiful blooms to your customers.
                  Join Beeda and take your floral business to the next level.
                </p>
              </div>
              <div className="col-lg-6 order-1">
                <img
                  src="/img/flower/flower4.jpg"
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
export default Flower;